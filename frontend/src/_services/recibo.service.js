import { myApi } from '../_helpers'

export const reciboService = {
    get,
    getComParams,
    save,
    edit,
    remove,
    search,
    getCount,
    getAll,
    getById,
    getAllLazy
}

function get(url) {
    return myApi.get(url)
}

function getComParams(url, params) {
    return myApi.getComParams(url, params)
}

function save(recibo) {
    return myApi.post('recibo/new', recibo)
}

function edit(recibo) {
    return myApi.put('recibo/edit', recibo)
}

function getAll() {
    return myApi.get('recibo/')
}

function getById(id) {
    return myApi.get(`recibo/show/${id}`)
}

function getAllLazy(recibo, first, max) {
    return myApi.post(`recibo/lazy/`, {
        recibo: recibo,
        first: first,
        max: max
    })
}

function getCount(recibo) {
    return myApi.post('recibo/count', recibo)
}

function remove(id) {
    return myApi.delete('recibo/delete',id)
}

function search(recibo) {
    return myApi.post('recibo/pesquisar', recibo)
}
