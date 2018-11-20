
export const classe = function(obj) {
	return obj.$invalid ? {'has-error': true} : {'has-success': true}
}

export const touch = function(obj) {
	return obj.$touch()
}

export const exibirCampoObrigatorio = function (obj) {
	return obj.$invalid
}