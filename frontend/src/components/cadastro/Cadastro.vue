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
                <div class="col-md-1">
                  <router-link to="/cadastro/pessoa" activeClass="active">
                    <center><i class="fa fa-user-plus iconHome"></i></center>
                    <p class="textRouter">Pessoas</p>
                  </router-link>
                </div>
                <div class="col-md-1">
                  <router-link to="/cadastro/parametro" activeClass="active">
                    <center><i class="fa fa-cog iconHome"></i></center>
                    <p class="textRouter">Paramêtros</p>
                  </router-link>
                </div>
                <div v-if="security.getPermissaoAdministrador()" class="col-md-1">
                  <router-link to="/cadastro/usuario" activeClass="active">
                    <center><i class="fa fa-group iconHome"></i></center>
                    <p class="textRouter">Usuários</p>
                  </router-link>
                </div>
                <div v-if="security.getPermissaoAdministrador()" class="col-md-1">
                  <router-link to="/cadastro/grupo" activeClass="active">
                    <center><i class="fa fa-shield iconHome"></i></center>
                    <p class="textRouter">Grupos</p>
                  </router-link>
                </div>
                <div class="col-md-1">
                  <router-link to="/cadastro/orgao" activeClass="active">
                    <center><i class="fa fa fa-bank iconHome"></i></center>
                    <p class="textRouter">Orgãos</p>
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
        sectionHeader: { title: 'Cadastro', titleSmall: 'Links Utéis' },
        breadcrumb: [{
          text: 'Cadastro',
          link: '/cadastro',
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