<template>
  <div>
    <orgao-listar v-if="action == 'listar'"></orgao-listar>
    <orgao-novo v-if="action == 'novo'"></orgao-novo>
  </div>
</template>

<script>


  import Listar from './Listar.vue'
  import Novo from './Novo.vue'
  
  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      orgaoListar: Listar,
      orgaoNovo: Novo
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