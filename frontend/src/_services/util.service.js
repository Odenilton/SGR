import { myApi } from '../_helpers'

export const utilService = {
    getEstados,
    getAnos,
    getMeses,
    getBancos,
    getOrgaos,
    decimalAdjust
};

function getEstados(usuario) {
    return myApi.get('utilitarios/estados')
}

function getAnos() {
    return myApi.get('utilitarios/anos')
}

function getBancos() {
    return myApi.get('utilitarios/bancos')
}

function getMeses() {
    return myApi.get('utilitarios/meses')
}

function getOrgaos() {
    return myApi.get('utilitarios/orgaos')
}

function decimalAdjust(type, value, exp) {
    // If the exp is undefined or zero...
    if (typeof exp === 'undefined' || +exp === 0) {
        return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // If the value is not a number or the exp is not an integer...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
        return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
}