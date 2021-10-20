<template>
    <div class="hero min-h-screen rounded-badge" :style="`background-image: url(${item.image})`">
        <div class="hero-overlay bg-opacity-60 rounded-badge"></div>
        <div class="text-center hero-content text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">
                    {{ item.title }}
                </h1>
                <p class="mb-5">
                    {{ item.description }}
                </p>
                <router-link :to="{name:'index'}" class="btn btn-primary">back to the list</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex"

export default {
    name: 'Todo',
    data() {
        return {
            item: {},
        }
    },
    computed: mapGetters(['allItems']),
    mounted() {
        this.$data.item = this.allItems.find(item => item.id === Number(this.$route.params.id))
    }
}
</script>
