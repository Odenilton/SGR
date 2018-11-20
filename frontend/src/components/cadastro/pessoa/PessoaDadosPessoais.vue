<template>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group" :class="validaClasse($v.pessoa.nome)">
          <label for="nome">Nome</label>
          <input type="text" id="nome" v-uppercase v-model.lazy="pessoa.nome" class="form-control input-sm" @blur="callTouch($v.pessoa.nome)"  placeholder="Nome">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.nome)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" :class="validaClasse($v.pessoa.cpf)">
          <label for="cpf">CPF</label>
          <input type="text" v-mask="'###.###.###-##'" id="cpf" v-model="pessoa.cpf" class="form-control input-sm" @blur="callTouch($v.pessoa.cpf)"  placeholder="CPF">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.cpf)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" :class="validaClasse($v.pessoa.nit)">
          <label for="nit">NIT</label>
          <input type="text" v-mask="'###.#####.##-#'" id="nit" v-model="pessoa.nit" class="form-control input-sm" @blur="callTouch($v.pessoa.nit)"  placeholder="NIT">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.nit)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" :class="validaClasse($v.pessoa.sexo)">
          <label for="sexo">Sexo</label>
          <select v-model="pessoa.sexo" id="sexo" @blur="callTouch($v.pessoa.sexo)" class="custom-select form-control input-sm" required>
            <option value="">Escolha um</option>
            <option value="1">MASCULINO</option>
            <option value="2">FEMININO</option>
          </select>
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.sexo)"></campo-obrigatorio>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group" :class="validaClasse($v.pessoa.naturalidade)">
          <label for="naturalidade">Naturalidade</label>
          <input type="text" id="naturalidade" @blur="callTouch($v.pessoa.naturalidade)" v-uppercase v-model.lazy="pessoa.naturalidade" class="form-control input-sm" placeholder="Naturalidade">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.naturalidade)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" :class="validaClasse($v.pessoa.ufNaturalidade)">
          <label for="ufNaturalidade">UF Naturalidade</label>
          <select v-model="pessoa.ufNaturalidade" id="ufNaturalidade" @blur="callTouch($v.pessoa.ufNaturalidade)" class="custom-select form-control input-sm" required>
            <option label="Escolha um" value=""></option>
            <option v-for="estado in estados" :key="estado.value" :value="estado.value">{{estado.str}}</option>
          </select>
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.ufNaturalidade)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" v-model="pessoa.telefone" id="telefone" v-mask="['(##) ####-####', '(##) #####-####']" class="form-control input-sm" placeholder="Telefone">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" :class="validaClasse($v.pessoa.dataNascimento)">
          <label for="dataNascimento">Data Nascimento</label>
          <input type="text" v-model="pessoa.dataNascimento" @blur="callTouch($v.pessoa.dataNascimento)" id="dataNascimento" v-mask="'##/##/####'" class="form-control input-sm" placeholder="Data Nascimento">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.dataNascimento)"></campo-obrigatorio>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group" :class="validaClasse($v.pessoa.nomeMae)">
          <label for="nomeMae">Nome Mãe</label>
          <input type="text" v-uppercase id="nomeMae" v-model.lazy="pessoa.nomeMae" @blur="callTouch($v.pessoa.nomeMae)" class="form-control input-sm" placeholder="Nome Mãe">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.nomeMae)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="nomePai">Nome Pai</label>
          <input type="text" id="nomePai" v-model.lazy="pessoa.nomePai" v-uppercase class="form-control input-sm" placeholder="Nome Pai">
        </div>
      </div>
    </div>

    <div>
      <div class="row">      
        <div class="col-sm-3">
          <div class="form-group" :class="validaClasse($v.pessoa.rg)">
            <label for="rgRegistroGeral">RG</label>
            <input type="text" v-model="pessoa.rg" id="rgRegistroGeral" @blur="callTouch($v.pessoa.rg)" class="form-control input-sm" placeholder="RG">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.rg)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group" :class="validaClasse($v.pessoa.rgDataExpedicao)">
            <label for="rgDataExpedicao">Data Expedição</label>
            <input type="text" v-model="pessoa.rgDataExpedicao" id="rgDataExpedicao" @blur="callTouch($v.pessoa.rgDataExpedicao)" v-mask="'##/##/####'" class="form-control input-sm" placeholder="Data Expedição">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.rgDataExpedicao)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group" :class="validaClasse($v.pessoa.rgOrgaoExpeditor)">
            <label for="rgOrgaoExpeditor">Orgão Expeditor</label>
            <input type="text" v-uppercase v-model.lazy="pessoa.rgOrgaoExpeditor" id="rgOrgaoExpeditor" @blur="callTouch($v.pessoa.rgOrgaoExpeditor)" class="form-control input-sm" placeholder="Orgão Expeditor">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.rgOrgaoExpeditor)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group" :class="validaClasse($v.pessoa.rgUfOrgaoExpeditor)">
            <label for="rgUfOrgaoExpeditor">UF Orgão Expeditor</label>
            <select v-model.lazy="pessoa.rgUfOrgaoExpeditor" id="rgUfOrgaoExpeditor" @blur="callTouch($v.pessoa.rgUfOrgaoExpeditor)" class="custom-select form-control input-sm" required>
              <option label="Escolha um" value=""></option>
              <option v-for="estado in estados" :key="estado.value" :value="estado.value">{{estado.str}}</option>
            </select>
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.rgUfOrgaoExpeditor)"></campo-obrigatorio>
          </div>
        </div>
      </div>
    </div>

    <div class="box-header with-border">
    <h3 class="box-title">Dados bancários</h3>
  </div>
  <div class="row">
      <div class="col-sm-3">
        <div class="form-group" :class="validaClasse($v.pessoa.formaPagamento)">
          <label for="exampleInputEmail1">Forma de pagamento</label>
          <select v-on:change="carregarBancos()" v-model="pessoa.formaPagamento" @blur="callTouch($v.pessoa.formaPagamento)" class="custom-select form-control input-sm" required>
            <option label="Escolha um" value=""></option>
            <option label="Cheque" value="1"></option>
            <option label="Transferência Bancária" value="2"></option>
          </select>
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.formaPagamento)"></campo-obrigatorio>
        </div>
      </div>
    </div>
    <div class="row">
      <div v-if="exibirTransferenciaBancaria()">
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.banco)">
            <label for="nomeBanco">Nome do banco</label>
            <select v-on:change="exibirOperacao()" v-model="pessoa.banco" id="nomeBanco" @blur="callTouch($v.pessoa.banco)" class="custom-select form-control input-sm" required>
              <option label="Escolha um" value=""></option>
              <option v-for="banco in bancos" :key="banco.value" :value="banco.value">{{banco.descricao}}</option>
            </select>
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.banco)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.agencia)">
            <label for="agencia">Agência</label>
            <input type="text" v-model="pessoa.agencia" id="agencia" @blur="callTouch($v.pessoa.agencia)" class="form-control input-sm" placeholder="Agência">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.agencia)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label for="digitoAgencia">Digito</label>
            <input type="text" v-model="pessoa.digitoAgencia" id="digitoAgencia" class="form-control input-sm" placeholder="Digito">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.conta)">
            <label for="conta">Conta</label>
            <input type="text" v-model="pessoa.conta" id="conta" @blur="callTouch($v.pessoa.conta)" class="form-control input-sm" placeholder="Conta">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.conta)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.digitoConta)">
            <label for="digitoConta">Digito</label>
            <input type="text" v-model="pessoa.digitoConta" id="digitoConta" @blur="callTouch($v.pessoa.digitoConta)" class="form-control input-sm" placeholder="Digito">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.digitoConta)"></campo-obrigatorio>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.tipoConta)">
              <label for="tipoConta">Tipo de Conta</label>
            <select v-model="pessoa.tipoConta" id="tipoConta" @blur="callTouch($v.pessoa.tipoConta)" class="custom-select form-control input-sm" required>
              <option label="Escolha um" value=""></option>
              <option label="Conta Corrente" value="1"></option>
              <option label="Conta Poupança" value="2"></option>
              <option label="Conta Pagamento" value="3"></option>
            </select>
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.tipoConta)"></campo-obrigatorio>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div v-if="exibirOperacao()">
        <div class="col-sm-2">
          <div class="form-group" :class="validaClasse($v.pessoa.operacao)">
            <label for="operacao">Operação</label>
            <input type="text" v-model="pessoa.operacao" id="operacao" @blur="callTouch($v.pessoa.operacao)" class="form-control input-sm" placeholder="Operação">
            <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.operacao)"></campo-obrigatorio>
          </div>
        </div>
      </div>
    </div>
  </div> 
</template>

<script>
import { mapActions, mapGetters } from "vuex";

import validate from "./validate";
import { classe, touch, exibirCampoObrigatorio } from "../../shared/validates";

import CampoObrigatorio from "../../shared/CampoObrigatorio.vue";

export default {
  props: ["pessoa"],
  computed: {
    ...mapGetters({
      estados: "estados",
      bancos: 'bancos'
    })
  },
  components: {
    campoObrigatorio: CampoObrigatorio
  },
  methods: {
    ...mapActions({
      setForm: "pessoa/setForm",
      setEstados: "setEstados",
      setBancos: 'setBancos'
    }),
    exibirOperacao() {
      this.exibirTransferenciaBancaria()
      return this.pessoa.banco === 3 
              || this.pessoa.banco === '3' 
                ? true : false;
    },
    exibirTransferenciaBancaria() {
      return this.pessoa.formaPagamento === 2 
              || this.pessoa.formaPagamento === '2' 
                ? true : false;
    },
    carregarBancos() {
      if (this.exibirTransferenciaBancaria() && !this.pessoa.id){
        this.setBancos()

      }else if (this.exibirTransferenciaBancaria() && this.pessoa.id){
        this.setBancos()
      }else if (!this.exibirTransferenciaBancaria() 
              && this.pessoa.id){
        this.pessoa.banco = ''
        this.pessoa.tipoConta = ''
        this.setBancos()
      }
    },
    validaClasse(obj) {
      return classe(obj)
    },
    callTouch(obj) {
      return touch(obj)
    },
    exibirCampoObrigatorio(obj) {
      return exibirCampoObrigatorio(obj)
    }
  },
  validations: {
    pessoa: validate
  },
  created() {
    this.setForm(this.$v)
    this.setEstados()
    this.carregarBancos()
  }
};
</script>
