<template>
    <div class="btn-group btn-group-sm item-list-selector">
        <label class="btn btn-light mb-0" :class="{ disabled: !filteredModels.length || loading }">
            <input
                type="checkbox"
                :disabled="!filteredModels.length || loading"
                :checked="allChecked"
                :model="allChecked"
                @click="allChecked ? $emit('check-none') : $emit('check-all')"
            />
        </label>
        <button
            type="button"
            class="btn btn-light dropdown-toggle dropdown-toggle-split"
            :disabled="!filteredModels.length || loading"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            id="dropdownSelect"
        >
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownSelect">
            <button type="button" class="dropdown-item" @click="$emit('check-all')">{{ $t('All') }}</button>
            <button type="button" class="dropdown-item" @click="$emit('check-none')">{{ $t('None') }}</button>
            <div class="dropdown-divider" v-if="publishable"></div>
            <button type="button" class="dropdown-item" v-if="publishable" @click="$emit('check-published')">
                {{ $t('Published items') }}
            </button>
            <button type="button" class="dropdown-item" v-if="publishable" @click="$emit('check-unpublished')">
                {{ $t('Unpublished items') }}
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        publishable: {
            type: Boolean,
            default: true,
        },
        filteredModels: {
            type: Array,
            required: true,
        },
        allChecked: {
            type: Boolean,
            required: true,
        },
        loading: {
            type: Boolean,
            required: true,
        },
    },
};
</script>
