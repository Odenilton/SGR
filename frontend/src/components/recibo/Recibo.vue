<template>
  <div>
    <recibo-listar v-if="action == 'listar'"></recibo-listar>
    <recibo-novo  v-if="action == 'novo'"></recibo-novo>
  </div>
</template>

<script>


  import Listar from './Listar.vue'
  import Novo from './Novo.vue'

  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      reciboListar: Listar,
      reciboNovo: Novo
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