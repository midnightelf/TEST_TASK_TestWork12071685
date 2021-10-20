<template>
    <form method="post" class="p-4 rounded-box" enctype="multipart/form-data">
        <div class="form-control">
            <slot></slot>
        </div>
        <div class="form-control mt-6">
            <AppSubmit />
        </div>
    </form>
</template>

<script>
import AppSubmit from "@/components/AppSubmit"

export default {
    name: 'App form',
    components: {
        AppSubmit
    }
}
</script>
