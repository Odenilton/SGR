import { myApi } from '../_helpers'

export const grupoService = {
    save,
    edit,
    remove,
    search,
    getAll
};

function save(orgao) {
    return myApi.post('grupo/new', orgao)
}

function edit(orgao) {
    return myApi.put('grupo/edit', orgao)
}

function getAll() {
    return myApi.get('grupo/')
}

function remove(id) {
    return myApi.delete('grupo/delete',id)
}

function search(orgao) {
    return myApi.post('grupo/pesquisar', orgao)
}
