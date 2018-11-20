<template>
  <div class="login-box">

      <div class="login-logo">
        <i class="fa fa-television"></i>
        <b>SGR</b>- Sistema Gerador de Recibo
      </div>
      
      <!-- /.login-logo -->
      <div style="background: #d2d6de;" class="login-box-body">
        <p class="login-box-msg">Informe seus dados de acesso</p>

        <form@submit.prevent="onSubmit">
          <div class="form-group has-feedback">
            <input type="text" v-model="usuario.nome" class="form-control" placeholder="Nome">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" v-model="usuario.email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" v-model="usuario.senha" class="form-control" placeholder="Password">
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
  export default {
    data () {
      return {
      usuario: {
          nome: '',
          email: '',
          senha: ''
        }
      }
    },
    methods: {
      onSubmit () {
        this.$store.dispatch('usuario/saveUsuario', this.usuario)
      }
    }
  }
</script>