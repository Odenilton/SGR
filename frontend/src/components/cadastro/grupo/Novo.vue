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
              <h3 class="box-title">Dados da grupo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.grupo.name)">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" v-uppercase v-model.lazy="grupo.name" class="form-control input-sm" @blur="callTouch($v.grupo.name)"  placeholder="Ex. ROLE_NOME">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.grupo.name)"></campo-obrigatorio>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group" :class="validaClasse($v.grupo.descricao)">
                        <label for="nome">Descrição</label>
                        <input type="text" id="nome" v-uppercase v-model.lazy="grupo.descricao" class="form-control input-sm" @blur="callTouch($v.grupo.descricao)"  placeholder="descricao">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.grupo.descricao)"></campo-obrigatorio>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(grupo)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
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
      sectionHeader: { title: 'Cadastro', titleSmall: 'Grupo' },
      breadcrumb: [{
        text: 'Cadastro',
        link: '/cadastro',
        icon: 'fa fa-dashboard'
      }, {
        text: 'Grupo',
        link: '/cadastro/grupo',
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
      grupo: 'grupo/grupo',
      form: 'grupo/form',
      grupos: 'grupo/grupos'
    })
  },
  methods: {
    ...mapActions({
      setAction: 'setAction',
      setForm: 'grupo/setForm',
      novoGrupo: 'grupo/novoGrupo',
      saveGrupo: 'grupo/saveGrupo',
      editGrupo: 'grupo/editGrupo',
      getGrupos: 'grupo/setGrupos'
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
      this.novoGrupo()
    },
    cancelarAction(){
      this.listarAction()
    },
    saveAction(grupo){
      if (!grupo.id){
          this.saveGrupo(grupo)
          this.listarAction()
        }else {
          this.editGrupo(grupo)
          this.listarAction()
        }
    }
  },
  validations: {
    grupo: validate
  },
  created() {
      this.getGrupos()
      this.setForm(this.$v)
    }
}
</script>
