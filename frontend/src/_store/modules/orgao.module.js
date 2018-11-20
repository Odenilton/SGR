import { orgaoService } from '../../_services'

import { message } from '../../_helpers'

function Orgao() {
    
}


const state = {
    orgao: new Orgao,
    orgaos: [],
    form: {}
}

const mutations = {
    'SET_ORGAOS' (state, orgaos) {
        state.orgaos = orgaos
    },
    'SET_ORGAO' (state, orgao) {
        state.orgao = orgao
    },
    'SET_FORM' (state, form) {
        state.form = form
    }
}

const actions = {
    setOrgaos: (context) => {
        orgaoService.getAll()
        .then(
            response => {
                context.commit('SET_ORGAOS', response.data)
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
    setOrgao: (context, orgao) => {
        context.commit('SET_ORGAO', orgao)
    },
    saveOrgao: (context, orgao) => {
        orgaoService.save(orgao)
        .then(
            response => {
                context.commit('SET_ORGAO', new Orgao)
                actions.setOrgaos(context)
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
    editOrgao: (context, orgao) => {
        orgaoService.edit(orgao)
        .then(
            response => {
                actions.setOrgaos(context)
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
    removeOrgao: (context, id) => {
        orgaoService.remove(id)
        .then(
            response => {
                context.dispatch('setOrgaos')
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
    pesquisarOrgaos: (context, orgao) => {
        orgaoService.search(orgao)
        .then(
            response => {
                context.commit('SET_ORGAOS', response.data)
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
    orgaos: state => {
        return state.orgaos
    },
    orgao: state => {
        return state.orgao
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