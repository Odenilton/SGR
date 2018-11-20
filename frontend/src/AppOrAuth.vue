<template>
    <div>
        <app v-if="auth"></app>
        <auth v-if="!auth"></auth>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex"

import App from './App.vue'
import Auth from './components/auth/signin.vue'

export default {
  components: {
    app: App,
    auth: Auth
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
      autoLogin: 'auth/tryAutoLogin'
    })
  },
  created() {
    this.autoLogin()
  }
};
</script>