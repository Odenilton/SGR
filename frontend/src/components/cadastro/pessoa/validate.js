import {
required,
        requiredIf
} from 'vuelidate/lib/validators'

    const transferencia = function (valor) {
        return valor === '2' || valor === 2 ? true : false
    }

    const operacao = function (valor) {
         return valor === '3' || valor === 3 ? true : false
    }

        const validations = {
            cpf: {
                required
            },
            nit: {
                required
            },
            nome: {
                required
            },
            sexo: {
                required
            },
            naturalidade: {
                required
            },
            ufNaturalidade: {
                required
            },
            dataNascimento: {
                required
            },
            nomeMae: {
                required
            },
            formaPagamento: {
                required
            },
            banco: {
                required: requiredIf(vm => {
                    return transferencia(vm.formaPagamento)
                })
            },
            agencia: {
                required: requiredIf(vm => {
                    return transferencia(vm.formaPagamento)
                })
            },
            conta: {
                required: requiredIf(vm => {
                    return transferencia(vm.formaPagamento)
                })
            },
            digitoConta: {
                required: requiredIf(vm => {
                    return transferencia(vm.formaPagamento)
                })
            },
            tipoConta: {
                required: requiredIf(vm => {
                    return transferencia(vm.formaPagamento)
                })
            },
            operacao: {
                required: requiredIf(vm => {
                    return operacao(vm.banco)
                })
            },
            endereco: {
                zonaEndereco: {
                    required
                },
                logradouro: {
                    required
                },
                complemento: {
                    required
                },
                cep: {
                    required
                },
                bairro: {
                    required
                },
                numero: {
                    required
                },
                cidade: {
                    required
                },
                uf: {
                    required
                }
            },

            rg: {
                required
            },
            rgDataExpedicao: {
                required
            },
            rgOrgaoExpeditor: {
                required
            },
            rgUfOrgaoExpeditor: {
                required
            }
        }

export default validations
