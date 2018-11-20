import {userService} from '../../_services'

import {message} from '../../_helpers'

function Usuario() {
  this.grupos = []
}

const state = {
    usuario: new Usuario,
    usuarios: [],
    form: {},
    grupos: []
}

const mutations = {
    'SET_USUARIOS' (state, usuarios) {
        state.usuarios = usuarios
    },
    'SET_USUARIO' (state, usuario) {
        state.usuario = usuario
    },
    'SET_FORM' (state, form) {
        state.form = form
    },
    'SET_GRUPOS' (state, grupos){
      state.grupos = grupos
    }
}

const actions = {
    novoUsuario: (context, usuario) => {
        context.commit('SET_USUARIO', new Usuario)
    },
    setUsuarios: (context) => {
        userService.getAll()
        .then(response => {
            context.commit('SET_USUARIOS', response.data)
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
      })
    },
    setUsuario: (context, usuario) => {
        delete usuario.password
        context.commit('SET_USUARIO', usuario)
    },
    saveUsuario: (context, usuario) => {
        delete usuario.grupos.name
        delete usuario.grupos.descricao
        userService.save(usuario)
            .then(
                  response => {
                    context.dispatch('setUsuarios')
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
    editUsuario: (context, usuario) => {
        delete usuario.grupos.name
        delete usuario.grupos.descricao
        userService.edit(usuario)
            .then(
                  response => {
                    context.dispatch('setUsuarios')
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
    removeUsuario: (context, id) => {
       userService.remove(id)
            .then(
              response => {
                context.dispatch('setUsuarios')
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
              })
   },
   pesquisarUsuarios: (context, usuario) => {
    userService.search(usuario)
        .then(
              response => {
                context.commit('SET_USUARIOS', response.data)
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
                    message: message.mensagemErroPesquisar()
                  }, {
                    root: true
                  })
                }
              })    
},
getAllGrupos: (context) => {
    userService.getAllGrupos()
        .then(
              response => {
                context.commit('SET_GRUPOS', response.data)
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
                    message: message.mensagemErroPesquisar()
                  }, {
                    root: true
                  })
                }
              })    
},
setForm: (context, form) => {
    context.commit('SET_FORM', form)
}
}

const getters = {
    usuarios: state => {
        return state.usuarios
    },
    grupos: state => {
      return state.grupos
    },
    usuario: state => {
        return state.usuario
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