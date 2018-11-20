import { utilService } from '../_services'

export default {
    setAction: (context, action) => {
        context.commit('SET_ACTION', action)
    },
    setEstados: (context) => {
        utilService.getEstados()
        .then(response => {
            context.commit('SET_ESTADOS', response.data)
        })
    },
    setUtil: (context, util = {
        ano: '',
        mes: '',
        orgao: ''
    }) => {
        context.commit('SET_UTIL', util)
    },
    setAnos: (context) => {
        utilService.getAnos()
        .then(response => {
            context.commit('SET_ANOS', response.data)
        })
    },
    setBancos: (context) => {
        utilService.getBancos()
        .then(response => {
            context.commit('SET_BANCOS', response.data)
        })
    },
    setMeses: (context) => {
        utilService.getMeses()
        .then(response => {
            context.commit('SET_MESES', response.data)
        })
    },  
    setOrgaos: (context) => {
        utilService.getOrgaos()
        .then(response => {
            context.commit('SET_ORGAOS', response.data)
        })
    },
}