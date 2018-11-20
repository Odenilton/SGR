<template>
  <div class="wrapper">
    
    <vue-title title="SGR - Sistema Gerador de Recibos"></vue-title>

    <app-header></app-header>
    <app-menu></app-menu>

    <div class="content-wrapper">
      <loader></loader>
      <router-view></router-view>
    </div>
    
    <app-footer></app-footer>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex"

import VueTitle from "./components/shared/VueTitle.vue"

import Header from "./components/shared/Header.vue"

import Menu from "./components/shared/Menu.vue"
import Footer from "./components/shared/Footer.vue"

import VueBodyLogin from "./components/shared/VueBodyLogin.vue"

import Loader from "./components/shared/Loader.vue"

export default {
  components: {
    vueTitle: VueTitle,
    appHeader: Header,
    appMenu: Menu,
    appFooter: Footer,
    vueBodyLogin: VueBodyLogin,
    loader: Loader
  },
  computed: {
    ...mapGetters({
      auth: "auth/isAuthenticated",
      util: "util",
      user: 'auth/usuario',
      loading: "loading"
    })
  },
  methods: {
    ...mapActions({
      setUtil: "setUtil",
      autoLogin: 'auth/tryAutoLogin'
    })
  },
  created() {
    this.autoLogin()
    this.setUtil(JSON.parse(localStorage.getItem("util")));
  }
};
</script>