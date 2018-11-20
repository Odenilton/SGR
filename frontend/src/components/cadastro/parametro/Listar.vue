<template>
  <div v-if="action == 'listar'">

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
                      <input type="text" v-model="parametro.id" class="form-control form-control-sm" placeholder="Código">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome</label>
                      <input type="text" v-model="parametro.nome" class="form-control form-control-sm" placeholder="Nome">
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
                  <button @click="pesquisarParametros(parametro)" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Pesquisar</button>
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
            <h3 class="box-title">Parametros</h3>

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
            <table class="table table-hover">
             <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="parametro in parametros" :key="parametro.id">
                <td>{{ parametro.id}}</td>
                <td>{{ parametro.descricao}}</td>
                <td>
                  <button @click="editAction(parametro)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                </td>
              </tr>
              <tr v-if="parametros.length <= 0">
                <td>Nenhum registro encontrado</td>
              </tr>
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
  import SectionHeader from '../../shared/SectionHeader.vue'

  import { mapGetters, mapActions } from 'vuex'

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Listar', titleSmall: 'Parametros' },
        breadcrumb: [{
          text: 'Cadastro',
          link: '/cadastro',
          icon: 'fa fa-dashboard'
        }, {
          text: 'Parametros',
          link: '/cadastro/parametro',
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
        action: 'action',
        parametro: 'parametro/parametro',
        parametros: 'parametro/parametros'
      })
    },
    methods: {
      ...mapActions({
        setAction: 'setAction',
        setParametro: 'parametro/setParametro',
        getParametros: 'parametro/setParametros',
        novoParametro: 'parametro/novoParametro',
        removeParametro: 'parametro/removeParametro',
        pesquisarParametros: 'parametro/pesquisarParametros',
      }),
      listarAction(){
        this.setAction('novo')
        this.getParametros(this.parametro)
      },
      novoAction(){
        this.setAction('novo')
        this.novoParametro()
      },
      cancelarAction(){
        this.listarAction()
      },
      editAction(parametro) {
        this.setAction('novo')
        this.setParametro(this.parametro)
      }
    }
  }
</script>