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
              <h3 class="box-title">Parametros do relatorio</h3>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body">
                    <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Debitos</h3>
                        <br /> <br />
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" v-model="relatorio.isINSS">
                                    Incluir debito INSS
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" v-model="relatorio.isIRRF">
                                    Incluir debito IRRF
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" v-model="relatorio.isISS">
                                    Incluir debito ISS
                                    </label>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                 </div>
                </div>
                <div class="box-footer">
                    <button type="button" @click="imprimir()" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Imprimir</button>
                    <router-link to="/relatorio" activeClass="active">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Voltar</button>
                    </router-link>
                </div>
            </form>
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
        sectionHeader: { title: 'Listar', titleSmall: 'Recibos' },
        breadcrumb: [{
          text: 'Relatórios',
          link: '/relatorio',
          icon: 'fa fa-sticky-note-o'
        },{
          text: 'Recibo por mes',
          link: '#',
          active: 'active'
        }],
      }
    },components: {
      sectionHeader: SectionHeader,
    },
     computed: {
      ...mapGetters({
          relatorio: 'relatorio/relatorio',
          util: 'util'
      })
    },
    methods: {
        ...mapActions({
            imprimirReciboMes: 'relatorio/imprimirReciboMes'
        }),
        imprimir(){
            let payload = {
                    ano: this.util.ano.descricao, 
                    mes: this.util.mes.value,
                    orgao: {id: this.util.orgao.id, nome: this.util.orgao.nome},
                    relatorio: this.relatorio
            }
            this.imprimirReciboMes(payload)
        }
    },
    created() {
    },
  }
</script>