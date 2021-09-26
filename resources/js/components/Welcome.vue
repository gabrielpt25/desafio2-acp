<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"usuarioAdd"}' class="btn btn-primary">+ Adicionar</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>USUÁRIO</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>E-MAIL</th>
                                    <th>CPF</th>
                                    <th>PERFIL</th>
                                    <th>ENDEREÇO</th>
                                </tr>
                            </thead>
                            <tbody v-if="usuarios.length > 0">
                                <tr v-for="(usuario,key) in usuarios" :key="key">
                                    <td>{{ usuario.id }}</td>
                                    <td>{{ usuario.nome }}</td>
                                    <td>{{ usuario.email }}</td>
                                    <td>{{ usuario.cpf }}</td>
                                    <td>{{ usuario.perfil }}</td>
                                    <td>{{ usuario.endereco }}</td>
                                    <td>
                                        <router-link :to='{name:"usuarioEdit",params:{id:usuario.id}}' class="btn btn-success">Alterar</router-link>
                                        <button type="button" @click="deleteUsuario(usuario.id)" class="btn btn-danger">Excluir</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Nenhum usuário cadastrado.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"usuarios",
    data(){
        return {
            usuarios:[]
        }
    },
    mounted(){
        this.getUsuarios()
    },
    methods:{
        async getUsuarios(){
            await this.axios.get('/api/usuario').then(response=>{
                this.usuarios = response.data
            }).catch(error=>{
                console.log(error)
                this.usuarios = []
            })
        },
        deleteUsuarios(id){
            if(confirm("Deseja excluir?")){
                this.axios.delete(`/api/usuario/${id}`).then(response=>{
                    this.getUsuarios()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>