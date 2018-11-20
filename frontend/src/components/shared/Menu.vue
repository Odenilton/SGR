<template>
 <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">Menu</li>
      <li class="treeview">
        <router-link to="/" tag="a" activeClass="active">
          <i class="fa fa-home"></i> <span>Home</span>  
        </router-link>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Cadastro</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <router-link to="/cadastro/pessoa" tag="li" activeClass="active">
            <a href="#"><i class="fa fa-user-plus"></i> Pessoas</a>
          </router-link>
          <router-link to="/cadastro/parametro" tag="li" activeClass="active">
            <a href="#"><i class="fa fa-cogs"></i> Paramêtros</a>
          </router-link>
          <router-link v-if="security.getPermissaoAdministrador()" to="/cadastro/usuario" tag="li" activeClass="active">
            <a href="#"><i class="fa fa-group"></i> Usuários</a>
          </router-link>
          <router-link v-if="security.getPermissaoAdministrador()" to="/cadastro/grupo" tag="li" activeClass="active">
            <a href="#"><i class="fa fa-shield"></i> Grupos</a>
          </router-link>
          <router-link to="/cadastro/orgao" tag="li" activeClass="active">
            <a href="#"><i class="fa fa-bank"></i> Orgãos</a>
          </router-link>
        </ul>
      </li>

      <li class="treeview">
        <router-link to="/recibo" tag="a" activeClass="active">
          <i class="fa fa-sticky-note-o"></i> <span>Recibos</span>  
        </router-link>
      </li>

      <li class="treeview">
        <router-link to="/relatorio" tag="a" activeClass="active">
          <i class="fa fa-file-pdf-o"></i> <span>Relatórios</span>  
        </router-link>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
</template>

<script>
import { security } from "../../_helpers"

export default {
  data: function () {
    return {
      security: security
    }
  }
}
</script>