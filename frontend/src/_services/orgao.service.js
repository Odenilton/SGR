import { myApi } from '../_helpers'

export const orgaoService = {
    save,
    edit,
    remove,
    search,
    getAll
};

function save(orgao) {
    return myApi.post('orgao/new', orgao)
}

function edit(orgao) {
    return myApi.put('orgao/edit', orgao)
}

function getAll() {
    return myApi.get('orgao/')
}

function remove(id) {
    return myApi.delete('orgao/delete',id)
}

function search(orgao) {
    return myApi.post('orgao/pesquisar', orgao)
}
