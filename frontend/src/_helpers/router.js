import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../components/shared/Home.vue'

import {store} from '../_store'

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

Vue.use(VueRouter)


const routes = [
    { path: '/', component: Home, meta: { role_usuario: true} },
    { path: '/cadastro', component: Cadastro },
    { path: '/cadastro/orgao', component: Orgao },
    { path: '/cadastro/pessoa', component: Pessoa },
    { path: '/cadastro/parametro', component: Parametro },
    { path: '/cadastro/usuario', component: Usuario },
    { path: '/cadastro/grupo', component: Grupo },
    { path: '/recibo', component: Recibo },
    { path: '/relatorio', component: Relatorio },
    { path: '/relatorio/recibo-mes', component: ReciboMes },
    { path: '*', redirect: '/' }
]

export const router = new VueRouter({routes})

/*router.beforeEach((to, from, next) => {
  store.state.loading = true

  // redirect to login page if not logged in and trying to access a restricted page
  const publicPages = ['/login', '/cadastro/signup']
  const adminPages = ['cadastro/usuario']

  const authRequired = !publicPages.includes(to.path)
  const noAuthRequired = publicPages.includes(to.path)
  const loggedIn = localStorage.getItem('token');
  const isAdmin = adminPages.includes(to.path)

  if (authRequired && !loggedIn) {
    return next('/login');
  }

  //if (isAdmin && )

  if (noAuthRequired && loggedIn){
    store.state.loading = false
    return next('/')
  }
  
  next()
})

 router.afterEach((to, from) => {
   store.state.loading = false
   if (to.path !== '/login'){
    store.dispatch('auth/tryAutoLogin') 
  }
 })*/