import { grupoService } from '../../_services'

import { message } from '../../_helpers'

function Grupo() {
}


const state = {
    grupo: new Grupo,
    grupos: [],
    form: {}
}

const mutations = {
    'SET_GRUPOS' (state, grupos) {
        state.grupos = grupos
    },
    'SET_GRUPO' (state, grupo) {
        state.grupo = grupo
    },
    'SET_FORM' (state, form) {
        state.form = form
    }
}

const actions = {
    novoGrupo: (context, turma) => {
        context.commit('SET_GRUPO', new Grupo)
    },
    setGrupos: (context) => {
        grupoService.getAll()
        .then(
            response => {
                context.commit('SET_GRUPOS', response.data)
            },
            error => {
                context.dispatch('alert/error', 'Houve um erro ao carregar os dados', { root: true })
                context.dispatch('alert/error', 
                    {
                        title: 'Erro', 
                        message: 'Houve um erro ao carregar os dados'
                    }, 
                    { root: true }
                )
            }
        )
    },
    setGrupo: (context, grupo) => {
        context.commit('SET_GRUPO', grupo)
    },
    saveGrupo: (context, grupo) => {
        grupoService.save(grupo)
        .then(
            response => {
                context.commit('SET_GRUPO', new Grupo)
                actions.setGrupos(context)
                context.dispatch('alert/success', 
                    {
                        title: 'Sucesso', 
                        message: message.mensagemSucessoSalvar()
                    }, 
                    { root: true }
                )
            },
            error => {
                context.dispatch('alert/error', 
                    {
                        title: 'Erro', 
                        message: message.mensagemErroSalvar()
                    }, 
                    { root: true }
                )
            }
        )
    },
    editGrupo: (context, grupo) => {
        grupoService.edit(grupo)
        .then(
            response => {
                actions.setGrupos(context)
                context.dispatch('alert/success', 
                    {
                        title: 'Sucesso', 
                        message: message.mensagemSucessoAlterar()
                    }, 
                    { root: true }
                )
            },
            error => {
                context.dispatch('alert/error', 
                    {
                        title: 'Erro', 
                        message: message.mensagemErroAlterar()
                    }, 
                    { root: true }
                )
            }
        )
    },
    removeGrupo: (context, id) => {
        grupoService.remove(id)
        .then(
            response => {
                context.dispatch('setGrupos')
                context.dispatch('alert/success', 
                    {
                        title: 'Sucesso', 
                        message: message.mensagemSucessoRemover()
                    }, 
                    { root: true }
                )
            },
            error => {
                console.log(error.data)
                if (error.response.data.status){
                    context.dispatch('alert/error', 
                            {
                                title: 'Erro', 
                                message: error.response.data.message
                            }, 
                            { root: true }
                    )
                }else{
                    context.dispatch('alert/error', 
                        {
                            title: 'Erro', 
                            message: message.mensagemErroRemover()
                        }, 
                        { root: true }
                    )
                }
                
            }
        )
    },
    pesquisarGrupos: (context, grupo) => {
        grupoService.search(grupo)
        .then(
            response => {
                context.commit('SET_GRUPOS', response.data)
            },
            error => {
                context.dispatch('alert/error', 
                    {
                        title: 'Erro', 
                        message: message.mensagemErroPesquisar()
                    }, 
                    { root: true }
                )
            }
        )
    },
    setForm: (context, form) => {
        context.commit('SET_FORM', form)
    }
}

const getters = {
    grupos: state => {
        return state.grupos
    },
    grupo: state => {
        return state.grupo
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