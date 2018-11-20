import Vue from 'vue'
import Vuex from 'vuex'

import state from './state'
import mutations from './mutations'
import actions from './actions'
import getters from './getters'

import orgao from './modules/orgao.module'
import auth from './modules/authentication.module'
import usuario from './modules/usuario.module'
import grupo from './modules/grupo.module'
import pessoa from './modules/pessoa.module'
import recibo from './modules/recibo.module'
import parametro from './modules/parametro.module'

import alert from './modules/alert.module'

import relatorio from './modules/relatorio.module'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state,
    mutations,
    actions,
    getters,
    modules: {
        auth,
        orgao,
        usuario,
        grupo,
        pessoa,
        recibo,
        parametro,
        alert,
        relatorio
    }
})
