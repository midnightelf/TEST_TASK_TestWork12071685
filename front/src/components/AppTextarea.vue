<template>
    <div class="form-control">
        <label class="label">
            <span class="label-text">{{ label }}</span>
        </label>
        <textarea :name="name" :placeholder="placeholder" v-model="text" class="textarea h-24 textarea-bordered"></textarea>
    </div>
</template>

<script>
export default {
    name: 'App textarea',
    props: {
        name: String,
        label: String,
        placeholder: String,
        value: {
            type: String,
            required: false,
            default: '',
        },
    },
    computed: {
        text() {
            return this.value
        }
    }
}
</script>
