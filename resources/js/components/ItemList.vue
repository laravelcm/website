<template>
    <div class="item-list">
        <div class="item-list-header header">
            <slot name="back-button"></slot>
            <h1 class="item-list-title header-title">{{ $t(title.charAt(0).toUpperCase() + title.slice(1)) }}</h1>
            <div class="item-list-toolbar header-toolbar btn-toolbar"><slot name="add-button"></slot></div>
        </div>

        <div class="btn-toolbar item-list-actions">
            <item-list-selector
                class="mr-2"
                :filtered-models="filteredItems"
                :all-checked="allChecked"
                :loading="loading"
                :publishable="publishable"
                @check-all="checkAll"
                @check-none="checkNone"
                @check-published="checkPublished"
                @check-unpublished="checkUnpublished"
            ></item-list-selector>
            <item-list-actions
                class="mr-2"
                :number-of-checked-models="numberOfCheckedItems"
                :loading="loading"
                :publishable="publishable"
                @destroy="destroy"
                @publish="publish"
                @unpublish="unpublish"
            ></item-list-actions>
            <item-list-per-page
                v-if="pagination && this.data.total > 10"
                class="mr-2"
                :loading="loading"
                :per-page="parseInt(data.per_page)"
                @change-per-page="changeNumberOfItemsPerPage"
            ></item-list-per-page>
            <slot name="buttons"></slot>
            <div class="d-flex align-items-center ml-2">
                <span class="fa fa-spinner fa-spin fa-fw" v-if="loading"></span>
            </div>
            <small class="text-muted align-self-center" v-if="!loading">
                {{ $tc('# ' + title, data.total, { count: data.total }) }}
            </small>
            <div class="d-flex ml-auto">
                <div class="filters form-inline" v-if="searchable.length > 0">
                    <div class="input-group input-group-sm mb-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fa fa-search"></span></div>
                        </div>
                        <input
                            class="form-control"
                            type="text"
                            id="search"
                            v-model="searchString"
                            @input="onSearchStringChanged"
                        />
                    </div>
                </div>
                <div class="btn-group btn-group-sm ml-2" v-if="translatableFields !== '' && locales.length > 1">
                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        id="dropdownLangSwitcher"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span id="active-locale">{{ locales.find(item => item.short === currentLocale).long }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLangSwitcher">
                        <button
                            class="dropdown-item"
                            :class="{ active: locale === currentLocale }"
                            type="button"
                            v-for="locale in locales"
                            @click="switchLocale(locale.short)"
                        >
                            {{ locale.long }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive" v-if="filteredItems.length">
            <table class="table item-list-table">
                <thead>
                    <tr>
                        <slot :sort-array="sortArray" name="columns"></slot>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="model in filteredItems">
                        <slot :model="model" :checked-models="checkedItems" :loading="loading" name="table-row"></slot>
                    </tr>
                </tbody>
            </table>
        </div>

        <item-list-pagination
            :data="data"
            @pagination-change-page="changePage"
            v-if="pagination"
        ></item-list-pagination>
    </div>
</template>

<script>
import ItemListSelector from './ItemListSelector';
import ItemListActions from './ItemListActions';
import ItemListPerPage from './ItemListPerPage';
import ItemListStatusButton from './ItemListStatusButton';
import ItemListSearchBar from './ItemListSearchBar';
import ItemListPagination from './ItemListPagination';

export default {
    components: {
        ItemListSelector,
        ItemListActions,
        ItemListPerPage,
        ItemListStatusButton,
        ItemListSearchBar,
        ItemListPagination,
    },
    props: {
        urlBase: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
        locale: {
            type: String,
            required: true,
        },
        sorting: {
            type: Array,
            default: () => ['-id'],
        },
        pagination: {
            type: Boolean,
            default: true,
        },
        searchable: {
            type: Array,
            default: () => [],
        },
        publishable: {
            type: Boolean,
            default: true,
        },
        table: {
            type: String,
            required: true,
        },
        include: {
            type: String,
            default: '',
        },
        fields: {
            type: String,
            default: '',
        },
        translatableFields: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            loadingTimeout: null,
            searchString: null,
            sortArray: this.sorting,
            searchableArray: this.searchable,
            locales: window.TypiCMS.locales,
            currentLocale: this.locale,
            loading: false,
            total: 0,
            last_page: null,
            checkedItems: [],
            data: {
                current_page: 1,
                data: [],
                from: 1,
                last_page: 1,
                next_page_url: null,
                per_page: 50,
                prev_page_url: null,
                to: 1,
                total: 0,
            },
        };
    },
    created() {
        this.$i18n.locale = window.TypiCMS.locale;
        this.fetchData();
    },
    mounted() {
        this.$on('sort', this.sort);
        this.$on('toggle-status', this.toggleStatus);
        this.$on('update-position', this.updatePosition);
    },
    computed: {
        searchQuery() {
            if (this.searchString === null) {
                return '';
            }
            return this.searchableArray.map(item => 'filter[' + item + ']=' + this.searchString).join('&');
        },
        url() {
            let query = ['sort=' + this.sortArray.join(','), 'fields[' + this.table + ']=' + this.fields];

            if (this.include !== '') {
                query.push('include=' + this.include);
            }
            if (this.translatableFields) {
                query.push('locale=' + this.currentLocale);
                query.push('translatable_fields=' + this.translatableFields);
            }
            if (this.pagination) {
                query.push('page=' + this.data.current_page);
                query.push('per_page=' + this.data.per_page);
            }
            query.push(this.searchQuery);

            return this.urlBase + '?' + query.join('&');
        },
        filteredItems() {
            return this.data.data;
        },
        allChecked() {
            return this.filteredItems.length > 0 && this.filteredItems.length === this.checkedItems.length;
        },
        numberOfCheckedItems() {
            return this.checkedItems.length;
        },
    },
    methods: {
        fetchData() {
            this.startLoading();
            axios
                .get(this.url)
                .then(response => {
                    this.data = response.data;
                    this.stopLoading();
                })
                .catch(error => {
                    alertify.error(
                        error.response.data.message || this.$i18n.t('An error occurred with the data fetch.')
                    );
                });
        },
        onSearchStringChanged() {
            clearTimeout(this.fetchTimeout);
            this.fetchTimeout = setTimeout(() => {
                this.fetchData();
            }, 200);
        },
        startLoading() {
            this.loadingTimeout = setTimeout(() => {
                this.loading = true;
            }, 300);
        },
        stopLoading() {
            clearTimeout(this.loadingTimeout);
            this.loading = false;
        },
        switchLocale(locale) {
            this.startLoading();
            this.currentLocale = locale;
            axios.get('/admin/_locale/' + locale).then(response => {
                this.stopLoading();
                this.fetchData();
            });
        },
        search(string) {
            this.data.current_page = 1;
            this.searchString = string;
            this.fetchData();
        },
        changePage(page = 1) {
            this.data.current_page = page;
            this.fetchData();
        },
        changeNumberOfItemsPerPage(per_page) {
            this.data.current_page = 1;
            this.data.per_page = per_page;
            this.fetchData();
        },
        checkAll() {
            this.checkedItems = this.filteredItems.filter(() => true);
        },
        checkNone() {
            this.checkedItems = [];
        },
        checkPublished() {
            this.checkedItems = this.filteredItems.filter(model => model.status_translated === '1');
        },
        checkUnpublished() {
            this.checkedItems = this.filteredItems.filter(model => model.status_translated === '0');
        },
        destroy() {
            this.data.current_page = 1;
            const deleteLimit = 100;

            if (this.checkedItems.length > deleteLimit) {
                alertify.error(this.$i18n.t('Impossible to delete more than # items in one go.', { deleteLimit }));
                return false;
            }
            if (
                !window.confirm(
                    this.$i18n.tc('Are you sure you want to delete # items?', this.numberOfCheckedItems, {
                        count: this.numberOfCheckedItems,
                    })
                )
            ) {
                return false;
            }

            this.startLoading();

            axios
                .all(this.checkedItems.map(model => axios.delete(this.urlBase + '/' + model.id)))
                .then(responses => {
                    let successes = responses.filter(response => response.data.error === false);
                    this.stopLoading();
                    alertify.success(this.$i18n.tc('# items deleted', successes.length, { count: successes.length }));
                    this.fetchData();
                    this.checkedItems = [];
                })
                .catch(error => {
                    this.stopLoading();
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
        publish() {
            if (
                !window.confirm(
                    this.$i18n.tc('Are you sure you want to publish # items?', this.checkedItems.length, {
                        count: this.checkedItems.length,
                    })
                )
            ) {
                return false;
            }
            this.setStatus('1');
        },
        unpublish() {
            if (
                !window.confirm(
                    this.$i18n.tc('Are you sure you want to unpublish # items?', this.checkedItems.length, {
                        count: this.checkedItems.length,
                    })
                )
            ) {
                return false;
            }
            this.setStatus('0');
        },
        setStatus(status) {
            let data = {
                    status: {},
                },
                label = status === '1' ? 'published' : 'unpublished';
            data.status[this.currentLocale] = status;

            this.startLoading();

            axios
                .all(this.checkedItems.map(model => axios.patch(this.urlBase + '/' + model.id, data)))
                .then(responses => {
                    this.stopLoading();
                    alertify.success(this.$i18n.tc('# items ' + label, responses.length, { count: responses.length }));
                    for (let i = this.checkedItems.length - 1; i >= 0; i--) {
                        let index = this.data.data.indexOf(this.checkedItems[i]);
                        this.data.data[index].status_translated = status;
                    }
                    this.checkedItems = [];
                })
                .catch(error => {
                    console.log(error.response);
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
        toggleStatus(model) {
            let status = parseInt(model.status_translated) || 0,
                newStatus = Math.abs(status - 1).toString(),
                data = {
                    status: {},
                },
                label = newStatus === '1' ? 'published' : 'unpublished';
            model.status_translated = newStatus;
            data.status[this.currentLocale] = newStatus;
            axios
                .patch(this.urlBase + '/' + model.id, data)
                .then(response => {
                    alertify.success(this.$i18n.t('Item is ' + label + '.'));
                })
                .catch(error => {
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
        updatePosition(model) {
            let data = {
                position: model.position,
            };
            axios.patch(this.urlBase + '/' + model.id, data).catch(error => {
                alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
            });
        },
        sort(object) {
            this.data.current_page = 1;
            this.checkNone();
            this.sortArray = object;
            this.fetchData();
        },
    },
};
</script>
