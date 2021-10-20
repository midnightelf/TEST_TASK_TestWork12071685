<template>
    <div class="form-control">
        <label class="label">
            <span class="label-text">{{ label }}</span>
        </label>
        <input type="text" :name="name" :placeholder="placeholder" :value="value" class="input input-bordered"/>
    </div>
</template>

<script>
export default {
    name: 'App input',
    props: {
        name: String,
        label: String,
        placeholder: String,
        value: {
            type: String,
            require: false,
            default: '',
        }
    },
}
</script>
