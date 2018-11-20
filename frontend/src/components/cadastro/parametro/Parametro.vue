<template>
  <div>
    <parametro-novo v-if="action == 'novo'"></parametro-novo>
  </div>
</template>

<script>

  import Novo from './Novo.vue'

  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      parametroNovo: Novo
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
      this.setAction('novo')
    }
  }
</script>