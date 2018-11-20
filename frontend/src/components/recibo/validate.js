import { required, requiredUnless, requiredIf } from 'vuelidate/lib/validators'

const validations =	{
    ano: {
        required
    },
    mes: {
        required
    },
    descricao: {
        required
    },
    pessoa: {
        nome: {
            required
        }
    },
    descricaoServico: {
        required
    },
    ligacaoOrgao: {
        required
    },
    rendimentoTributavel: {
        required
    },
    previdenciaOficial: {
        required
    },
    qtdDependentes: {
		required
	},
	pensaoAlimenticia: {
		required
	},
	outrasDeducoes: {
		required
    }
}

export default validations
