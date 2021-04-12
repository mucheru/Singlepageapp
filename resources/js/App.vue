<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/userlist" class="nav-item nav-link">User List</router-link>
                    <router-link to="/get_employeelist" class="nav-item nav-link">Get Employee List</router-link>

                   
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>
