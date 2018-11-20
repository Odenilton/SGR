import {authService} from '../../_services'
import { KJUR, b64utoutf8 } from 'jsrsasign'

import {router} from '../../_helpers'

import consts from '../../_helpers/consts'

function obterUser(jwt) {
    let payloadObj = jwt ? KJUR.jws.JWS.readSafeJSONString(b64utoutf8(jwt.split(".")[1])) : ''
    
    if (jwt){
        return {
            nome: payloadObj.name,
            email: payloadObj.username,
            exp: payloadObj.exp,
            token: jwt,
            roles: payloadObj.roles
        }
    }else {
        return null
    }
}

const INITIAL_STATE = {
    user: JSON.parse(localStorage.getItem(consts.USER_KEY_LOCAL_STORAGE)),
    loggedIn: false
}

const authentication = {
    namespaced: true,
    state: INITIAL_STATE,
    mutations: {
        loginSuccess(state, user){
            localStorage.setItem(consts.USER_KEY_LOCAL_STORAGE, JSON.stringify(user))
            state.loggedIn = true,
            state.user = user
        },
        loginFailure(state){
            state.loggedIn = false,
            state.user = null
        },
        logout(state){
            state.loggedIn = false,
            state.user = null
            authService.logout()
        },
        setTimeout(state, timeOut){
            state.timeOut = timeOut
        }
    },
    actions: {
        setLogoutTimer ({dispatch, commit}) {
            let timer
            if (!authentication.state.timeOut){
                commit('setTimeout', true)
                timer = setTimeout(() => {
                    dispatch('logout')
                }, obterUser().exp)
            }else {
                clearTimeout(timer)
                commit('setTimeout', false)
            }
        },
        tryAutoLogin({commit}){
            if (authentication.state.user) {
                if (!authService.isLoggedIn(authentication.state.user)) {
                    commit('loginFailure')
                } else {
                    commit('loginSuccess', obterUser(authentication.state.user.token))
                }
            }
           
        },
        login({dispatch, commit}, usuario){

            authService.login(usuario)
                .then(
                    res => {       
                        console.log('entrou login ', res.data.token)     
                        commit('loginSuccess', obterUser(res.data.token))
                        window.location.reload()    
                        //dispatch('setLogoutTimer')                    
                    },
                    error => {
                        commit('loginFailure')
                        if (error.response.data.status){
                            dispatch('alert/error', 
                                {
                                    title: 'Erro', 
                                    message: error.response.data.message
                                }, 
                                { root: true })
                        }else{
                            dispatch('alert/error', 
                                {
                                    title: 'Erro', 
                                    message: 'Não foi possível processar sua solicitação'
                                }, 
                                { root: true })
                        }
                    }
                )
        },
        logout({commit, dispatch}) {
            commit('logout')
            window.location.assign('#/')
            dispatch('alert/success', 
                {
                    title: 'Sucesso', 
                    message: 'Logout efetuado'
                }, 
                { root: true }
            )
        }
    },
    getters: {
        usuario: state => {
            return state.user
        },
        isAuthenticated: state => {
            return state.loggedIn
        },
    }
}

export default authentication