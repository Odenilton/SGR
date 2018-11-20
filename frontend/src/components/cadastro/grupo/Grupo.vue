<template>
  <div>
    <grupo-listar v-if="action === 'listar'"></grupo-listar>
    <grupo-novo v-if="action === 'novo'"></grupo-novo>
  </div>
</template>

<script>


  import Listar from './Listar.vue'
  import Novo from './Novo.vue'

  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      grupoListar: Listar,
      grupoNovo: Novo
    },
    computed: {
       ...mapGetters({
        action: "action",
      }),
    },
    methods: {
      ...mapActions({
        setAction: "setAction"
      }),
    },
    created() {
      this.setAction('listar')
    }
  }
</script>