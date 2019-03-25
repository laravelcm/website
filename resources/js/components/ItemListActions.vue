<template>
    <div class="btn-group btn-group-sm">
        <button
            class="btn btn-light dropdown-toggle"
            :disabled="numberOfCheckedModels === 0 || loading"
            type="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true"
            id="dropdownActions"
        >
            {{ $t('Action') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownActions">
            <button type="button" class="dropdown-item" v-if="publishable" @click="$emit('publish')">
                {{ $t('Publish') }} <span class="text-muted">({{ locale }})</span>
            </button>
            <button type="button" class="dropdown-item" v-if="publishable" @click="$emit('unpublish')">
                {{ $t('Unpublish') }} <span class="text-muted">({{ locale }})</span>
            </button>
            <div class="dropdown-divider" v-if="publishable"></div>
            <button type="button" class="dropdown-item" @click="$emit('destroy')">{{ $t('Delete') }}</button>
            <div role="separator" class="divider"></div>
            <button type="button" class="dropdown-item" disabled>
                <small>{{ $tc('# items selected', numberOfCheckedModels, { count: numberOfCheckedModels }) }}</small>
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
        numberOfCheckedModels: {
            type: Number,
            required: true,
        },
        loading: {
            type: Boolean,
            required: true,
        },
    },
    data() {
        return {
            locale: TypiCMS.content_locale,
        };
    },
};
</script>
