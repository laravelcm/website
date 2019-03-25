<template>
    <nav class="pagination item-list-pagination" v-if="data.total > data.per_page">
        <button
            class="page-item pagination-prev-nav"
            :disabled="!data.prev_page_url"
            :aria-label="$t('Previous')"
            @click="selectPage(--data.current_page)"
        >
            <small aria-hidden="true">←</small> <small>{{ $t('Previous') }}</small>
        </button>
        <button
            class="page-item pagination-page-nav"
            v-for="page in getPages()"
            :disabled="page === '…'"
            :class="{
                'btn-secondary': page == data.current_page && page !== '…',
                'btn-light': page !== data.current_page && page !== '…',
            }"
            @click="selectPage(page)"
        >
            {{ page }}
        </button>
        <button
            class="page-item pagination-next-nav"
            :disabled="!data.next_page_url"
            :aria-label="$t('Next')"
            @click="selectPage(++data.current_page)"
        >
            <small>{{ $t('Next') }}</small> <small aria-hidden="true">→</small>
        </button>
    </nav>
</template>

<script>
export default {
    props: {
        data: {
            type: Object,
            default: function() {
                return {
                    current_page: 1,
                    data: [],
                    from: 1,
                    last_page: 1,
                    next_page_url: null,
                    per_page: 10,
                    prev_page_url: null,
                    to: 1,
                    total: 0,
                };
            },
        },
        limit: {
            type: Number,
            default: 4,
        },
    },
    methods: {
        selectPage: function(page) {
            if (page === '…') {
                return;
            }

            this.$emit('pagination-change-page', page);
        },
        getPages: function() {
            if (this.limit === -1) {
                return 0;
            }

            if (this.limit === 0) {
                return this.data.last_page;
            }

            let delta = this.limit,
                left = this.data.current_page - delta,
                right = this.data.current_page + delta + 1,
                range = [],
                pages = [],
                l;

            for (let i = 1; i <= this.data.last_page; i++) {
                if (i == 1 || i == this.data.last_page || (i >= left && i < right)) {
                    range.push(i);
                }
            }

            range.forEach(function(i) {
                if (l) {
                    if (i - l === 2) {
                        pages.push(l + 1);
                    } else if (i - l !== 1) {
                        pages.push('…');
                    }
                }
                pages.push(i);
                l = i;
            });

            return pages;
        },
    },
};
</script>
