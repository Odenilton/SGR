<template>
    <div>
        <section-header :section="sectionHeader" :breadcrumb="breadcrumb"></section-header>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-page">
                        <h2 class="headline text-blue"> 401</h2>

                        <div class="error-content">
                        <h3><i class="fa fa-warning text-blue"></i> Oops! Acesso Negado.</h3>

                        <p>
                            Infelizmente você não pode acessar essa página.
                            <br /><br />
                            Tente falar com o Administrador do Sistema ou clique 
                            <router-link to="/" tag="a" activeClass="active">
                                aqui  
                            </router-link> 
                            para retonar a página inicial.
                        </p>

                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import SectionHeader from '../shared/SectionHeader.vue'

export default {
    data: function () {
        return {
        sectionHeader: { title: 'Error', titleSmall: '401 Acesso Negado' },
        breadcrumb: [{
            text: 'Cadastro',
            link: '/cadastro',
            icon: 'fa fa-dashboard'
        }, {
            text: 'Pessoa',
            link: '/cadastro/pessoa',
            icon: 'fa fa-home'
        },{
            text: 'Novo/Alterar',
            link: '',
            active: 'active'
        }]
        }
    },
    components: {
        sectionHeader: SectionHeader,
    }
}
</script>
