<template>
  <header class="main-header">
    <!-- Logo -->
    <router-link to="/" tag="a" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SGR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-desktop" style="color: red;"></i> SGR</span>
    </router-link>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
      
        <ul class="nav navbar-nav">       
            <li class="user user-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{util.orgao.nome}} - {{util.mes.descricao}} - {{util.ano.descricao}}</span>
            </a>
            </li>
        </ul>
        <ul class="nav navbar-nav">       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{user.nome}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                 {{user.nome}}
                  <small>{{user.email}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <button type="button" @click="logout" class="btn btn-default btn-flat">Sair</button>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    computed: {
      ...mapGetters({
        user: "auth/usuario",
        util: 'util'
      })
    },
     methods: {
      ...mapActions({
        logout: "auth/logout"
      }),
    }
  }
</script>