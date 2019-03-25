<template>
    <button @click="delete" class="btn btn-xs btn-link" aria-label="delete"><span class="fa fa-remove"></span></button>
</template>

<script>
export default {
    props: {
        model: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {};
    },
    created() {},
    methods: {
        delete() {
            alert('Delete ' + this.model.id + '?');
            // this.$emit('delete', item);
        },
    },
};
</script>
