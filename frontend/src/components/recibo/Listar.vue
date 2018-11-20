<template>
  <div>

    <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados da pesquisa</h3>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Código</label>
                      <input type="text" v-model="recibo.id" class="form-control form-control-sm" placeholder="Código">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome</label>
                      <input type="text" v-model="recibo.nome" class="form-control form-control-sm" placeholder="Nome">
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button @click="novoAction" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Novo Registro</button>
                <router-link to="/secretaria" activeClass="active">
                  <button type="button" @click="cancelarAction" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Voltar</button>
                </router-link>
                <div class="pull-right">
                  <button @click="pesquisarRecibos(recibo)" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Pesquisar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Recibos</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-hover">
             <thead class="thead-dark">
              <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor Bruto</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="recibo in recibos" :key="recibo.id">
                <td>{{ recibo.descricao}}</td>
                <td>{{ recibo.rendimentoTributavel | currency}}</td>
                <td>
                  <button @click="editAction(recibo)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                  <button disabled="true" @click="removeRecibo(recibo.id)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>

                  <button @click="imprimir(recibo.id)" type="button" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i></button>
                </td>
              </tr>
              <tr v-if="recibos.length <= 0">
                <td>Nenhum registro encontrado</td>
              </tr>
              <tfoot>
              <nav aria-label="Page navigation">
                <ul class="pagination" >
                  <li>
                    <a v-for="page in pages" @click="carregarLazy(page)" :class="pageAtual === page ? 'selected' : ''">{{page}}</a>
                  </li>
                </ul>
              </nav>

            </tfoot>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</template>

<script>
  import SectionHeader from '../shared/SectionHeader.vue'

  import { mapGetters, mapActions } from 'vuex'

  import {reciboService} from '../../_services'

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Listar', titleSmall: 'Recibos' },
        breadcrumb: [{
          text: 'Recibos',
          link: '/recibo',
          icon: 'fa fa-sticky-note-o'
        },{
          text: 'Listar',
          link: '#',
          active: 'active'
        }],
      }
    },components: {
      sectionHeader: SectionHeader,
    },
     computed: {
      ...mapGetters({
        action: 'action',
        recibo: 'recibo/recibo',
        recibos: 'recibo/recibos',
        util: 'util',
        pages: 'recibo/pages',
        pageAtual: 'recibo/pageAtual',
        first: 'recibo/first',
        max: 'recibo/max'
      })
    },
    methods: {
      ...mapActions({
        setAction: 'setAction',
        setRecibo: 'recibo/setRecibo',
        getRecibos: 'recibo/setRecibos',
        novoRecibo: 'recibo/novoRecibo',
        removeRecibo: 'recibo/removeRecibo',
        pesquisarRecibos: 'recibo/pesquisarRecibos',
        imprimirRecibo: 'recibo/imprimirRecibo',
        setPageAtual: 'recibo/setPageAtual',
        setFirst: 'recibo/setFirst'
      }),
      carregarLazy(page){
        if (page > this.pageAtual){
          let dif = page - this.pageAtual
          this.setFirst(this.first + (this.max * dif))
          this.setPageAtual(page)
          this.getRecibos({ano: this.util.ano.descricao, mes: this.util.mes.value, orgao: {id: this.util.orgao.id}})
        }else if(page < this.pageAtual){
          let dif = this.pageAtual - page
          this.setFirst(this.first - (this.max * dif))
          this.setPageAtual(page)
          this.getRecibos({ano: this.util.ano.descricao, mes: this.util.mes.value, orgao: {id: this.util.orgao.id}})
        }
      },
      listarAction(){
         this.getRecibos({ano: this.util.ano.descricao, mes: this.util.mes.value, orgao: {id: this.util.orgao.id}})
      },
      novoAction(){
        this.setAction('novo')
      },
      cancelarAction(){
        this.listarAction()
      },
      editAction(recibo) {
        reciboService.getById(recibo.id).then(
          response => {
            this.setAction('novo')
            this.setRecibo(response.data)
          }
        )

      },
      remover(id){
        this.removeRecibo(id)
          .then((response) => {
            this.listarAction()
          })
      },
      imprimir(id) {
        this.imprimirRecibo(id)
      }
    },
    created() {
      this.listarAction()
    },
  }
</script>

<style scoped>
li>a{
  cursor: pointer;
}
.selected {
    z-index: 2;
    cursor: pointer;
    color: #23527c;
    background-color: #eee;
    border-color: #ddd;
}
.pagination {
  margin-left: 8px !important;
}
</style>