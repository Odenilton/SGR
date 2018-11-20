<template>
  <div>

    <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>

    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados da Pessoa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" :class="validaClasse($v.cpf)">
                      <label for="cpf">Pessoa&nbsp;<small>(Pressione enter para buscar)</small></label>
                      <div class="input-group input-group-sm">
                        <input type="text" v-mask="'###.###.###-##'" id="cpf" v-model="cpf" class="form-control input-sm" @blur="callTouch($v.cpf)"  placeholder="CPF">
                            <span class="input-group-btn">
                              <button @click="buscarPessoa(cpf)" type="button" class="btn btn-info btn-flat"><i class="fa fa-arrow-right"></i></button>
                            </span>
                      </div>
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.cpf)"></campo-obrigatorio>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group" :class="validaClasse($v.recibo.pessoa.nome)">
                      <label for="nome">Tomador do recibo</label>
                      <input type="text" disabled="true" id="nome" v-uppercase v-model.lazy="recibo.pessoa.nome" class="form-control input-sm" @blur="callTouch($v.recibo.pessoa.nome)"  placeholder="Nome">
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.pessoa.nome)"></campo-obrigatorio>
                    </div>
                  </div> 
                </div>
                <div class="row">
                  <div class="box-header with-border">
                    <h3 class="box-title">Dados do recibo</h3>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="dia">Dia</label>
                      <input type="text" v-model="recibo.dia" id="dia" class="form-control form-control-sm input-sm" placeholder="Dia">
                    </div>
                  </div>
                   <div class="col-sm-2">
                    <div class="form-group">
                      <label for="mes">Mês</label>
                      <input disabled="true" min="01" max="12" id="mes" v-model="recibo.mes" class="form-control input-sm" placeholder="Mês">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label for="ano">Ano</label>
                      <input type="number" disabled="true" min="1900" max="2018" id="ano" v-model="recibo.ano" class="form-control input-sm" placeholder="Ano">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group" :class="validaClasse($v.recibo.descricao)">
                      <label for="descricao">Descrição</label>
                      <input type="text" v-model="recibo.descricao" id="descricao" class="form-control form-control-sm input-sm" @blur="callTouch($v.recibo.descricao)" placeholder="Descrição">
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.descricao)"></campo-obrigatorio>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" :class="validaClasse($v.recibo.rendimentoTributavel)">
                      <label for="rendimentoTributavel">Rendimentos tributáveis</label>
                        <money v-model="recibo.rendimentoTributavel" class="form-control input-sm" id="rendimentoTributavel"></money>    
                        <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.rendimentoTributavel)"></campo-obrigatorio>
                    </div>
                  </div> 
                  <div class="col-sm-2">
                    <div class="form-group" :class="validaClasse($v.recibo.previdenciaOficial)">
                      <label for="previdenciaOficial">Previdência Oficial</label>
                      <money v-model="recibo.previdenciaOficial" disabled="true" class="form-control input-sm" id="previdenciaOficial"></money>
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group" :class="validaClasse($v.recibo.pensaoAlimenticia)">
                      <label for="pensaoAlimenticia">Pensão Alimentícia</label>
                      <money v-model="recibo.pensaoAlimenticia" @blur="callTouch($v.recibo.pensaoAlimenticia)" class="form-control input-sm" id="pensaoAlimenticia"></money>
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.pensaoAlimenticia)"></campo-obrigatorio>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group" :class="validaClasse($v.recibo.qtdDependentes)">
                      <label for="nome">Dependentes</label>                  
                        <input type="number" id="nome" v-model="recibo.qtdDependentes" 
                      class="form-control input-sm" @blur="callTouch($v.recibo.qtdDependentes)"  placeholder="Quantidade">                            
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.qtdDependentes)"></campo-obrigatorio>
                    </div>
                  </div> 
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="nome">Valor dependentes</label>
                      <money v-model="recibo.valorTotalDependentes" disabled="true" class="form-control input-sm" id="previdenciaOficial"></money>
                    </div>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group" :class="validaClasse($v.recibo.outrasDeducoes)">
                      <label for="outrasDeducoes">Outras deduções</label>
                      <money v-model="recibo.outrasDeducoes" @blur="callTouch($v.recibo.outrasDeducoes)" class="form-control input-sm" id="outrasDeducoes"></money>
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.outrasDeducoes)"></campo-obrigatorio>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="valorTotalDeducoes">Total de deduções</label>
                        <money v-model="recibo.valorTotalDeducoes" disabled="true" class="form-control input-sm" id="valorTotalDeducoes"></money>
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="baseDeCalculo">Base de cálculo</label>
                      <money v-model="recibo.baseDeCalculo" disabled="true" class="form-control input-sm" id="baseDeCalculo"></money>
                    </div>
                  </div>  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="impostoIRRF">Imposto IRRF devido</label>
                      <money v-model="recibo.impostoIRRF" disabled="true" class="form-control input-sm" id="impostoIRRF"></money>
                    </div>
                  </div>  
                </div> 
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="impostoISS">Imposto ISS devido</label>
                      <money v-model="recibo.impostoISS" disabled="true" class="form-control input-sm" id="impostoISS"></money>
                    </div>
                  </div>  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="valorLiquido">Valor líquido</label>
                      <money v-model="recibo.valorLiquido" disabled="true" class="form-control input-sm" id="valorLiquido"></money>
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-sm-5">
                        <button @click="calcular()" type="button" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i>&nbsp;Calcular</button>
                  </div>
                </div>
                <div class="row">
                  <div class="box-header with-border">
                    <h3 class="box-title">Outros</h3>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group" :class="validaClasse($v.recibo.ligacaoOrgao)">
                      <label for="ligacaoOrgao">Ligação do Orgão</label>
                      <select v-model="recibo.ligacaoOrgao" :class="validaClasse($v.recibo.ligacaoOrgao)" @blur="callTouch($v.recibo.ligacaoOrgao)" class="custom-select form-control input-sm" required>
                        <option value="">Escolha um</option>
                        <option value="da">da</option>
                        <option value="de">de</option>
                        <option value="do">do</option>
                      </select>
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.ligacaoOrgao)"></campo-obrigatorio>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group" :class="validaClasse($v.recibo.descricaoServico)">
                      <label for="descricaoServico">Descrição do serviço</label>
                      <textarea rows="4" v-model="recibo.descricaoServico" :class="validaClasse($v.recibo.descricaoServico)" @blur="callTouch($v.recibo.descricaoServico)" class="custom-select form-control input-sm" required>
                      </textarea>
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.recibo.descricaoServico)"></campo-obrigatorio>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(recibo)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
                <button @click="cancelarAction('listar')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                <hr>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {utilService} from '../../_services'
import {store} from '../../_store/index'
import SectionHeader from "../shared/SectionHeader.vue"

import { mapGetters, mapActions } from "vuex"

import validate from './validate'
import { required } from 'vuelidate/lib/validators'
import { classe, touch, exibirCampoObrigatorio } from '../shared/validates'
import CampoObrigatorio from '../shared/CampoObrigatorio.vue'

export default {
  data: function() {
    return {
      sectionHeader: { title: "Recibo", titleSmall: "" },
      breadcrumb: [
        {
          text: "Recibo",
          link: "/cadastro",
          icon: "fa fa-dashboard"
        },
        {
          text: "Novo/Alterar",
          link: "",
          active: "active"
        }
      ],
      parametro: {},
      cpf: ''
    };
  },

  components: {
    sectionHeader: SectionHeader,
    campoObrigatorio: CampoObrigatorio
  },
  computed: {
    ...mapGetters({
      action: "action",
      form: "recibo/form",
      recibo: 'recibo/recibo',
      util: 'util',
    }),
  },
  methods: {
    ...mapActions({
      setAction: "setAction",
      setForm: 'recibo/setForm',
      novoRecibo: "recibo/novoRecibo",
      saveRecibo: "recibo/saveRecibo",
      editRecibo: "recibo/editRecibo",
      getRecibos: "recibo/setRecibos",
      buscarPessoaPorCpf: 'pessoa/buscarPessoaPorCpf',
      carregarParametrosPorMesAnoEOrgao: 'parametro/carregarParametrosPorMesAnoEOrgao'
    }),
    buscarPessoa(cpf) {
      this.buscarPessoaPorCpf({cpf: cpf})
        .then((res) =>{
          this.recibo.pessoa = {
            id: res.data[0].id,
            nome: res.data[0].nome
          }
        })
    },
    calcular(){
      this.calculaValorDependentes()
      this.calculaValorPrevidenciaOficial()
      this.calculaValorTotalDeducoesEBaseCalculo()
      this.calculaIRRF()
    },
    calculaValorDependentes(){
      this.recibo.valorTotalDependentes = this.parametro.irDeducao * this.recibo.qtdDependentes
    },
    calculaValorPrevidenciaOficial(){
      if (this.recibo.rendimentoTributavel > 5645.8){
        this.recibo.previdenciaOficial = 621.04
      }else{
        this.recibo.previdenciaOficial = this.recibo.rendimentoTributavel * 0.11
      }
    },
    calculaValorTotalDeducoesEBaseCalculo() { 
      this.recibo.valorTotalDeducoes = this.recibo.previdenciaOficial + this.recibo.pensaoAlimenticia + this.recibo.valorTotalDependentes + this.recibo.outrasDeducoes
      this.recibo.baseDeCalculo = this.recibo.rendimentoTributavel - this.recibo.valorTotalDeducoes
      this.recibo.impostoISS = (this.recibo.rendimentoTributavel * (this.parametro.impostoISS / 100))
      this.calculaIRRF()
    },
    calculaIRRF(){
      let base = this.recibo.baseDeCalculo
      let aliquota = 0
      let deducao = 0
      let iss = this.recibo.impostoISS

      if (base <= this.parametro.irBase1){
        aliquota = 0
        deducao = 0
        this.recibo.impostoIRRF = 0
      }else if (base > this.parametro.irBase1 && base < this.parametro.irBase2){
        aliquota = this.parametro.irPercentual1 / 100
        deducao = this.parametro.irParcela1
        this.recibo.impostoIRRF = ((base * aliquota) - deducao)
      }else if (base > this.parametro.irBase2 && base < this.parametro.irBase3){
        aliquota = this.parametro.irPercentual2 /  100
        deducao = this.parametro.irParcela2
        this.recibo.impostoIRRF = ((base * aliquota) - deducao)
      }else if (base > this.parametro.irBase3 && base < this.parametro.irBase4){
        aliquota = this.parametro.irPercentual3 / 100
        deducao = this.parametro.irParcela3
       this.recibo.impostoIRRF = ((base * aliquota) - deducao)
      }else{
        aliquota = this.parametro.irPercentual4 /  100
        deducao = this.parametro.irParcela4
        this.recibo.impostoIRRF = ((base * aliquota) - deducao)
      }
      this.recibo.valorLiquido = this.recibo.rendimentoTributavel - this.recibo.previdenciaOficial - iss - this.recibo.impostoIRRF
    },
    listarAction() {
      this.setAction("listar")
    },
    cancelarAction() {
      this.listarAction()
      this.novoRecibo()
    },
    saveAction(recibo) {
       recibo.orgao = {
         id: this.util.orgao.id
       }
      if (!recibo.id) {
        this.saveRecibo(recibo)
        this.listarAction()
      } else {
        this.editRecibo(recibo)
        this.listarAction()
      }
    },
    validaClasse(obj) {
        return classe(obj)
    },
    callTouch(obj) {
      return touch(obj)
    },
    exibirCampoObrigatorio(obj){
      return exibirCampoObrigatorio(obj)
    }
  },
  validations: {
    recibo: validate,
    cpf: {
      required
    }
  },
  created() {
    this.recibo.ano = this.util.ano.descricao
    this.recibo.mes = this.util.mes.value
    this.cpf = this.recibo.pessoa.cpf
    this.setForm(this.$v)
    this.carregarParametrosPorMesAnoEOrgao(
      {
        ano: this.util.ano.descricao,
        mes: this.util.mes.value,
        orgao: {id: this.util.orgao.id}
      }
    )
      .then(response => {
                  this.parametro = response.data[0]
              },
              error => {
                  console.log(error)
              }
      )
  }
}
</script>
