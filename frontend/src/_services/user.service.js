import { myApi } from '../_helpers'

export const userService = {
    save,
    edit,
    getAll,
    getAllGrupos,
    remove,
    search
};

function save(usuario) {
    return myApi.post('usuario/new', usuario)
}

function edit(usuario) {
    return myApi.put('usuario/edit', usuario)
}

function getAll() {
    return myApi.get('usuario/')
}

function getAllGrupos() {
    return myApi.get('usuario/grupos')
}

function remove(id) {
    return myApi.delete('usuario/delete', id)
}

function search(usuario) {
    return myApi.post('usuario/pesquisar', usuario)
}
