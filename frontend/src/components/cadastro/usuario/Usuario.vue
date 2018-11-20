<template>
  <div>
    <usuario-listar v-if="action === 'listar'"></usuario-listar>
    <usuario-novo v-if="action === 'novo'"></usuario-novo>
  </div>
</template>

<script>


  import Listar from './Listar.vue'
  import Novo from './Novo.vue'

  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      usuarioListar: Listar,
      usuarioNovo: Novo
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