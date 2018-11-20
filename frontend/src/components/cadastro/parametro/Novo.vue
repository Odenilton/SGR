<template>
  <div v-if="action == 'novo'">

    <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>

    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do parametro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
               <div class="row">
                  
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="mes">Mês</label>
                      <input disabled="true" min="01" max="12" id="mes" v-model="parametro.mes" class="form-control input-sm" placeholder="Mês">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group" >
                      <label for="ano">Ano</label>
                      <input type="number" disabled="true" min="1900" max="2018" id="ano" v-model="parametro.ano" class="form-control input-sm" placeholder="Ano">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group" :class="validaClasse($v.parametro.descricao)">
                      <label for="exampleInputEmail1">Descrição</label>
                      <input type="text" v-model="parametro.descricao" class="form-control form-control-sm input-sm" @blur="callTouch($v.parametro.descricao)" placeholder="Descrição">
                      <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.parametro.descricao)"></campo-obrigatorio>
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">ISS</h3>
                        <br /> <br />
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group" :class="validaClasse($v.parametro.impostoISS)">
                              <label for="impostoISS">Imposto ISS</label>
                              <input type="number" v-model="parametro.impostoISS" id="impostoISS" class="form-control input-sm"  @blur="callTouch($v.parametro.impostoISS)" placeholder="ISS %">
                              <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.parametro.impostoISS)"></campo-obrigatorio>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                 </div>

                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">INSS</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                            <th>Faixa</th>
                                <th>Sálario Contribuição</th>
                                <th>Alíquota</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1ª Faixa</td>
                              <td><money v-model="parametro.inssFaixa1" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.inssIndice1" class="form-control input-sm" placeholder="Alíquota"></td>
                            </tr>
                            <tr>
                              <td>2ª Faixa</td>
                              <td><money v-model="parametro.inssFaixa2" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.inssIndice2" class="form-control input-sm" placeholder="Alíquota"></td>
                            </tr>
                            <tr>
                              <td>3ª Faixa</td>
                              <td><money v-model="parametro.inssFaixa3" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.inssIndice3" class="form-control input-sm" placeholder="Alíquota"></td>
                            </tr>
                            <tr>
                              <td>4ª Faixa</td>
                              <td><money v-model="parametro.inssFaixa4" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.inssIndice4" class="form-control input-sm" placeholder="Alíquota"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                 </div>
                 
                 <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">IRRF</h3>
                        <br /> <br />
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="mes">Dedução por dependente</label>
                              <money v-model="parametro.irDeducao" class="form-control input-sm"></money>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="mes">Dedução Por Idade(65 ou mais)</label>
                              <money v-model="parametro.irDeducao65" class="form-control input-sm"></money>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label for="mes">Dedução - Prev. Própria</label>
                              <money v-model="parametro.irDeducaoPrevPro" class="form-control input-sm"></money>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                            <th>Faixa</th>
                                <th>Rendimento</th>
                                <th>Alíquota</th>
                                <th>Dedução</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1ª Faixa</td>
                              <td><money v-model="parametro.irBase1" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.irPercentual1" class="form-control input-sm" placeholder="Alíquota"></td>
                              <td><money v-model="parametro.irParcela1" class="form-control input-sm"></money></td>
                            </tr>
                            <tr>
                              <td>2ª Faixa</td>
                              <td><money v-model="parametro.irBase2" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.irPercentual2" class="form-control input-sm" placeholder="Alíquota"></td>
                              <td><money v-model="parametro.irParcela2" class="form-control input-sm"></money></td>
                            </tr>
                            <tr>
                              <td>3ª Faixa</td>
                              <td><money v-model="parametro.irBase3" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.irPercentual3" class="form-control input-sm" placeholder="Alíquota"></td>
                              <td><money v-model="parametro.irParcela3" class="form-control input-sm"></money></td>
                            </tr>
                            <tr>
                              <td>4ª Faixa</td>
                              <td><money v-model="parametro.irBase4" class="form-control input-sm"></money></td>
                              <td><input type="number" v-model="parametro.irPercentual4" class="form-control input-sm" placeholder="Alíquota"></td>
                              <td><money v-model="parametro.irParcela4" class="form-control input-sm"></money></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                 </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button @click="saveAction(parametro)" :disabled="form.$invalid" type="button" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o"></i>&nbsp;Salvar</button>
                <button @click="cancelarAction()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                <hr>

              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Ações</h3>
						</div>
						<div class="box-body">
						  <button @click="clonarMesAnterior" v-if="exibirClonarMesAnterior"
                  class="btn btn-primary btn-sm">
                  <i class="fa fa-clone"></i>&nbsp;Clonar mês anterior
              </button>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
      </div>
    </section>
  </div>
</template>

<script>
import SectionHeader from "../../shared/SectionHeader.vue";

import { mapGetters, mapActions } from "vuex";

import validate from "./validate";
import { classe, touch, exibirCampoObrigatorio } from "../../shared/validates";

import CampoObrigatorio from "../../shared/CampoObrigatorio.vue";

export default {
  data: function() {
    return {
      sectionHeader: { title: "Cadastro", titleSmall: "Parametro" },
      breadcrumb: [
        {
          text: "Cadastro",
          link: "/cadastro",
          icon: "fa fa-dashboard"
        },
        {
          text: "Paramêtros",
          link: "/cadastro/parametro",
          icon: "fa fa-home"
        },
        {
          text: "Novo/Alterar",
          link: "",
          active: "active"
        }
      ],
      exibirClonarMesAnterior: false
    };
  },
  validations: {
    parametro: validate
  },
  components: {
    sectionHeader: SectionHeader,
    campoObrigatorio: CampoObrigatorio
  },
  computed: {
    ...mapGetters({
      action: "action",
      parametro: "parametro/parametro",
      form: "parametro/form"
    })
  },
  methods: {
    ...mapActions({
      setAction: "setAction",
      setForm: "parametro/setForm",
      novoParametro: "parametro/novoParametro",
      saveParametro: "parametro/saveParametro",
      editParametro: "parametro/editParametro",
      getParametros: "parametro/setParametros",
      setParametro: "parametro/setParametro"
    }),
    validaClasse(obj) {
      return classe(obj);
    },
    callTouch(obj) {
      return touch(obj);
    },
    exibirCampoObrigatorio(obj) {
      return exibirCampoObrigatorio(obj);
    },
    clonarMesAnterior(){
      let ano = this.parametro.ano
      let mes = this.parametro.mes - 1
      let orgao = this.parametro.orgao
      let payload = {
        parametro: {
          ano: ano,
          mes: mes,
          orgao: orgao
        },
        clonar: true
      }
    
      this.getParametros(payload)
    },
    listarAction() {
      this.setAction("novo");
      let payload = {
        parametro: this.parametro,
        clonar: false
      }
      this.getParametros(payload).then(response => {
        if (this.parametro.id === null) {
          this.exibirClonarMesAnterior = true
        }
      });
    },
    cancelarAction() {
      this.listarAction();
    },
    saveAction(parametro) {
      if (!parametro.id) {
        this.saveParametro(parametro);
        this.listarAction();
      } else {
        this.editParametro(parametro);
        this.listarAction();
      }
    }
  },
  created() {
    this.setForm(this.$v);
    this.listarAction();
  }
};
</script>
