<template>
    <input type="checkbox" :disabled="loading" :id="model.id" :value="model" v-model="checkedModels" @click="check" />
</template>

<script>
export default {
    props: {
        model: {
            type: Object,
            required: true,
        },
        checkedModelsProp: {
            type: Array,
            required: true,
        },
        loading: {
            type: Boolean,
            required: true,
        },
    },
    computed: {
        checkedModels() {
            return this.checkedModelsProp;
        },
    },
    methods: {
        check() {
            let index = this.checkedModels.indexOf(this.model);
            if (index === -1) {
                this.checkedModels.push(this.model);
            } else {
                this.checkedModels.splice(index, 1);
            }
        },
    },
};
</script>
