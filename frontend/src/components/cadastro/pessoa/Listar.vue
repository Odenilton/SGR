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
                      <input type="text" v-model="pessoa.id" class="form-control form-control-sm" placeholder="Código">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome</label>
                      <input type="text" v-model="pessoa.nome" class="form-control form-control-sm" placeholder="Nome">
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
                  <button @click="pesquisarPessoas(pessoa)" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Pesquisar</button>
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
            <h3 class="box-title">Pessoas</h3>

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
            <table  class="table table-bordered table-hover">
             <thead class="thead-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Nome Mãe</th>
                <th scope="col">CPF</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="pessoa in pessoas" :key="pessoa.id">
                <td>{{ pessoa.nome}}</td>
                <td>{{ pessoa.nomeMae}}</td>
                <td>{{ pessoa.cpf}}</td>
                <td>
                  <button @click="editAction(pessoa)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                  <button @click="removePessoa(pessoa.id)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                </td>
              </tr>
              <tr v-if="pessoas.length <= 0">
                <td>Nenhum registro encontrado</td>
              </tr>
            </tbody>
            <tfoot>
              <nav aria-label="Page navigation">
                <ul class="pagination" >
                  <li>
                    <a v-for="page in pages" @click="carregarLazy(page)" :class="pageAtual === page ? 'selected' : ''">{{page}}</a>
                  </li>
                </ul>
              </nav>

            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</template>

<script>
  import SectionHeader from '../../shared/SectionHeader.vue'

  import { mapGetters, mapActions } from 'vuex'

  import { pessoaService } from '../../../_services/index'

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Listar', titleSmall: 'Pessoas' },
        breadcrumb: [{
          text: 'Cadastro',
          link: '/cadastro',
          icon: 'fa fa-dashboard'
        }, {
          text: 'Pessoas',
          link: '/cadastro/pessoa',
          icon: 'fa fa-home'
        },{
          text: 'Listar',
          link: '#',
          active: 'active'
        }]
      }
    },components: {
      sectionHeader: SectionHeader
    },
    created() {
      this.listarAction()
    },
    computed: {
      ...mapGetters({
        pessoa: 'pessoa/pessoa',
        pessoas: 'pessoa/pessoas',
        pages: 'pessoa/pages',
        pageAtual: 'pessoa/pageAtual',
        first: 'pessoa/first',
        max: 'pessoa/max'
      })
    },
    methods: {
      ...mapActions({
        setAction: 'setAction',
        setPessoa: 'pessoa/setPessoa',
        getPessoas: 'pessoa/setPessoas',
        novoPessoa: 'pessoa/novoPessoa',
        removePessoa: 'pessoa/removePessoa',
        pesquisarPessoas: 'pessoa/pesquisarPessoas',
        setPageAtual: 'pessoa/setPageAtual',
        setFirst: 'pessoa/setFirst'
      }),
      carregarLazy(page){
        if (page > this.pageAtual){
          let dif = page - this.pageAtual
          this.setFirst(this.first + (this.max * dif))
          this.setPageAtual(page)
          this.getPessoas()
        }else if(page < this.pageAtual){
          let dif = this.pageAtual - page
          this.setFirst(this.first - (this.max * dif))
          this.setPageAtual(page)
          this.getPessoas()
        }
      },
      listarAction(){
        this.setAction('listar')
        this.getPessoas()
        this.novoPessoa()
      },
      novoAction(){
        this.setAction('novo')
        this.novoPessoa()
      },
      cancelarAction(){
        this.listarAction()
      },
      editAction(pessoa) {
        pessoaService.getById(pessoa.id).then(
          response => {
            this.setAction('novo')
            this.setPessoa(response.data)
          }
        )
      }
    }
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