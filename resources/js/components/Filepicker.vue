<template>
    <div class="filepicker" :class="classes" id="filepicker" ref="filepicker">
        <div class="wrapper">
            <div class="filepicker-header header">
                <h1 class="filepicker-title header-title">
                    <div v-for="(folder, index) in path">
                        <span
                            class="filepicker-title-clickable"
                            v-if="path.length !== index + 1"
                            href="#"
                            @click="openFolder(folder)"
                            >{{ folder.name }}</span
                        >
                        <span v-else>{{ folder.name }}</span>
                    </div>
                </h1>
                <button type="button" class="btn btn-sm btn-primary header-btn-add" id="btnAddFiles" v-if="dropzone">
                    <span class="fa fa-upload text-white-50"></span> {{ $t('Upload files') }}
                </button>
            </div>

            <button class="filepicker-btn-close" type="button" v-if="this.modal" @click="closeModal">
                <span class="fa fa-close"></span>
            </button>

            <div class="btn-toolbar mb-4">
                <button class="btn btn-sm btn-light mr-2" @click="newFolder(folder.id)" type="button">
                    <span class="fa fa-folder-o fa-fw"></span> {{ $t('New folder') }}
                </button>
                <div class="btn-group btn-group-sm dropdown mr-2">
                    <button
                        class="btn btn-light dropdown-toggle"
                        :class="{ disabled: !selectedItems.length }"
                        type="button"
                        id="dropdownMenu1"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="true"
                    >
                        {{ $t('Action') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <button class="dropdown-item" type="button" @click="deleteSelected">{{ $t('Delete') }}</button>
                        <button
                            class="dropdown-item"
                            :class="{ disabled: !folder.id }"
                            type="button"
                            @click="moveToParentFolder()"
                        >
                            {{ $t('Move to parent folder') }}
                        </button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item disabled" type="button">
                            {{ $tc('# items selected', selectedItems.length, { count: selectedItems.length }) }}
                        </button>
                    </div>
                </div>
                <div class="btn-group btn-group-sm">
                    <button
                        class="btn btn-light"
                        :class="{ active: view === 'grid' }"
                        type="button"
                        @click="switchView('grid')"
                    >
                        <span class="fa fa-fw fa-th"></span> Grid
                    </button>
                    <button
                        class="btn btn-light"
                        :class="{ active: view === 'list' }"
                        type="button"
                        @click="switchView('list')"
                    >
                        <span class="fa fa-fw fa-bars"></span> List
                    </button>
                </div>
                <div class="d-flex align-items-center ml-2">
                    <span class="fa fa-spinner fa-spin fa-fw" v-if="loading"></span>
                </div>
            </div>

            <vue-dropzone
                id="dropzone"
                ref="dropzone"
                :options="dropOptions"
                @vdropzone-success="dropzoneSuccess"
                @vdropzone-sending="dropzoneSending"
                @vdropzone-complete="dropzoneComplete"
                v-if="dropzone"
            >
            </vue-dropzone>

            <div @click="checkNone()" class="filemanager" :class="{ 'filemanager-list': view === 'list' }">
                <div
                    class="filemanager-item filemanager-item-with-name filemanager-item-editable"
                    v-for="item in filteredItems"
                    @click="check(item, $event)"
                    :id="'item_' + item.id"
                    :class="{
                        'filemanager-item-selected': selectedItems.indexOf(item) !== -1,
                        'filemanager-item-folder': item.type === 'f',
                        'filemanager-item-file': item.type !== 'f',
                        'filemanager-item-dragging-source': dragging && selectedItems.indexOf(item) !== -1,
                    }"
                    draggable="true"
                    @drop="drop(item, $event)"
                    @dragstart="dragStart(item, $event)"
                    @dragover="dragOver($event)"
                    @dragenter="dragEnter($event)"
                    @dragleave="dragLeave($event)"
                    @dragend="dragEnd($event)"
                    @dblclick="item.type === 'f' ? openFolder(item) : onDoubleClick(item)"
                >
                    <div class="filemanager-item-wrapper">
                        <div class="filemanager-item-icon" v-if="item.type === 'i'">
                            <div class="filemanager-item-image-wrapper">
                                <img
                                    class="filemanager-item-image"
                                    :src="item.thumb_sm"
                                    :alt="item.alt_attribute_translated"
                                />
                            </div>
                        </div>
                        <div class="filemanager-item-icon" :class="'filemanager-item-icon-' + item.type" v-else></div>
                        <div class="filemanager-item-name">{{ item.name }}</div>
                        <a class="filemanager-item-editable-button" :href="'/admin/files/' + item.id + '/edit'">
                            <span class="fa fa-pencil"></span>
                        </a>
                    </div>
                </div>
            </div>

            <button
                class="btn btn-success filepicker-btn-add btn-add-multiple"
                type="button"
                :disabled="selectedFiles.length < 1"
                @click="addSelectedFiles()"
                id="btn-add-selected-files"
                v-if="options.multiple"
            >
                {{ $t('Add selected files') }}
            </button>

            <button
                class="btn btn-success filepicker-btn-add btn-add-single"
                :disabled="selectedFiles.length !== 1"
                type="button"
                @click="addSingleFile(selectedFiles[0])"
                id="btn-add-selected-file"
                v-if="options.single"
            >
                {{ $t('Add selected file') }}
            </button>
        </div>
    </div>
</template>

<script>
import ItemListActions from './ItemListActions';
import vueDropzone from 'vue2-dropzone';

export default {
    components: {
        ItemListActions,
        vueDropzone,
    },
    props: {
        modal: {
            type: Boolean,
            default: true,
        },
        dropzone: {
            type: Boolean,
            default: true,
        },
        multiple: {
            type: Boolean,
            default: false,
        },
        single: {
            type: Boolean,
            default: false,
        },
        open: {
            type: Boolean,
            default: false,
        },
        overlay: {
            type: Boolean,
            default: true,
        },
        relatedTable: {
            type: String,
            default: '',
        },
        relatedId: {
            type: Number,
            default: 0,
        },
    },
    data() {
        return {
            loadingTimeout: null,
            dragging: false,
            loading: false,
            total: 0,
            view: 'grid',
            selectedItems: [],
            baseUrl: '/api/files',
            options: {
                modal: this.modal,
                dropzone: this.dropzone,
                multiple: this.multiple,
                single: this.single,
                open: this.open,
                overlay: this.overlay,
            },
            dropOptions: {
                clickable: ['#btnAddFiles'],
                url: '/admin/files',
                dictDefaultMessage: this.$i18n.t('Drop to upload.'),
                acceptedFiles: [
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                    'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
                    'application/vnd.openxmlformats-officedocument.presentationml.slide',
                    'application/msword',
                    'application/vnd.ms-powerpoint',
                    'application/vnd.ms-excel',
                    'application/pdf',
                    'application/postscript',
                    'application/zip',
                    'text/plain',
                    'image/svg+xml',
                    'image/tiff',
                    'image/jpeg',
                    'image/gif',
                    'image/png',
                    'image/bmp',
                    'image/gif',
                    'audio/*',
                    'video/*',
                ].join(),
                timeout: null,
                maxFilesize: 60,
                paramName: 'name',
            },
            folder: {
                id: '',
            },
            data: {
                models: [],
                path: [],
            },
        };
    },
    created() {
        this.fetchData();
    },
    mounted() {
        if (sessionStorage.getItem('view')) {
            this.view = JSON.parse(sessionStorage.getItem('view'));
        }
        window.EventBus.$on('openFilepickerForCKEditor', options => {
            $('html, body').addClass('noscroll');
            this.options = options;
        });
        this.$root.$on('openFilepicker', options => {
            $('html, body').addClass('noscroll');
            this.options = options;
        });
    },
    computed: {
        classes() {
            return {
                'filepicker-modal': this.options.modal,
                'filepicker-multiple': this.options.multiple,
                'filepicker-single': this.options.single,
                'filepicker-modal-open': this.options.open,
                'filepicker-modal-no-overlay': !this.options.overlay,
            };
        },
        url() {
            let url = this.baseUrl;
            if (sessionStorage.getItem('folder')) {
                this.folder = JSON.parse(sessionStorage.getItem('folder'));
            }
            if (this.folder.id !== '') {
                url += '?folder_id=' + this.folder.id;
            }
            return url;
        },
        filteredItems() {
            return this.data.models;
        },
        path() {
            return this.data.path;
        },
        allChecked() {
            return this.filteredItems.length > 0 && this.filteredItems.length === this.selectedItems.length;
        },
        numberOfselectedItems() {
            return this.selectedItems.length;
        },
        selectedFiles() {
            return this.selectedItems.filter(item => item.type !== 'f');
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
        startLoading() {
            this.loadingTimeout = setTimeout(() => {
                this.loading = true;
            }, 300);
        },
        stopLoading() {
            clearTimeout(this.loadingTimeout);
            this.loading = false;
        },
        dropzoneSending(file, xhr, formData) {
            this.startLoading();
            formData.append('_token', document.head.querySelector('meta[name="csrf-token"]').content);
            formData.append('folder_id', this.folder.id);
            for (var i = TypiCMS.locales.length - 1; i >= 0; i--) {
                formData.append('description[' + TypiCMS.locales[i].short + ']', '');
                formData.append('alt_attribute[' + TypiCMS.locales[i].short + ']', '');
            }
        },
        dropzoneSuccess(file, response) {
            window.setTimeout(() => {
                $(file.previewElement).fadeOut('fast', () => {
                    this.$refs.dropzone.removeFile(file);
                    this.data.models.push(response.model);
                    this.data.models.sort((a, b) => a.id - b.id);
                });
            }, 1000);
        },
        dropzoneComplete() {
            if (
                this.$refs.dropzone.getUploadingFiles().length === 0 &&
                this.$refs.dropzone.getQueuedFiles().length === 0
            ) {
                setTimeout(() => {
                    this.stopLoading();
                }, 1000);
            }
        },
        dragStart(item, event) {
            event.dataTransfer.setData('text', '');
            this.dragging = true;
            if (this.selectedItems.indexOf(item) === -1) {
                this.selectedItems = [];
                this.selectedItems.push(item);
            }
        },
        dragOver(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        },
        dragEnd(event) {
            this.dragging = false;
        },
        dragEnter(event) {
            if (event.target.classList.contains('filemanager-item-folder')) {
                event.target.classList.add('filemanager-item-over');
            }
        },
        dragLeave(event) {
            event.target.classList.remove('filemanager-item-over');
        },
        drop(targetItem, event) {
            event.target.classList.remove('filemanager-item-over');
            this.dragging = false;

            let ids = [];
            this.selectedItems.forEach(item => {
                ids.push(item.id);
            });

            if (targetItem.type !== 'f' || ids.indexOf(targetItem.id) !== -1) {
                return;
            }

            for (var i = this.selectedItems.length - 1; i >= 0; i--) {
                let draggedItem = this.selectedItems[i];
                var index = this.data.models.indexOf(draggedItem);
                this.data.models.splice(index, 1);
            }

            let data = {
                folder_id: targetItem.id,
            };

            axios
                .patch('/admin/files/' + ids.join(), data)
                .then(response => {
                    this.fetchData();
                })
                .catch(error => {
                    alertify.error('Error ' + error.status + ' ' + error.statusText);
                });

            this.selectedItems = [];
        },
        newFolder(folderId) {
            let name = window.prompt('What is the name of the new folder?');
            if (!name) {
                return;
            }
            let data = {
                folder_id: folderId,
                type: 'f',
                name: name,
                description: {},
                alt_attribute: {},
            };

            axios
                .post('/admin/files', data)
                .then(response => {
                    this.data.models.push(response.data.model);
                })
                .catch(error => {
                    alertify.error(error.response.data.message || this.$i18n.t('An error occurred.'));
                });
        },
        check(item, $event) {
            $event.stopPropagation();
            let indexOfLastCheckedItem = this.data.models.indexOf(this.selectedItems[this.selectedItems.length - 1]);
            let index = this.selectedItems.indexOf(item);
            if (!($event.ctrlKey || $event.metaKey || $event.shiftKey)) {
                this.selectedItems = [];
            }
            if (index !== -1 && ($event.metaKey || $event.ctrlKey)) {
                this.selectedItems.splice(index, 1);
            } else if (this.selectedItems.indexOf(item) === -1) {
                this.selectedItems.push(item);
            }
            if (index === -1) {
                if ($event.shiftKey) {
                    let currentItemIndex = this.data.models.indexOf(item);
                    this.data.models.forEach((item, index) => {
                        if (currentItemIndex > indexOfLastCheckedItem) {
                            if (indexOfLastCheckedItem === -1) {
                                if (index <= currentItemIndex) {
                                    this.selectedItems.push(item);
                                }
                            }
                            if (indexOfLastCheckedItem !== -1) {
                                if (index > indexOfLastCheckedItem && index < currentItemIndex) {
                                    if (this.selectedItems.indexOf(item) === -1) {
                                        this.selectedItems.push(item);
                                    }
                                }
                            }
                        }
                        if (currentItemIndex < indexOfLastCheckedItem) {
                            if (indexOfLastCheckedItem !== -1) {
                                if (index < indexOfLastCheckedItem && index > currentItemIndex) {
                                    if (this.selectedItems.indexOf(item) === -1) {
                                        this.selectedItems.push(item);
                                    }
                                }
                            }
                        }
                    });
                }
            }
        },
        moveToParentFolder() {
            if (!this.folder.id) {
                return;
            }

            var ids = [],
                models = this.selectedItems,
                number = models.length;

            if (this.selectedItems.length > this.deleteLimit) {
                alertify.error('Too much elements (max ' + this.deleteLimit + ' items.)');
                return false;
            }

            models.forEach(item => {
                ids.push(item.id);
                var index = this.data.models.indexOf(item);
                this.data.models.splice(index, 1);
            });

            this.selectedItems = [];

            this.startLoading();

            let data = {
                folder_id: this.path[this.path.length - 2].id,
            };

            axios
                .patch('/admin/files/' + ids.join(), data)
                .then(response => {
                    this.stopLoading();
                    if (response.data.number < number) {
                        alertify.error(number - response.data.number + ' items could not be moved.');
                    }
                    if (response.data.number > 0) {
                        alertify.success(response.data.number + ' items moved.');
                    }
                })
                .catch(error => {
                    this.stopLoading();
                    alertify.error('Error ' + error.status + ' ' + error.statusText);
                });
        },
        addSingleFile(item) {
            this.$root.$emit('fileAdded', item);
            var CKEditorCleanUpFuncNum = $('#filepicker').data('CKEditorCleanUpFuncNum'),
                CKEditorFuncNum = $('#filepicker').data('CKEditorFuncNum');
            if (!!CKEditorFuncNum || !!CKEditorCleanUpFuncNum) {
                parent.CKEDITOR.tools.callFunction(CKEditorFuncNum, '/storage/' + item.path);
                parent.CKEDITOR.tools.callFunction(CKEditorCleanUpFuncNum);
            }
            this.closeModal();
        },
        addSelectedFiles() {
            let ids = [],
                data = {};

            if (this.selectedFiles.length === 0) {
                this.closeModal();
                return;
            }

            this.selectedFiles.forEach(file => {
                ids.push(file.id);
            });
            data.files = ids;

            axios
                .post('/api/' + this.relatedTable + '/' + this.relatedId + '/files', data)
                .then(response => {
                    this.selectedItems = [];
                    this.$root.$emit('filesAdded', response.data.models);
                    this.closeModal();

                    if (response.data.number === 0) {
                        alertify.error(response.data.message);
                    } else {
                        alertify.success(response.data.message);
                    }
                })
                .catch(error => {
                    console.log(error);
                    alertify.error('Error ' + error.status + ' ' + error.statusText);
                });
        },
        closeModal() {
            $('html, body').removeClass('noscroll');
            this.options.open = false;
        },
        switchView(view) {
            this.view = view;
            sessionStorage.setItem('view', JSON.stringify(view));
        },
        openFolder(folder) {
            this.folder = folder;
            sessionStorage.setItem('folder', JSON.stringify(folder));
            this.fetchData();
            this.selectedItems = [];
        },
        onDoubleClick(item) {
            if (this.options.multiple) {
                this.addSelectedFiles();
            } else {
                this.addSingleFile(item);
            }
        },
        checkNone() {
            this.selectedItems = [];
        },
        deleteSelected() {
            const deleteLimit = 100;

            for (let item of this.selectedItems) {
                if (item.children.length > 0) {
                    alertify.error(this.$i18n.t('A non-empty folder cannot be deleted.'));
                    return false;
                }
            }

            if (this.selectedItems.length > deleteLimit) {
                alertify.error(this.$i18n.t('Impossible to delete more than # items in one go.', { deleteLimit }));
                return false;
            }
            if (
                !window.confirm(
                    this.$i18n.tc('Are you sure you want to delete # items?', this.selectedItems.length, {
                        count: this.selectedItems.length,
                    })
                )
            ) {
                return false;
            }

            this.startLoading();

            axios
                .all(this.selectedItems.map(item => axios.delete(this.baseUrl + '/' + item.id)))
                .then(responses => {
                    let successes = responses.filter(response => response.data.error === false);
                    this.stopLoading();
                    alertify.success(
                        this.$i18n.tc('# items deleted', successes.length, {
                            count: successes.length,
                        })
                    );
                    this.fetchData();
                    this.selectedItems = [];
                })
                .catch(error => {
                    alertify.error(error.response.data.message || this.$i18n.t('Sorry, an error occurred.'));
                });
        },
    },
};
</script>
