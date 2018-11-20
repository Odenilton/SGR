<template>
	<span v-if="exibir" class="help-block" style="font-size:9.5pt;">
		Campo obrigatório
	</span>
</template>

<script>
	export default {
		props: {
			exibir: Boolean
		}
	}
</script>
