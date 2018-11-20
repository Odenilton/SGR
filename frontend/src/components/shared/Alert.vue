<template>
	<div v-if="alert.exibir" class="callout" :class="alert.type">
        <p>{{alert.message}}</p>
     </div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		computed: {
		    ...mapGetters({
		    	alert: 'alert/alert'
		    })
		},
		methods: {
			 ...mapActions({
		        clear: 'alert/clear'
		    }),
		}
	}
</script>
