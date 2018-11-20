import {parametroService} from '../../_services'

import {store} from '..'

import {
  message
} from '../../_helpers'

const util = JSON.parse(localStorage.getItem('util'))

function Parametro() {
    this.id = null
    this.ano = util ? util.ano.descricao : '' 
    this.mes = util ? util.mes.value : ''
    this.orgao = {
        id: util ? util.orgao.id : ''
    }
}

const state = {
    parametro: new Parametro,
    parametros: [],
    form: {}
}

const mutations = {
    'SET_PARAMETROS'(state, parametros) {
        state.parametros = parametros
    },
    'SET_PARAMETRO'(state, parametro) {
        state.parametro = parametro
    },
    'SET_FORM'(state, form) {
        state.form = form
    }
}

const actions = {
    novoParametro: (context, parametro) => {
        context.commit('SET_PARAMETRO', new Parametro)
    },
    setParametros: (context, {parametro, clonar}) => {
       return parametroService.search(parametro)
            .then(response => {
                if (clonar){
                  response.data[0].id = null
                  response.data[0].descricao = ''
                  response.data[0].mes = util.mes.value
                  response.data[0].orgao = {}
                  response.data[0].orgao.id = util.orgao.id
                  context.commit('SET_PARAMETRO', response.data[0])
                }
                if (response.data[0] && !clonar){
                  response.data[0].orgao = {}
                  response.data[0].orgao.id = util.orgao.id
                  context.commit('SET_PARAMETRO', response.data[0])
                }
            },error => {
                    if (error.response.data.status){
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: error.response.data.message
                      }, 
                      { root: true })
                    }else{
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: 'Não foi possível processar sua solicitação'
                      }, 
                      { root: true })
                    }
                })
    },
    setParametro: (context, parametro) => {
        context.commit('SET_PARAMETRO', parametro)
    },
    saveParametro: (context, parametro) => {
        parametroService.save(parametro)
            .then(
                response => {
                    context.commit('SET_PARAMETROS', response.data)
                    context.dispatch('alert/success', {
                      title: 'Sucesso',
                      message: message.mensagemSucessoSalvar()
                    }, {
                      root: true
                    })
                  },
                  error => {
                    if (error.response.data.status){
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: error.response.data.message
                      }, 
                      { root: true })
                    }else{
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: 'Não foi possível processar sua solicitação'
                      }, 
                      { root: true })
                    }
                }
            )
    },
    editParametro: (context, parametro) => {
        parametroService.edit(parametro)
        .then(
                response => {
                    context.commit('SET_PARAMETROS', response.data)
                    context.dispatch('alert/success', {
                      title: 'Sucesso',
                      message: message.mensagemSucessoAlterar()
                    }, {
                      root: true
                    })
                },
                error => {
                    if (error.response.data.status){
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: error.response.data.message
                      }, 
                      { root: true })
                    }else{
                      context.dispatch('alert/error', 
                      {
                        title: 'Erro', 
                        message: 'Não foi possível processar sua solicitação'
                      }, 
                      { root: true })
                    }
                }
            )
    },

    setForm: (context, form) => {
        context.commit('SET_FORM', form)
    },
    carregarParametrosPorMesAnoEOrgao(context, parametro){
      return parametroService.search(parametro)
    }
}

const getters = {
    parametros: state => {
        return state.parametros
    },
    parametro: state => {
        return state.parametro
    },
    form: state => {
        return state.form
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}