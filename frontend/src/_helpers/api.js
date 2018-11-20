import axios from 'axios'

import { store } from '../_store/index'

import consts from '../_helpers/consts'

const user = JSON.parse(localStorage.getItem(consts.USER_KEY_LOCAL_STORAGE))
const token = user ? user.token : ''

const api = axios.create({
    //baseURL: 'https://api-prefeituracachoeiradegoias.oemsistemas.com.br/v1/',
    baseURL: window.location.hostname === 'prefeituracachoeiradegoias.oemsistemas.com.br' 
    ? 'https://prefeituracachoeiradegoias.oemsistemas.com.br/api/v1/' : 'http://localhost:8000/v1/',
    timeout: 100000,
    withCredentials: false,
    headers: {
        'Access-Control-Allow-Methods': 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json, text/plain, */*',
        'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept, Authorization',
        'Authorization': `Bearer ${token}`
    }
})

api.interceptors.request.use(
    function (config) {
        store.state.loading = true
        return config
    }, 
    function (error) {
        store.state.loading = false
        return Promise.reject(error)
    }
)

api.interceptors.response.use(
    function (response) {
        store.state.loading = false
        return response
    },
    function (error) {
        store.state.loading = false
        return Promise.reject(error)
    }
)

export const myApi = {
    get: (nome) => api.get(`${nome}`),
    post: (nome, entidade) => api.post(`${nome}`, entidade),
    put: (nome, entidade) => api.put(`${nome}`, entidade),
    delete: (nome, id) => api.delete(`${nome}/${id}`),
    getPorId: (nome, id) => api.get(`${nome}/${id}`),
    getComParams: (nome, params) => api.get(`${nome}`, params),
    postComParams: (nome, entidade, params) => api.post(`${nome}`, entidade, params),
}