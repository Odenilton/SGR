export default {
    'SET_ACTION' (state, action) {
        state.action = action;
    },
    'SET_ESTADOS' (state, estados){
        state.estados = estados
    },
    'SET_UTIL' (state, util){
        state.util = util
    },
    'SET_USER' (state, user){
        state.user = user
    },
    'SET_ANOS' (state, anos){
        state.anos = anos
    },
    'SET_MESES' (state, meses){
        state.meses = meses
    },
    'SET_BANCOS' (state, bancos) {
        state.bancos = bancos
    },
    'SET_ORGAOS' (state, orgaos){
        state.orgaos = orgaos
    }
}