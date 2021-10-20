<template>
    <button type="submit" class="btn btn-primary btn-wide">
        {{ buttonText }}
    </button>
</template>

<script>
export default {
    name: 'App submit',
    props: {
        buttonText: {
            type: String,
            default: 'Submit',
        },
    },
}
</script>
