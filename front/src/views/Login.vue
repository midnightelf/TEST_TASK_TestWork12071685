<template>
    <AppForm @submit.prevent="submitLogin">
        <AppInput name="email" placeholder="email" label="email" value="fake@email.com" />
        <AppInput name="password" placeholder="password" label="password" value="password" />
    </AppForm>
</template>

<script>
import { mapActions } from 'vuex'
import AppForm from '@/components/AppForm'
import AppInput from '@/components/AppInput'

export default {
    name: 'Login',
    components: {
        AppForm, AppInput,
    },
    methods: {
        ...mapActions(['login']),

        async submitLogin(e) {
            let data = new FormData(e.target),
                login = {}

            data.forEach((val, key) => login[key] = val)

            await this.login(login)

            this.$router.push({name: 'index'})
        },
    },
}
</script>
