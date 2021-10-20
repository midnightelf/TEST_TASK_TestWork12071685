<template>
    <div class="rounded flex lg:card-side bordered border-3">
        <img class="rounded w-1/4" :src="image"/>
        <div class="card-body flex direction-column">
            <div class="card-body p-0 flex direction-column">
                <h2 class="card-title">{{ title }}</h2>
                <p>{{ description }}</p>
            </div>
            <div class="card-actions mt-auto">
                <router-link :to="{ name:'show', params: {id} }" class="btn btn-info md:btn-sm lg:btn-md">Show todo</router-link>
                <router-link :to="{ name: 'edit', params: {id} }" class="btn btn-primary md:btn-sm lg:btn-md" v-if="isAuth">Edit todo</router-link>
                <button @click="destroy" class="btn btn-error md:btn-sm lg:btn-md" v-if="isAuth">Destroy todo</button>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue'
import axios from 'axios'
import { mapGetters } from "vuex"

export default {
    name: 'Todo card',
    props: {
        item: {
            type: Object,
            require: true,
        },
    },
    setup(props) {
        let item = ref(props.item),
            image = ref(item.value.image),
            title = ref(item.value.title),
            description = ref(item.value.description.slice(0, 100) + '...'),
            id = ref(item.value.id)

        return {image, title, description, id }
    },
    computed: mapGetters(['isAuth']),
    methods: {
        async destroy() {
            await axios.delete(`todo/${this.item.id}`);

            this.$router.push({name:'index'})
        }
    }
}
</script>
