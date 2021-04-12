<template>
    <div class="container">
        <div class="row justify-content center" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employee List
                        <div class="card-body">
                        <table>
                            <tr>
                                <th width="50">Name</th>
                                <th width="50">Email</th>
                                <th width="50">Age</th>
                                <th width="50">Image</th>


                            </tr>  
                            <tr v-for ="employee_list in data" :key="employee_list.id">
                                <td>{{ employee_list.employee_name }}</td>
                                <td>{{ employee_list.employee_salary }}</td>
                                <td>{{ employee_list.employee_age }}</td>
                                <td>{{ employee_list.profile_image}}</td>

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
            data:[],
        }

    },
    methods:{
        get_empoyee_list(){
            axios.get('/get_employeelist')
            .then((response)=>{
                this.data=response.data.data
                //console.log(this.employee_list)
            })
            .catch(error=>{
                console.log(error)
            })
        }

    },
    created(){

        this.get_empoyee_list();
    }
    
}
</script>
<style>

</style>