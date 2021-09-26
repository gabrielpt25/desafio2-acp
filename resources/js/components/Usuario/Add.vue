<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Novo Usuário</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>NOME</label>
                                    <input type="text" class="form-control" v-model="usuario.nome">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>E-MAIL</label>
                                    <input type="text" class="form-control" v-model="usuario.email">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" v-model="usuario.cpf">
                                </div>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>PERFIL</label>
                                    <input type="text" class="form-control" v-model="usuario.perfil">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>ENDEREÇO</label>
                                    <input type="text" class="form-control" v-model="usuario.endereco">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-usuario",
    data(){
        return {
            usuario:{
                nome:"",
                email:"",
                cpf:"",
                perfil:"",
                endereco:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/usuario',this.usuario).then(response=>{
                this.$router.push({name:"usuarioList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>