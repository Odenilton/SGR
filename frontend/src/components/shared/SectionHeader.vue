<template>
	<section class="content-header">
		<h1>
			{{ section.title }}
			<small>{{ section.titleSmall }}</small>
		</h1>
		<ol class="breadcrumb">
			<li v-for="b in breadcrumb" :class="b.active">
				<router-link :to="b.link" tag="a" activeClass="active">
					<i :class="b.icon"></i>{{b.text}}
				</router-link>
			</li>
		</ol>
	</section>
</template>

<script>

	export default {
		props: {
			section: Object,
			breadcrumb: Array
		}
	}
</script>
