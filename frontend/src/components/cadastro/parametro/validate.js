import { required, requiredUnless, requiredIf } from 'vuelidate/lib/validators'

const validations =	{
	mes: {
		required
	},
	ano: {
		required
	},
	descricao: {
		required
	},
	impostoISS: {
		required
	}
}

export default validations
