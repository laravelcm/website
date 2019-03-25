<template>
    <input
        class="form-control form-control-sm"
        min="0"
        type="number"
        name="position"
        v-model="model.position"
        @change="$parent.$emit('update-position', model)"
    />
</template>

<script>
export default {
    props: {
        model: {
            type: Object,
            required: true,
        },
    },
};
</script>
