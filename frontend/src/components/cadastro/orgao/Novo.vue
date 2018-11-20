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
              <h3 class="box-title">Dados da orgão</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" :class="validaClasse($v.orgao.nome)">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" v-uppercase v-model.lazy="orgao.nome" class="form-control input-sm" @blur="callTouch($v.orgao.nome)"  placeholder="Nome">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.orgao.nome)"></campo-obrigatorio>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group" :class="validaClasse($v.orgao.cnpj)">
                        <label for="email">CNPJ</label>
                        <input type="text" id="email" v-mask="'##.###.###/####-##'" v-model="orgao.cnpj" class="form-control input-sm" @blur="callTouch($v.orgao.cnpj)"  placeholder="CNPJ">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.orgao.cnpj)"></campo-obrigatorio>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group" :class="validaClasse($v.orgao.responsavel)">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="responsavel" v-uppercase v-model.lazy="orgao.responsavel" class="form-control input-sm" @blur="callTouch($v.orgao.responsavel)"  placeholder="Responsável">
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.orgao.responsavel)"></campo-obrigatorio>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(orgao)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
                <button @click="cancelarAction()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
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
      sectionHeader: { title: 'Cadastro', titleSmall: 'Orgão' },
      breadcrumb: [{
        text: 'Cadastro',
        link: '/cadastro',
        icon: 'fa fa-dashboard'
      }, {
        text: 'Orgão',
        link: '/cadastro/orgao',
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
      orgao: 'orgao/orgao',
      form: 'orgao/form'
    })
  },
  methods: {
    ...mapActions({
      setAction: 'setAction',
      setForm: 'orgao/setForm',
      novoOrgao: 'orgao/novoOrgao',
      saveOrgao: 'orgao/saveOrgao',
      editOrgao: 'orgao/editOrgao',
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
      this.novoOrgao()
    },
    cancelarAction(){
      this.listarAction()
    },
    saveAction(orgao){
      if (!orgao.id){
          this.saveOrgao(orgao)
          this.listarAction()
        }else {
          this.editOrgao(orgao)
          this.listarAction()
        }
    }
  },
  validations: {
    orgao: validate
  },
  created() {
      this.setForm(this.$v)
    }
}
</script>
