<template>
  <div class="login-box">
      <loader></loader>
      <div class="login-logo">
        <i class="fa fa-television"></i>
        <b>SGR</b>- Sistema Gerador de Recibos
      </div>
    
      <!-- /.login-logo -->
      <div style="background: #d2d6de;" class="login-box-body">
        <p class="login-box-msg">Informe seus dados de acesso</p>

        <form @submit.prevent="onSubmit">
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group has-feedback" >
                <label for="ano">Ano</label>
                <select v-model="util.ano" id="ano" class="custom-select form-control input-sm" required>
                  <option value="">Escolha um</option>
                  <option v-for="ano in anos" :key="ano.value" :value="ano">{{ano.descricao}}</option>
                </select>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="form-group has-feedback" >
                <label for="mes">Mês</label>
                <select v-model="util.mes" id="mes" class="custom-select form-control input-sm" required>
                  <option value="">Escolha um</option>
                  <option v-for="mes in meses" :key="mes.status" :value="mes">{{mes.descricao}}</option>
                </select>
              </div>
            </div>
           </div>
           <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-feedback" >
                <label for="orgao">Orgão</label>
                <select v-model="util.orgao" id="orgao" class="custom-select form-control input-sm" required>
                  <option value="">Escolha um</option>
                  <option v-for="orgao in orgaos" :key="orgao.id" :value="orgao">{{orgao.nome}}</option>
                </select>
              </div>
            </div>
           </div>
          <div class="form-group has-feedback">
            <input type="email" v-model="usuario.email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" v-model="usuario.password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">
                <i class="fa fa-fw fa-send"></i> Logar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-box-body -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Loader from "../shared/Loader.vue"
export default {
  components: {
    loader: Loader
  },
  data() {
    return {
      usuario: {
        email: "",
        password: ""
      }
    };
  },
  computed: {
    ...mapGetters({
      util: "util",
      anos: "anos",
      meses: "meses",
      orgaos: "orgaos"
    })
  },
  methods: {
    ...mapActions({
      setAnos: "setAnos",
      setUtil: "setUtil",
      setMeses: "setMeses",
      setOrgaos: "setOrgaos"
    }),
    onSubmit() {
      localStorage.setItem('util', JSON.stringify(this.$store.getters.util))
      this.$store.dispatch("auth/login", this.usuario)
    }
  },
  created() {
    this.setAnos()
    this.setMeses()
    this.setOrgaos()
    this.setUtil()
  }
};
</script>