<template>
    <div class="btn-group btn-group-sm item-list-per-page">
        <button
            class="btn btn-light dropdown-toggle"
            :disabled="loading"
            type="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true"
            id="dropdownActions"
        >
            {{ perPage }} {{ $t('per page') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownActions">
            <button
                v-for="value in values"
                type="button"
                class="dropdown-item"
                @click="$emit('change-per-page', value)"
            >
                {{ value }}
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        loading: {
            type: Boolean,
            required: true,
        },
        values: {
            type: Array,
            default: () => [10, 20, 50, 100, 500],
        },
        perPage: {
            type: Number,
            required: true,
        },
    },
};
</script>
