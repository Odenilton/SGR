import { myApi, myApi2 } from '../_helpers'

export const pessoaService = {
    save,
    edit,
    remove,
    search,
    getById,
    getCount,
    getAll,
    getAllLazy,
    obterEndereco
};

function save(pessoa) {
    return myApi.post('pessoa/new', pessoa)
}

function edit(pessoa) {
    return myApi.put('pessoa/edit', pessoa)
}

function getAll() {
    return myApi.get('pessoa/')
}

function getAllLazy(first, max) {
    return myApi.get(`pessoa/lazy/${first}/${max}`)
}

function getCount() {
    return myApi.get('pessoa/count')
}

function getById(id) {
    return myApi.get(`pessoa/show/${id}`)
}

function remove(id) {
    return myApi.delete('pessoa/delete', id)
}

function search(pessoa) {
    return myApi.post('pessoa/pesquisar', pessoa)
}

function obterEndereco(cep) {
    return myApi2.get(`https://viacep.com.br/ws/${cep}/json`)
}
