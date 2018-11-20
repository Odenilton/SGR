import axios from 'axios'
import jsonAdapter from 'axios-jsonp'

import { store } from '../_store/index'

const api = axios.create({
    adapter: jsonAdapter,
    timeout: 1000    
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

export const myApi2 = {
    get: (nome) => api.get(`${nome}`),
    post: (nome, entidade) => api.post(`${nome}`, entidade),
    put: (nome, entidade) => api.put(`${nome}/${entidade.id}`, entidade),
    delete: (nome, id) => api.delete(`${nome}/${id}`),
    getPorId: (nome, id) => api.get(`${nome}/${id}`),
    getComParams: (nome, params) => api.get(`${nome}`, params),
}