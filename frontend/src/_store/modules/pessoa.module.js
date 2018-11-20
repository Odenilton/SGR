import {
  pessoaService
} from '../../_services'

import {
  store
} from '..'

import {
  message
} from '../../_helpers'

function Pessoa() {
  this.sexo = '',
  this.ufNaturalidade = '',
  this.rgUfOrgaoExpeditor = '',
  this.endereco = {
    zonaEndereco: '',
    uf: ''
  },
  this.banco = ''
  this.tipoConta = '',
  this.formaPagamento = ''
}


const state = {
  pessoa: new Pessoa,
  pessoas: [],
  form: {},
  pages: 0,
  pageAtual: 1,
  totalRegistro: 0,
  first: 0,
  max: 4
}

const mutations = {
  'SET_PESSOAS' (state, pessoas) {
    state.pessoas = pessoas
  },
  'SET_PESSOA' (state, pessoa) {
    state.pessoa = pessoa
  },
  'SET_FORM' (state, form) {
    state.form = form
  },
  'SET_ENDERECO' (state, endereco) {
    state.pessoa.endereco = endereco
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
  novoPessoa: (context, turma) => {
    context.commit('SET_PESSOA', new Pessoa)
  },
  setPessoas: (context) => {
    pessoaService.getCount().then(
      response => {
        context.commit('SET_TOTAL_REGISTRO', response.data[0][1])

        pessoaService.getAllLazy(store.getters['pessoa/first'], store.getters['pessoa/max'])
          .then(
            response => {
              context.commit('SET_PESSOAS', response.data)
              context.commit('SET_PAGES', Math.ceil(store.getters['pessoa/totalRegistro']/store.getters['pessoa/max']))
            }
          )

      }
    )
   /* pessoaService.getAll()
    .then(
      response => {
        context.commit('SET_PESSOAS', response.data)
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
      )*/
  },
  setPessoa: (context, pessoa) => {
    context.commit('SET_PESSOA', pessoa)
  },
  savePessoa: (context, pessoa) => {
    pessoaService.save(pessoa)
    .then(
      response => {
        context.commit('SET_PESSOA', new Pessoa)
        context.dispatch('setPessoas')
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
  editPessoa: (context, pessoa) => {
    pessoaService.edit(pessoa)
    .then(
      response => {
        context.commit('SET_PESSOA', new Pessoa)
        context.dispatch('setPessoas')
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
  removePessoa: (context, id) => {
    pessoaService.remove(id)
    .then(
      response => {
        context.dispatch('setPessoas')
        context.dispatch('alert/success', {
          title: 'Sucesso',
          message: message.mensagemSucessoRemover()
        }, {
          root: true
        })
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
            message: message.mensagemErroRemover()
          }, {
            root: true
          })
        }
      }
      )
  },
  pesquisarPessoas: (context, pessoa) => {
    pessoaService.search(pessoa)
    .then(
      response => {
        context.commit('SET_PESSOAS', response.data.data)
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
  buscarPessoaPorCpf: (context, cpf) => {
    return pessoaService.search(cpf)
  },
  setForm: (context, form) => {
    context.commit('SET_FORM', form)
  }, 
  obterEndereco: (context, cep, endereco) => {
      pessoaService.obterEndereco(cep)
      .then(
      response => {
        var data = response.data
        if (data.erro){
            context.dispatch('alert/error', {
                title: 'Erro',
                message: message.mensagemErroPesquisar()
              }, {
                root: true
              })
        }else{
            var id = store.getters['pessoa/pessoa'].endereco.id
            var uf = ''
            store.getters.estados.map((estado)=>{
                if (data.uf === estado.str){
                    uf = estado.value
                }
            })
            const endereco = {
                id: id,
                cep: cep,
                zonaEndereco: '1',
                logradouro: data.logradouro.toUpperCase(),
                cidade: data.localidade.toUpperCase(),
                complemento: data.complemento.toUpperCase(),
                bairro: data.bairro.toUpperCase(),
                uf: uf
            }
            context.commit('SET_ENDERECO', endereco)
        }
      })
  },
  setPageAtual(context, page){
    context.commit('SET_PAGE_ATUAL', page)
  },
  setFirst(context, first) {
    context.commit('SET_FIRST', first)
  }
}

const getters = {
  pessoas: state => {
    return state.pessoas
  },
  pessoa: state => {
    return state.pessoa
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
