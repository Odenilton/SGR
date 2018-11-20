<template>
    <div>
      <div class="row">
        <div class="box-header with-border">
            <h3 class="box-title">2. Deduções</h3>
        </div>
        <div class="col-sm-4">
        <div class="form-group" :class="validaClasse($v.pessoa.qtdDependentes)">
          <label for="nome">2.1 Dependente (quantidade)</label>
          <input type="number" id="nome" v-model="pessoa.qtdDependentes" 
          class="form-control input-sm" @blur="callTouch($v.pessoa.qtdDependentes)"  placeholder="Quantidade">
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.qtdDependentes)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group" :class="validaClasse($v.pessoa.pensaoAlimenticia)">
          <label for="nome">2.2 Pensão alimentícia</label>
          <money id="nome" v-model="pessoa.pensaoAlimenticia" 
          class="form-control input-sm" @blur="callTouch($v.pessoa.pensaoAlimenticia)"  placeholder="Pensão">
           </money>
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.pensaoAlimenticia)"></campo-obrigatorio>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group" :class="validaClasse($v.pessoa.outrasDeducoes)">
          <label for="nome">2.3 Outras deduções</label>
          <money id="nome" v-model="pessoa.outrasDeducoes" 
          class="form-control input-sm" @blur="callTouch($v.pessoa.outrasDeducoes)"  placeholder="Outras deducões">
           </money>
          <campo-obrigatorio :exibir="exibirCampoObrigatorio($v.pessoa.outrasDeducoes)"></campo-obrigatorio>
        </div>
      </div>
    </div> 
  </div>
</template>

<script>
import { mapActions } from "vuex";

import validate from "./validate";
import { classe, touch, exibirCampoObrigatorio } from "../../shared/validates";

import CampoObrigatorio from "../../shared/CampoObrigatorio.vue";

export default {
  props: ["pessoa"],
  components: {
    campoObrigatorio: CampoObrigatorio
  },
  methods: {
    ...mapActions({
      setForm: "pessoa/setForm"
    }),
    validaClasse(obj) {
      return classe(obj);
    },
    callTouch(obj) {
      return touch(obj);
    },
    exibirCampoObrigatorio(obj) {
      return exibirCampoObrigatorio(obj);
    }
  },
  validations: {
    pessoa: validate
  },
  created() {
    this.setForm(this.$v);
  }
};
</script>
