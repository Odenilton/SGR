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
              <h3 class="box-title">Dados da pessoa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <pessoa-dados-pessoais :pessoa="pessoa"></pessoa-dados-pessoais>
                <!-- <pessoa-deducoes :pessoa="pessoa"></pessoa-deducoes> -->
                <pessoa-endereco :pessoa="pessoa"></pessoa-endereco>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(pessoa)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
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

  import PessoaDadosPessoais from './PessoaDadosPessoais.vue'
  import PessoaDeducoes from './PessoaDeducoes.vue'
  import PessoaEndereco from './PessoaEndereco.vue'

  export default {
   data: function () {
    return {
      sectionHeader: { title: 'Cadastro', titleSmall: 'Pessoa' },
      breadcrumb: [{
        text: 'Cadastro',
        link: '/cadastro',
        icon: 'fa fa-dashboard'
      }, {
        text: 'Pessoa',
        link: '/cadastro/pessoa',
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
    pessoaDadosPessoais: PessoaDadosPessoais,
    pessoaDeducoes: PessoaDeducoes,
    pessoaEndereco: PessoaEndereco
  },
  computed: {
    ...mapGetters({
      pessoa: 'pessoa/pessoa',
      form: 'pessoa/form',
      estados: 'estados'
    })
  },
  methods: {
    ...mapActions({
      setAction: 'setAction',
      novoPessoa: 'pessoa/novoPessoa',
      savePessoa: 'pessoa/savePessoa',
      editPessoa: 'pessoa/editPessoa',
    }),
    listarAction(){
      this.setAction('listar')
      this.novoPessoa()
    },
    cancelarAction(){
      this.listarAction()
    },
    saveAction(pessoa){
      if (!pessoa.id){
        this.savePessoa(pessoa)
        this.listarAction()
      }else {
        this.editPessoa(pessoa)
        this.listarAction()
      }
    }
  },
}
</script>
