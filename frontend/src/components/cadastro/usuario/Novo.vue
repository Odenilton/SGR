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
              <h3 class="box-title">Dados da usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.usuario.name)">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" v-uppercase v-model.lazy="usuario.name" class="form-control input-sm" @blur="callTouch($v.usuario.name)"  placeholder="Nome">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.usuario.name)"></campo-obrigatorio>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.usuario.email)">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" v-model="usuario.email" class="form-control input-sm" @blur="callTouch($v.usuario.email)"  placeholder="Email">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.usuario.email)"></campo-obrigatorio>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.usuario.password)">
                        <label for="password">Senha<small v-if="usuario.id">&nbsp;(Deixe em branco para nao alterar)</small></label>
                        <input type="password" id="password" blur="callTouch($v.usuario.password)" v-model="usuario.password" class="form-control input-sm" placeholder="Senha">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.usuario.password)"></campo-obrigatorio>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.usuario.grupos)">
                        <label for="grupos">Grupo de acesso<small>&nbsp;(Use Ctrl para selecionar mais de um)</small></label>
                        <select v-model="usuario.grupos" blur="callTouch($v.usuario.grupos)" id="grupos" multiple="" class="form-control">
                          <option v-for="grupo in grupos" :key="grupo.id" :value="grupo">{{grupo.descricao}}</option>
                        </select>
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.usuario.grupos)"></campo-obrigatorio>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(usuario)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
                <button @click="cancelarAction('listar')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                <hr>

              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  import SectionHeader from '../../shared/SectionHeader.vue'

  import { mapGetters, mapActions } from 'vuex'

  import validate from './validate'
  import { classe, touch, exibirCampoObrigatorio } from '../../shared/validates'
  import CampoObrigatorio from '../../shared/CampoObrigatorio.vue'

  export default {
   data: function () {
    return {
      sectionHeader: { title: 'Cadastro', titleSmall: 'Usuario' },
      breadcrumb: [{
        text: 'Cadastro',
        link: '/cadastro',
        icon: 'fa fa-dashboard'
      }, {
        text: 'Usuario',
        link: '/cadastro/usuario',
        icon: 'fa fa-home'
      },{
        text: 'Novo/Alterar',
        link: '',
        active: 'active'
      }]
    }
  },

  components: {
    sectionHeader: SectionHeader,
    campoObrigatorio: CampoObrigatorio
  },
  computed: {
    ...mapGetters({
      usuario: 'usuario/usuario',
      form: 'usuario/form',
      grupos: 'usuario/grupos'
    })
  },
  methods: {
    ...mapActions({
      setAction: 'setAction',
      setForm: 'usuario/setForm',
      novoUsuario: 'usuario/novoUsuario',
      saveUsuario: 'usuario/saveUsuario',
      editUsuario: 'usuario/editUsuario',
      getUsuarios: 'usuario/setUsuarios',
      getGrupos: 'usuario/getAllGrupos'
    }),
    validaClasse(obj) {
        return classe(obj)
    },
    callTouch(obj) {
        return touch(obj)
    },
    exibirCampoObrigatorio(obj){
        return exibirCampoObrigatorio(obj)
    },
    listarAction(){
      this.setAction('listar')
      this.novoUsuario()
    },
    cancelarAction(){
      this.listarAction()
    },
    saveAction(usuario){
      if (!usuario.id){
          this.saveUsuario(usuario)
          this.listarAction()
        }else {
          this.editUsuario(usuario)
          this.listarAction()
        }
    }
  },
  validations: {
    usuario: validate
  },
  created() {
      this.getGrupos()
      this.setForm(this.$v)
    }
}
</script>
