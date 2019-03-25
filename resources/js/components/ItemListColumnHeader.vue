<template>
    <th :class="classes" @click="sort">
        <span>{{ label }}</span>
        <form class="item-list-search-bar" v-if="filterable" @submit.prevent="search">
            <div class="input-group input-group-sm">
                <input
                    type="text"
                    class="form-control"
                    v-model="string"
                    :placeholder="$t('Search')"
                    :aria-label="$t('Search')"
                />
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <span class="fa fa-search fa-fw"></span> <span class="sr-only">{{ $t('Search') }}</span>
                    </button>
                </div>
            </div>
        </form>
    </th>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            default: '',
        },
        filterable: {
            type: Boolean,
            default: false,
        },
        sortable: {
            type: Boolean,
            default: false,
        },
        sortArray: {
            type: Array,
            default: () => {
                return [];
            },
        },
    },
    computed: {
        column() {
            return this.name;
        },
        classes() {
            let classes = [];
            classes.push(this.name);
            if (this.sortable) {
                classes.push('th-sort');
            }
            if (this.sortArray.indexOf(this.column) !== -1) {
                classes.push('th-sort-asc');
            }
            if (this.sortArray.indexOf('-' + this.column) !== -1) {
                classes.push('th-sort-desc');
            }
            return classes.join(' ');
        },
    },
    methods: {
        sort() {
            if (this.sortable) {
                let sort = [this.column];
                if (this.sortArray.indexOf(this.column) !== -1) {
                    sort = ['-' + this.column];
                }
                if (this.sortArray.indexOf('-' + this.column) !== -1) {
                    sort = [this.column];
                }
                this.$parent.$emit('sort', sort);
            }
        },
    },
};
</script>
