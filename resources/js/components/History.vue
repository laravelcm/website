<template>
    <div class="card">
        <div class="card-header">
            {{ $t('Latest changes') }}
            <button
                class="btn-clear-history"
                id="clear-history"
                @click="clearHistory"
                v-if="filteredItems.length && clearButton"
            >
                {{ $t('Clear') }}
            </button>
        </div>

        <div class="history table-responsive" v-if="filteredItems.length">
            <table class="history-table table table-main mb-0">
                <thead>
                    <tr>
                        <th class="created_at">{{ $t('Date') }}</th>
                        <th class="title">{{ $t('Title') }}</th>
                        <th class="historable_table">{{ $t('Module') }}</th>
                        <th class="action">{{ $t('Action') }}</th>
                        <th class="user_name">{{ $t('User') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="model in filteredItems">
                        <td>{{ model.created_at | date }}</td>
                        <td>
                            <a v-if="model.href" :href="model.href + '?locale=' + model.locale">{{ model.title }}</a>
                            <span v-if="!model.href">{{ model.title }}</span>
                            <span v-if="model.locale">({{ model.locale }})</span>
                        </td>
                        <td>{{ model.historable_table }}</td>
                        <td class="action">
                            <span class="fa fa-fw" :class="model.icon_class"></span> {{ model.action }}
                        </td>
                        <td>
                            <div class="user_name">{{ model.user_name }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-body" v-else>
            <span class="text-muted">{{ $t('History is empty.') }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        clearButton: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            urlBase: '/api/history',
            searchString: null,
            sortArray: ['-id'],
            searchableArray: this.searchable,
            loading: false,
            total: 0,
            last_page: null,
            data: {
                current_page: 1,
                data: [],
                from: 1,
                last_page: 1,
                next_page_url: null,
                per_page: 100,
                prev_page_url: null,
                to: 1,
                total: 0,
            },
        };
    },
    computed: {
        url() {
            return (
                this.urlBase +
                '?' +
                'sort=' +
                this.sortArray.join(',') +
                '&fields[' +
                this.table +
                ']=' +
                this.fields +
                '&page=' +
                this.data.current_page +
                '&per_page=' +
                this.data.per_page
            );
        },
        filteredItems() {
            return this.data.data;
        },
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.loading = true;
            axios
                .get(this.url)
                .then(response => {
                    this.data = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    alertify.error(
                        error.response.data.message || this.$i18n.t('An error occurred with the data fetch.')
                    );
                });
        },
        clearHistory() {
            if (!window.confirm(this.$i18n.t('Do you want to clear history?'))) {
                return false;
            }
            this.loading = true;
            axios
                .delete(this.url)
                .then(response => {
                    this.data.data = [];
                    this.loading = false;
                })
                .catch(error => {
                    alertify.error(
                        error.response.data.message || this.$i18n.t('An error occurred with the data fetch.')
                    );
                });
        },
    },
};
</script>
