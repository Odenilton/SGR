import Vue from 'vue'
import VueTheMask from 'vue-the-mask'
import Vuelidate from 'vuelidate'
import VueToastr from '@deveodk/vue-toastr'

import money from 'v-money'
import VueCurrencyFilter from 'vue-currency-filter'

import AppOrAuth from './AppOrAuth.vue'

import { router } from './_helpers'
import { store } from './_store'

import { api } from './_helpers/api'

import './_helpers/import.js'

Vue.use(VueTheMask)
Vue.use(Vuelidate)

// register directive v-money and component <money>
Vue.use(money, {
	decimal: ',',
	thousands: '.',
	prefix: 'R$ ',
	suffix: '',
	precision: 2,
	masked: false /* doesn't work with directive */
})

Vue.use(VueCurrencyFilter,
{
	symbol : 'R$',
	thousandsSeparator: '.',
	fractionCount: 2,
	fractionSeparator: ',',
	symbolPosition: 'front',
	symbolSpacing: true
})

Vue.use(VueToastr, {
    defaultPosition: 'toast-top-right',
    defaultType: 'info',
    defaultTimeout: 7000
})

Vue.directive('uppercase', function (el, binding) {
	el.addEventListener('input', function () {

		var mapaAcentosHex 	= {
			a : /[\xE0-\xE6]/g,
			e : /[\xE8-\xEB]/g,
			i : /[\xEC-\xEF]/g,
			o : /[\xF2-\xF6]/g,
			u : /[\xF9-\xFC]/g,
			c : /\xE7/g,
			n : /\xF1/g
		};

		for ( var letra in mapaAcentosHex ) {
			var expressaoRegular = mapaAcentosHex[letra];
			this.value = this.value.replace( expressaoRegular, letra );
		}
		this.value = el.value.toUpperCase();
	});
});

new Vue({
	el: '#app',
	router,
	store,
	render: h => h(AppOrAuth)
})