import { required, requiredUnless, requiredIf } from 'vuelidate/lib/validators'

const validations =	{
	nome: {
		required
	},
	cnpj: {
		required
	},
	responsavel: {
		required
	}
}

export default validations
