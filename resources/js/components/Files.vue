<template>
    <div class="mb-4">
        <div class="form-group">
            <label for=""
                >{{ $t('Files') }}
                <small class="form-text text-muted" v-if="relatedId === 0">{{
                    $t('Save this item first, then add files.')
                }}</small></label
            >
            <p>
                <button
                    class="btn btn-sm btn-secondary mr-2"
                    v-if="relatedId !== 0"
                    @click="openFilepicker"
                    type="button"
                    :disabled="relatedId === 0"
                >
                    <i class="fa fa-plus text-white-50"></i> {{ $t('Add files') }}
                </button>
            </p>
        </div>
        <div class="filemanager">
            <draggable v-model="files" @end="onSort">
                <div
                    class="filemanager-item filemanager-item-with-name filemanager-item-file filemanager-item-removable"
                    v-for="file in files"
                    :id="'item_' + file.id"
                    :key="file.id"
                >
                    <div class="filemanager-item-wrapper">
                        <a class="filemanager-item-removable-button" @click="remove(file)" href="#"
                            ><span class="fa fa-times"></span
                        ></a>
                        <div class="filemanager-item-icon" v-if="file.type === 'i'">
                            <div class="filemanager-item-image-wrapper">
                                <img
                                    class="filemanager-item-image"
                                    :src="file.thumb_sm"
                                    :alt="file.alt_attribute_translated"
                                />
                            </div>
                        </div>
                        <div class="filemanager-item-icon" :class="'filemanager-item-icon-' + file.type" v-else></div>
                        <div class="filemanager-item-name">{{ file.name }}</div>
                    </div>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    components: {
        draggable,
    },
    props: {
        relatedTable: {
            type: String,
            required: true,
        },
        relatedId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            files: [],
            loading: false,
        };
    },
    created() {
        if (this.url !== null) {
            this.fetchData();
        }
    },
    mounted() {
        this.$root.$on('filesAdded', files => {
            this.files = files;
        });
    },
    computed: {
        url() {
            if (this.relatedId !== 0) {
                return '/api/' + this.relatedTable + '/' + this.relatedId;
            }
            return null;
        },
    },
    methods: {
        fetchData() {
            this.loading = true;
            axios
                .get(this.url + '/files')
                .then(response => {
                    this.files = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    alertify.error(
                        error.response.data.message || this.$i18n.t('An error occurred with the data fetch.')
                    );
                });
        },
        openFilepicker() {
            let options = {
                open: true,
                multiple: true,
                overlay: true,
                single: false,
                modal: true,
            };
            this.$root.$emit('openFilepicker', options);
        },
        remove(file) {
            let index = this.files.indexOf(file);

            this.files.splice(index, 1);
            this.loading = true;

            axios
                .delete(this.url + '/files/' + file.id, { remove: file.id })
                .then(response => {
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    alertify.error('Error ' + error.status + ' ' + error.statusText);
                });
        },
        onSort() {
            axios
                .post('/api/files/sort', this.files)
                .then(response => {})
                .catch(error => {
                    alertify.error('Error ' + error.status + ' ' + error.statusText);
                });
        },
    },
};
</script>
