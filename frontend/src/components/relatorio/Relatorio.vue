<template>
  <div>
    <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Links Utéis</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-1">
                  <router-link to="/" activeClass="active">
                    <center><i class="fa fa-home iconHome"></i></center>
                    <p class="textRouter">Home</p>
                  </router-link>
                </div>
                <div class="col-md-2">
                  <router-link to="/relatorio/recibo-mes" activeClass="active">
                    <center><i class="fa fa-file-pdf-o iconHome"></i></center>
                    <p class="textRouter">Relatórios de Recibos por mes</p>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  import SectionHeader from '../shared/SectionHeader.vue'

  import { security } from "../../_helpers"

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Relatórios', titleSmall: 'Links Utéis' },
        breadcrumb: [{
          text: 'Relatórios',
          link: '/relatório',
          icon: 'fa fa-book'
        }],
        security: security
      }
    },
    components: {
      sectionHeader: SectionHeader,
    }
  }
</script>

<style scoped>
  .iconHome {
    margin: 0 auto;
    text-align: center;
    font-size: 35pt;
  }
  .textRouter {
    text-align: center;
  }
</style>