<template>
 <fieldset>
  <div class="box-header with-border">
    <h3 class="box-title">Endereço</h3>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.cep)" >
        <label for="cep">Cep &nbsp;<small>(Pressione enter para buscar)</small></label>
        <input type="text" autocomplete="off" au v-mask="'#####-###'" v-on:keydown.enter="obterEndereco(pessoa.endereco.cep)" v-model="pessoa.endereco.cep"  @blur="callTouch($v.pessoa.endereco.cep)" class="form-control input-sm" placeholder="Cep">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.cep)"></campo-obrigatorio>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.zonaEndereco)">
        <label for="exampleInputEmail1">Tipo de Endereço</label>
        <select v-model="pessoa.endereco.zonaEndereco" v-uppercase @blur="callTouch($v.pessoa.endereco.zonaEndereco)" class="custom-select form-control input-sm" required>
          <option value="">Escolha um</option>
          <option value="1">Zona Urbana</option>
          <option value="2">Zona Rural</option>
        </select>
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.zonaEndereco)"></campo-obrigatorio>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.logradouro)">
        <label for="exampleInputEmail1">Logradouro</label>
        <input type="text" v-model.lazy="pessoa.endereco.logradouro" v-uppercase @blur="callTouch($v.pessoa.endereco.logradouro)" class="form-control input-sm" placeholder="Logradouro">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.logradouro)"></campo-obrigatorio>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.complemento)">
        <label for="exampleInputEmail1">Complemento</label>
        <input type="text" v-model.lazy="pessoa.endereco.complemento" v-uppercase @blur="callTouch($v.pessoa.endereco.complemento)" class="form-control input-sm" placeholder="Complemento">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.complemento)"></campo-obrigatorio>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.bairro)">
        <label for="exampleInputEmail1">Bairro</label>
        <input type="text" v-model.lazy="pessoa.endereco.bairro" v-uppercase @blur="callTouch($v.pessoa.endereco.bairro)" class="form-control input-sm" placeholder="Bairro">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.bairro)"></campo-obrigatorio>
      </div>
    </div>
    
    <div class="col-sm-2">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.numero)">
        <label for="exampleInputEmail1">Número</label>
        <input type="text" v-uppercase v-model.lazy="pessoa.endereco.numero" @blur="callTouch($v.pessoa.endereco.numero)" class="form-control input-sm" placeholder="Número">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.numero)"></campo-obrigatorio>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.cidade)">
        <label for="exampleInputEmail1">Cidade</label>
        <input type="text" v-model.lazy="pessoa.endereco.cidade" v-uppercase @blur="callTouch($v.pessoa.endereco.cidade)" class="form-control input-sm" placeholder="Cidade">
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.cidade)"></campo-obrigatorio>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group" :class="validaClasse($v.pessoa.endereco.uf)">
        <label for="exampleInputEmail1">UF</label>
        <select v-model="pessoa.endereco.uf" @blur="callTouch($v.pessoa.endereco.uf)" class="custom-select form-control input-sm" required>
          <option label="Escolha um" value=""></option>
          <option v-for="estado in estados" :key="estado.value" :value="estado.value">{{estado.str}}</option>
        </select>
        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.endereco.uf)"></campo-obrigatorio>
      </div>
    </div>
  </div>
</fieldset>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  import validate from './validate'
  import { classe, touch, exibirCampoObrigatorio } from '../../shared/validates'
  import CampoObrigatorio from "../../shared/CampoObrigatorio.vue"

  export default {
    computed:{
      ...mapGetters({
        estados: 'estados',
        pessoa: 'pessoa/pessoa'
      })
    },
    components: {
      campoObrigatorio: CampoObrigatorio
    },
    methods: {
      ...mapActions({
        setForm: 'pessoa/setForm',
        getEndereco: 'pessoa/obterEndereco'
      }),
      validaClasse(obj) {
        return classe(obj)
      },
      callTouch(obj) {
        return touch(obj)
      },
      exibirCampoObrigatorio(obj) {
        return exibirCampoObrigatorio(obj);
      },
      obterEndereco(cep) {
        if (cep && /^[0-9]{5}-[0-9]{3}$/.test(cep)){
            this.getEndereco(cep, this.pessoa.endereco)  
        }
      }
    },
    validations:{
      pessoa: validate
    },
  }
</script>
