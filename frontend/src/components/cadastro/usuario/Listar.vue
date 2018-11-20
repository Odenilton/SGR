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
                      <input type="text" v-model="usuario.id" class="form-control form-control-sm" placeholder="Código">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome</label>
                      <input type="text" v-model="usuario.name" class="form-control form-control-sm" placeholder="Nome">
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
                  <button @click="pesquisarUsuarios(usuario)" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Pesquisar</button>
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
            <h3 class="box-title">Usuarios</h3>

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
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="usuario in usuarios" :key="usuario.id">
                <td>{{ usuario.id}}</td>
                <td>{{ usuario.name}}</td>
                <td>{{ usuario.email}}</td>
                <td>
                  <button @click="editAction(usuario)" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                  <button @click="removeUsuario(usuario.id)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                </td>
              </tr>
              <tr v-if="usuarios.length <= 0">
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

  import Vue from 'vue'

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Listar', titleSmall: 'Usuarios' },
        breadcrumb: [{
          text: 'Cadastro',
          link: '/cadastro',
          icon: 'fa fa-dashboard'
        }, {
          text: 'Usuarios',
          link: '/cadastro/usuario',
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
        usuario: 'usuario/usuario',
        usuarios: 'usuario/usuarios'
      })
    },
    methods: {
      ...mapActions({
        setAction: 'setAction',
        setUsuario: 'usuario/setUsuario',
        getUsuarios: 'usuario/setUsuarios',
        novoUsuario: 'usuario/novoUsuario',
        removeUsuario: 'usuario/removeUsuario',
        pesquisarUsuarios: 'usuario/pesquisarUsuarios',
      }),
      listarAction(){
        this.setAction('listar')
        this.getUsuarios()
        this.novoUsuario()
      },
      novoAction(){
        this.setAction('novo')
        this.novoUsuario()
      },
      cancelarAction(){
        this.listarAction()
      },
      editAction(usuario) {
        this.setAction('novo')
        this.setUsuario(usuario)
      }
    }
  }
</script>