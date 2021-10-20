<template>
    <AppHeader class="mb-12"/>

    <AppForm @submit.prevent="submitCreate">
        <AppInput name="image" placeholder="link" label="link to image (optionally)" />
        <AppInput name="title" placeholder="title" label="Todo title" />
        <AppTextarea name="description" placeholder="description" label="Todo description" />
    </AppForm>
</template>

<script>
import axios from 'axios'
import AppHeader from '@/views/AppHeader'
import AppForm from '@/components/AppForm'
import AppInput from '@/components/AppInput'
import AppTextarea from "@/components/AppTextarea"

export default {
    name: 'Todo create',
    components: {
        AppHeader, AppForm, AppInput, AppTextarea,
    },
    methods: {
        async submitCreate(e) {
            let form_data = new FormData(e.target),
                send_data = {}

            form_data.forEach((val, key) => send_data[key]=val)

            await axios.post('todo', form_data)

            this.$router.push({name:'index'})
        }
    }
}
</script>
