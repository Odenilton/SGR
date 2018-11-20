import { required, requiredIf } from 'vuelidate/lib/validators'

const validations =	{
	name: {
		required
	},
	email: {
		required
	},
	password: {
		required: requiredIf(vm => {
					if (!vm.id){
						return true
					}
                    return false
                })
	},
	grupos: {
		required
	}
}

export default validations
