const alert = {
    namespaced: true,
    actions: {
        success({ commit, dispatch }, message) {
            commit('success', message)
        },
        error({ commit, dispatch }, message) {
            commit('error', message)
        },
        info({ commit, dispatch }, message) {
            commit('info', message)
        }
    },
    mutations: {
        success(state, message) {
            this._vm.$toastr('success', message.message, message.title)
        },
        error(state, message) {
            this._vm.$toastr('error', message.message, message.title)
        },
        info(state, message) {
            this._vm.$toastr('info', message.message, message.title)
        }
    }
}

export default alert