<template>
  <div>
    <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>

    <section class="content">

      <h2>Seja bem Vindo ao SGC-GT</h2>
  
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
                  <router-link to="/cadastro" activeClass="active">
                    <center><i class="fa fa fa-book iconHome"></i></center>
                    <p class="textRouter">Cadastros</p>
                  </router-link>
                </div>
                <div class="col-md-1">
                  <router-link to="/recibo" activeClass="active">
                    <center><i class="fa fa-sticky-note-o iconHome"></i></center>
                    <p class="textRouter">Recibos</p>
                  </router-link>
                </div>
                <div class="col-md-1">
                  <router-link to="/relatorio" activeClass="active">
                    <center><i class="fa fa-file-pdf-o iconHome"></i></center>
                    <p class="textRouter">Relatórios</p>
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
  import SectionHeader from './SectionHeader.vue'

  export default {
    data: function () {
      return {
        sectionHeader: { title: 'Home', titleSmall: 'Dashboard' },
        breadcrumb: [{
          text: 'Home',
          link: '/',
          icon: 'fa fa-book'
        }, {
          text: 'Dashboard',
          link: '/',
          icon: 'fa fa-dashboard',
          active: 'active'
        }]
      }
    },
    components: {
      sectionHeader: SectionHeader
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