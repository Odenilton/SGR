import { myApi } from '../_helpers'

export const relatorioService = {
    imprimirReciboMes
};

function imprimirReciboMes(relatorio, params) {
    return myApi.postComParams('relatorio/recibo-mes', relatorio, params)
}