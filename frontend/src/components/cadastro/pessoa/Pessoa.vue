<template>
  <div>
    <aluno-listar v-if="action === 'listar'"></aluno-listar>
    <aluno-novo v-if="action === 'novo'"></aluno-novo>
  </div>
</template>

<script>


  import Listar from './Listar.vue'
  import Novo from './Novo.vue'

  import { mapGetters, mapActions } from "vuex"

  export default {
    components: {
      alunoListar: Listar,
      alunoNovo: Novo
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