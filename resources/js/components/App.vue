<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Treclon</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav ml-auto">
                        <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                        <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                        <li class="nav-link" v-if="isLoggedIn"> Hi, {{name}}</li>
                        <router-link :to="{ name: 'board' }" class="nav-link" v-if="isLoggedIn">Board</router-link>
                        <a @click="logoutUser" class="nav-link" v-if="isLoggedIn"> Logout </a>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <router-view></router-view>
        </main>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                isLoggedIn: null,
                name: null
            }
        },
        methods:{
            logoutUser(){
                if(this.isLoggedIn){
                    localStorage.removeItem('jwt');
                    localStorage.removeItem('user');
                    this.isLoggedIn = null;
                    this.name = null;
                }
                this.$router.push({
                    name : 'home'
                });
            }
        },
        mounted(){
            this.isLoggedIn = localStorage.getItem('jwt');
            this.name = localStorage.getItem('user');
        }
    }
</script>
