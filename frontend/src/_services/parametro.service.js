import { myApi } from '../_helpers'

export const parametroService = {
    save,
    edit,
    remove,
    search,
    getAll
};

function save(parametro) {
    return myApi.post('parametro/new', parametro)
}

function edit(parametro) {
    return myApi.put('parametro/edit', parametro)
}

function getAll() {
    return myApi.get('parametro/')
}

function remove(id) {
    return myApi.delete('parametro/delete',id)
}

function search(parametro) {
    return myApi.post('parametro/pesquisar', parametro)
}
