<template>
    <AppHeader class="mb-12"/>

    <div class="container mx-auto flex flex-wrap align-center justify-between">
        <TodoCard v-for="item in allItems" :key="item.id" :item="item" class="m-6" />
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import AppHeader from '@/views/AppHeader'
import TodoCard from '@/components/TodoCard'

export default {
    name: 'Home',
    components: {
        AppHeader, TodoCard
    },
    computed: mapGetters(['allItems']),
    methods: mapActions(['fetchItems']),
    async mounted() {
        await this.fetchItems()
    }
}
</script>
