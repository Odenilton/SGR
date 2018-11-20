import {store} from '../_store'

let user = store.getters['auth/usuario'] || { roles: []}

export const security = {
    getPermissaoUsuario: () => {
    	let retorno = false
      	user.roles.map((role) =>{
	        if (role === 'ROLE_USUARIO'){
	          retorno = true
	        }else{
	          retorno = false
	        }
      	})
      	return retorno
    },
    getPermissaoAdministrador: () => {
    	let retorno = false
      	user.roles.map((role) =>{
	        if (role === 'ROLE_ADMINISTRADOR'){
	          retorno = true
	        }else{
	          retorno = false
	        }
      	})
      	return retorno
		},
		getIsAuthenticated: () => {
			return user.token ? true : false
		}
}

export default security