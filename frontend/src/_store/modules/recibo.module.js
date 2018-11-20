import {
  reciboService
} from '../../_services'

import {
  message
} from '../../_helpers'

import {
  store
} from '..'

function Recibo() {
  this.pessoa = {},
  this.qtdDependentes = 0,
  this.ligacaoOrgao = ''
}

const state = {
  recibo: new Recibo,
  recibos: [],
  form: {},
  pages: 0,
  pageAtual: 1,
  totalRegistro: 0,
  first: 0,
  max: 4
}

const mutations = {
  'SET_RECIBOS' (state, recibos) {
    state.recibos = recibos
  },
  'SET_RECIBO' (state, recibo) {
    state.recibo = recibo
  },
  'SET_FORM' (state, form) {
    state.form = form
  },
  'SET_PAGES' (state, pages){
    state.pages = pages
  },
  'SET_PAGE_ATUAL' (state, page){
    state.pageAtual = page
  },
  'SET_TOTAL_REGISTRO' (state, totalRegistro){
    state.totalRegistro = totalRegistro
  },
  'SET_FIRST' (state, first){
    state.first = first
  }
}

const actions = {
  novoRecibo: (context, recibo) => {
    context.commit('SET_RECIBO', new Recibo)
  },
  setRecibos: (context, recibo) => {
    reciboService.getCount(recibo).then(
      response => {
        context.commit('SET_TOTAL_REGISTRO', response.data[0][1])

        reciboService.getAllLazy(recibo, store.getters['recibo/first'], store.getters['recibo/max'])
          .then(
            response => {
              context.commit('SET_RECIBOS', response.data)
              context.commit('SET_PAGES', Math.ceil(store.getters['recibo/totalRegistro']/store.getters['recibo/max']))
            }
          )

      }
    )
    /*reciboService.search(recibo)
      .then(
        response => {
          context.commit('SET_RECIBOS', response.data)
        },
        error => {
          context.dispatch('alert/error', {
            title: 'Erro',
            message: 'Houve um erro ao carregar os dados'
          }, {
            root: true
          })
        }
      )*/
  },
  setRecibo: (context, recibo) => {
    context.commit('SET_RECIBO', recibo)
  },
  saveRecibo: (context, recibo) => {
    reciboService.save(recibo)
      .then(
        response => {
          context.commit('SET_RECIBO', new Recibo)
          actions.setRecibos(context, recibo)
          context.dispatch('alert/success', {
            title: 'Sucesso',
            message: message.mensagemSucessoSalvar()
          }, {
            root: true
          })
        },
        error => {
          context.dispatch('alert/error', {
            title: 'Erro',
            message: message.mensagemErroSalvar()
          }, {
            root: true
          })
        }
      )
  },
  editRecibo: (context, recibo) => {
    reciboService.edit(recibo)
      .then(
        response => {
          context.commit('SET_RECIBO', new Recibo)
          actions.setRecibos(context, recibo)
          context.dispatch('alert/success', {
            title: 'Sucesso',
            message: message.mensagemSucessoAlterar()
          }, {
            root: true
          })
        },
        error => {
          context.dispatch('alert/error', {
            title: 'Erro',
            message: message.mensagemErroAlterar()
          }, {
            root: true
          })
        }
      )
  },
  removeRecibo: (context, id) => {
    reciboService.remove(id)
      .then(
        response => {
          context.dispatch('alert/success', {
            title: 'Sucesso',
            message: message.mensagemSucessoRemover()
          }, {
            root: true
          })
          actions.setRecibos(context, {
              ano: store.state.util.ano.descricao,
              mes: store.state.util.mes.status,
              orgao: {
                id: store.state.util.orgao.id
              }
            },
            error => {
              context.dispatch('alert/error', {
                title: 'Erro',
                message: message.mensagemErroRemover()
              }, {
                root: true
              })
            })
        })
  },
  pesquisarRecibos: (context, recibo) => {
    reciboService.search(recibo)
      .then(
        response => {
          console.log(response)
          context.commit('SET_RECIBOS', response.data.data)
        },
        error => {
          context.dispatch('alert/error', {
            title: 'Erro',
            message: message.mensagemErroPesquisar()
          }, {
            root: true
          })
        }
      )
  },
  setForm: (context, form) => {
    context.commit('SET_FORM', form)
  },
  imprimirRecibo: (context, id) => {
    reciboService.getComParams(`relatorio/recibo/${id}`, {
        responseType: 'arraybuffer',
      })
      .then(
        (response) => {
          var blob = new Blob([response.data], {
            type: 'application/pdf'
          });
          var url = window.URL.createObjectURL(blob)
          window.open(url);
        },
        error => {
          context.dispatch('alert/error', {
            title: 'Erro',
            message: message.mensagemErroImprimir()
          }, {
            root: true
          })
        }
      )
  },
  setPageAtual(context, page){
    context.commit('SET_PAGE_ATUAL', page)
  },
  setFirst(context, first) {
    context.commit('SET_FIRST', first)
  }
}

const getters = {
  recibos: state => {
    return state.recibos
  },
  recibo: state => {
    return state.recibo
  },
  form: state => {
    return state.form
  },
  pages: state => {
    return state.pages
  },
  pageAtual: state => {
    return state.pageAtual
  },
  first: state => {
    return state.first
  },
  max: state => {
    return state.max
  },
  totalRegistro: state => {
    return state.totalRegistro
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
