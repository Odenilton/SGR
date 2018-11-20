import { myApi, consts } from '../_helpers'

export const authService = {
    login,
    logout,
    isLoggedIn
};

function login(usuario) {
    return myApi.post('login', usuario)
}

function isLoggedIn (user) {
    if (!user.token) {
        return false
    }

     if (Date.now()/1000 >= user.exp) {
        return false
     }
    return true
}

function logout() {
    localStorage.removeItem(consts.USER_KEY_LOCAL_STORAGE)
    localStorage.removeItem('util')
}
