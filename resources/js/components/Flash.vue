<template>
    <div class="container">
        <div class="row justify-content center" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User List
                        <div class="card-body">
                        <table>
                            <tr>
                                <th width="50">Name</th>
                                <th width="50">Email</th>
                            </tr>  
                            <tr v-for="user in  users" :key="user.id">
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                            </tr> 
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script>
export default {
    data(){
        return{
            users:[]
        }
    },
    methods:{
        getusers(){
            axios.get('/userlist')
            .then((response)=>{
                this.users=response.data.users
            })
        }
    },
    created(){
        this.getusers()
    }
    
}
</script>
<style scoped>

</style>