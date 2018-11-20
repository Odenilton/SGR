import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../components/shared/Home.vue'

import {store} from '../_store'

import security from "./security"

import SignupPage from '../components/auth/signup.vue'
import SigninPage from '../components/auth/signin.vue'

import Cadastro from '../components/cadastro/Cadastro.vue'
import Pessoa from '../components/cadastro/pessoa/Pessoa.vue'
import Orgao from '../components/cadastro/orgao/Orgao.vue'
import Parametro from '../components/cadastro/parametro/Parametro.vue'
import Usuario from '../components/cadastro/usuario/Usuario.vue'
import Grupo from '../components/cadastro/grupo/Grupo.vue'

import Recibo from '../components/recibo/Recibo.vue'

import Relatorio from '../components/relatorio/Relatorio.vue'
import ReciboMes from '../components/relatorio/recibo-mes/ReciboMes.vue'

import Unauthorized from '../components/errors/Unauthorized.vue'

Vue.use(VueRouter)

let route = new VueRouter({
  routes: [
    { path: '/', component: Home, meta: { requiresAuth: true } },
    { path: '/cadastro', component: Cadastro, meta: { requiresAuth: true } },
    { path: '/cadastro/orgao', component: Orgao, meta: { requiresAuth: true } },
    { path: '/cadastro/pessoa', component: Pessoa, meta: { requiresAuth: true } },
    { path: '/cadastro/parametro', component: Parametro, meta: { requiresAuth: true } },
    { path: '/cadastro/usuario', component: Usuario, meta: { requiresAuth: true, requiresIsAdministrator: true } },
    { path: '/cadastro/grupo', component: Grupo, meta: { requiresAuth: true, requiresIsAdministrator: true } },
    { path: '/recibo', component: Recibo, meta: { requiresAuth: true } },
    { path: '/relatorio', component: Relatorio, meta: { requiresAuth: true } },
    { path: '/relatorio/recibo-mes', component: ReciboMes, meta: { requiresAuth: true } },
    { path: '/unauthorized', component: Unauthorized, meta: { requiresAuth: true } },
    { path: '*', redirect: '/' }
  ]
})

route.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!security.getIsAuthenticated() && to.path !== '/') {
      console.log( to.path)
      window.location.assign('/')
    } 
  } else {
    next() // make sure to always call next()!
  }
  
  if (to.matched.some(record => record.meta.requiresIsAdministrator)) {
    if (security.getPermissaoAdministrador()) {
      next()
    } else {
      next('/unauthorized')
    }
  } else {
    next() // make sure to always call next()!
  }
})

export const router = route