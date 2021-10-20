<template>
    <AppHeader class="mb-12"/>

    <AppForm @submit.prevent="submitEdit">
        <AppInput name="image" placeholder="link" label="link to image (optionally)" :value="item.image" />
        <AppInput name="title" placeholder="title" label="Todo title" :value="item.title" />
        <AppTextarea name="description" placeholder="description" label="Todo description" :value="item.description" />
    </AppForm>
</template>

<script>
import axios from 'axios'
import {mapGetters} from "vuex";
import AppHeader from '@/views/AppHeader'
import AppForm from '@/components/AppForm'
import AppInput from '@/components/AppInput'
import AppTextarea from "@/components/AppTextarea"

export default {
    name: 'Todo create',
    data() {
        return {
            item: {}
        }
    },
    components: {
        AppHeader, AppForm, AppInput, AppTextarea,
    },
    computed: mapGetters(['allItems']),
    mounted() {
        this.$data.item = this.allItems.find(item => item.id === Number(this.$route.params.id))
    },
    methods: {
        async submitEdit(e) {
            let form_data = new FormData(e.target),
                send_data = {}

            form_data.forEach((val, key) => send_data[key]=val)

            await axios.put(`todo/${this.item.id}`, send_data, {
                'Accept': 'application/json',
                'Authorization': 'Bearer 34|8xHpEXw7v4Gvq4ZlGOJQGq0tbpAHQw2tRMJClqAG'
            })

            this.$router.push({name:'index'})
        }
    },
}
</script>
