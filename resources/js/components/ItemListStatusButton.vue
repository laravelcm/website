<template>
    <button class="btn btn-xs btn-link btn-status" type="button" @click="$parent.$emit('toggle-status', model)">
        <span
            class="fa btn-status-switch"
            :class="model.status_translated === '1' ? 'fa-toggle-on' : 'fa-toggle-off'"
        ></span>
    </button>
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
