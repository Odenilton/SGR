import { relatorioService } from '../../_services'

import { message } from '../../_helpers'

function Relatorio() {
    this.isINSS = true,
    this.isIRRF =true,
    this.isISS = true
}


const state = {
    relatorio: new Relatorio()
}

const mutations = {
    'SET_RELATORIO' (state, relatorio) {
        state.relatorio = relatorio
    },
}

const actions = {
    setRelatorio: (context, relatorio) => {
        context.commit('SET_RELATORIO', relatorio)
    },
    imprimirReciboMes: (context, relatorio) => {
        relatorioService.imprimirReciboMes(relatorio, {
            responseType: 'arraybuffer',
          })
        .then(
            response => {
                var blob = new Blob([response.data], {
                    type: 'application/pdf'
                });
                var url = window.URL.createObjectURL(blob)
                window.open(url);
            },
            error => {
              if (error.response.data.status) {
                context.dispatch('alert/error', {
                  title: 'Erro',
                  message: error.response.data.message
                }, {
                  root: true
                })
              } else {
                context.dispatch('alert/error', {
                  title: 'Erro',
                  message: message.mensagemErroImprimir()
                }, {
                  root: true
                })
              }
            }
            )
    }
}

const getters = {
    relatorio: state => {
        return state.relatorio
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}