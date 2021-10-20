<template>
    <div class="header-2">
        <nav class="bg-white py-2 md:py-4">
            <div class="container px-4 mx-auto md:flex md:items-center">
                <div class="hidden md:flex flex-col md:flex-row mt-3 md:mt-0" id="navbar-collapse">
                    <router-link :to="{name:'index'}" :class="link_classes">Todos</router-link>
                    <router-link :to="{name:'create'}" :class="link_classes" v-if="isAuth">Create todo</router-link>
                    <router-link :to="{name:'login'}"
                       class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent
                       rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300"
                       v-if="!isAuth"
                    >Login</router-link>
                    <button @click="logout"
                       class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent
                       rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300"
                       v-if="isAuth"
                    >Logout</button>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'App header',
    setup() {
        let link_classes = 'p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300'

        return {link_classes}
    },
    computed: mapGetters(['isAuth']),
    methods: mapActions(['logout'])
}
</script>
