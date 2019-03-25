<template>
    <div class="item-list-tree">
        <div class="item-list-header header">
            <h1 class="item-list-title header-title">{{ $t(title) }}</h1>
            <div class="item-list-toolbar header-toolbar btn-toolbar"><slot name="add-button"></slot></div>
        </div>

        <div class="btn-toolbar item-list-actions">
            <slot name="buttons"></slot>
            <div class="d-flex align-items-center ml-2">
                <span class="fa fa-spinner fa-spin fa-fw" v-if="loading"></span>
            </div>
            <div class="btn-group btn-group-sm ml-auto">
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

        <sl-vue-tree v-model="models" :allowMultiselect="false" ref="slVueTree" @drop="drop" @toggle="toggle">
            <template slot="title" slot-scope="{ node }">
                <div @click="deleteFromNested(node)" class="btn btn-xs btn-link">
                    <span class="fa fa-remove"></span>
                </div>

                <a class="btn btn-light btn-xs" :href="table + '/' + node.data.id + '/edit'">{{ $t('Edit') }}</a>

                <div class="btn btn-xs btn-link btn-status" @click="toggleStatus(node)">
                    <span
                        class="fa btn-status-switch"
                        :class="node.data.status_translated == '1' ? 'fa-toggle-on' : 'fa-toggle-off'"
                    ></span>
                </div>

                <div v-if="node.data.private" class="fa fa-lock"></div>

                <div class="title">{{ node.data.title_translated }}</div>

                <div
                    v-if="node.data.redirect === 1"
                    class="fa fa-level-down text-muted"
                    :title="$t('Redirect to first child')"
                ></div>

                <div class="badge badge-info" :href="node.data.module" v-if="node.data.module">
                    {{ node.data.module }}
                </div>
            </template>

            <template slot="toggle" slot-scope="{ node }">
                <div
                    class="disclose fa fa-fw"
                    :class="{
                        'fa-caret-right': !node.isExpanded,
                        'fa-caret-down': node.isExpanded,
                        'd-none': !node.children.length,
                    }"
                ></div>
            </template>
        </sl-vue-tree>
    </div>
</template>

<script>
import SlVueTree from 'sl-vue-tree';
import ItemListSelector from './ItemListSelector';
import ItemListActions from './ItemListActions';

export default {
    components: {
        SlVueTree,
        ItemListSelector,
        ItemListActions,
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        urlBase: {
            type: String,
            required: true,
        },
        locale: {
            type: String,
            required: true,
        },
        table: {
            type: String,
            required: true,
        },
        fields: {
            type: String,
        },
        translatableFields: {
            type: String,
        },
    },
    data() {
        return {
            loadingTimeout: null,
            locales: window.TypiCMS.locales,
            currentLocale: this.locale,
            loading: false,
            models: [],
            checkedModels: [],
        };
    },
    created() {
        this.$i18n.locale = window.TypiCMS.locale;
        this.fetchData();
    },
    computed: {
        url() {
            return (
                this.urlBase +
                '?' +
                'fields[' +
                this.table +
                ']=' +
                this.fields +
                '&locale=' +
                this.currentLocale +
                '&translatable_fields=' +
                this.translatableFields
            );
        },
        filteredModels() {
            return this.models;
        },
        allChecked() {
            return this.filteredModels.length > 0 && this.filteredModels.length === this.checkedModels.length;
        },
    },
    methods: {
        fetchData() {
            this.startLoading();
            axios
                .get(this.url)
                .then(response => {
                    this.models = response.data;
                    this.stopLoading();
                })
                .catch(error => {
                    alertify.error(
                        error.response.data.message || this.$i18n.t('An error occurred with the data fetch.')
                    );
                });
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
        deleteFromNested(node) {
            let model = node.data;
            let title = model.title_translated;
            if (node.children && node.children.length > 0) {
                alertify.error(this.$i18n.t('This item cannot be deleted because it has children.'));
                return false;
            }
            if (!window.confirm(this.$i18n.t('Are you sure you want to delete “{title}”?', { title }))) {
                return false;
            }
            axios
                .delete(this.urlBase + '/' + model.id)
                .then(data => {
                    this.$refs.slVueTree.remove([node.path]);
                })
                .catch(error => {
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
        drop(draggingNodes, position) {
            let list = [];
            let draggedNode = draggingNodes[0];
            let parentId = position.node.data.parent_id;
            if (position.placement === 'inside') {
                parentId = position.node.data.id;
            }

            this.$refs.slVueTree.traverse((node, nodeModel, path) => {
                if (node.data.id === draggedNode.data.id) {
                    node.data.parent_id = parentId;
                }
                if (parentId !== null) {
                    if (node.data.id === parentId) {
                        list = node.children.map(item => {
                            item.data.parent_id = parentId;
                            if (node.data.private === 1) {
                                item.data.private = 1;
                            }
                            return item.data;
                        });
                    }
                } else {
                    if (node.data.parent_id === null) {
                        list.push(node.data);
                    }
                }
            });

            let data = {
                moved: draggedNode.data.id,
                item: list,
            };

            axios.post(this.urlBase + '/sort', data).catch(error => {
                alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
            });
        },
        toggle(node) {
            let data = {};
            data[this.title + '_' + node.data.id + '_collapsed'] = node.isExpanded;
            axios.post('/api/users/current/updatepreferences', data).catch(error => {
                alertify.error('User preference couldn’t be set.');
            });
        },
        toggleStatus(node) {
            let originalNode = JSON.parse(JSON.stringify(node)),
                status = parseInt(node.data.status_translated) || 0,
                newStatus = Math.abs(status - 1).toString(),
                data = {
                    status: {},
                },
                label = newStatus === '1' ? 'published' : 'unpublished';
            data.status[this.currentLocale] = newStatus;
            node.data.status_translated = newStatus;
            this.$refs.slVueTree.updateNode(node.path, node);
            axios
                .patch(this.urlBase + '/' + node.data.id, data)
                .then(response => {
                    alertify.success(this.$i18n.t('Item is ' + label + '.'));
                })
                .catch(error => {
                    this.$refs.slVueTree.updateNode(node.path, originalNode);
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
    },
};
</script>
