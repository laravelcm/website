"use strict";

// Class definition
var KTAppInbox = function() {
    var asideEl = KTUtil.getByID('kt_inbox_aside');
    var listEl = KTUtil.getByID('kt_inbox_list');
    var viewEl = KTUtil.getByID('kt_inbox_view');
    var composeEl = KTUtil.getByID('kt_inbox_compose');

    var asideOffcanvas;

    var initEditor = function(editor) {
        // init editor
        var options = {
            modules: {
                toolbar: {}
            },
            placeholder: 'Type message...',
            theme: 'snow'
        };

        var editor = new Quill('#' + editor, options);
    }

    var initForm = function(formEl) {
        var formEl = KTUtil.getByID(formEl);

        // Init autocompletes
        var toEl = KTUtil.find(formEl, '[name=compose_to]');
        var tagifyTo = new Tagify(toEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [{
                value: 'Chris Muller',
                email: 'chris.muller@wix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_11.jpg',
                class: 'tagify__tag--brand'
            }, {
                value: 'Nick Bold',
                email: 'nick.seo@gmail.com',
                initials: 'SS',
                initialsState: 'warning',
                pic: ''
            }, {
                value: 'Alon Silko',
                email: 'alon@keenthemes.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_6.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_8.jpg'
            }, {
                value: 'Sara Loran',
                email: 'sara.loran@tilda.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_9.jpg'
            }, {
                value: 'Eric Davok',
                email: 'davok@mix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Lina Nilson',
                email: 'lina.nilson@loop.com',
                initials: 'LN',
                initialsState: 'danger',
                pic: './assets/media/users/100_15.jpg'
            }],
            templates: {
                dropdownItem: function(tagData) {
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="kt-media-card">';
                        html += '       <span class="kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '" style="background-image: url(\''+ (tagData.pic ? tagData.pic : '') + '\')">';
                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="kt-media-card__info">';
                        html += '           <a href="#" class="kt-media-card__title">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="kt-media-card__desc">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--brand';
            },
            dropdown: {
                classname: "color-blue",
                enabled: 1,
                maxItems: 5
            }
        });

        var ccEl = KTUtil.find(formEl, '[name=compose_cc]');
        var tagifyC = new Tagify(ccEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [{
                value: 'Chris Muller',
                email: 'chris.muller@wix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_11.jpg',
                class: 'tagify__tag--brand'
            }, {
                value: 'Nick Bold',
                email: 'nick.seo@gmail.com',
                initials: 'SS',
                initialsState: 'warning',
                pic: ''
            }, {
                value: 'Alon Silko',
                email: 'alon@keenthemes.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_6.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_8.jpg'
            }, {
                value: 'Sara Loran',
                email: 'sara.loran@tilda.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_9.jpg'
            }, {
                value: 'Eric Davok',
                email: 'davok@mix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Lina Nilson',
                email: 'lina.nilson@loop.com',
                initials: 'LN',
                initialsState: 'danger',
                pic: './assets/media/users/100_15.jpg'
            }],
            templates: {
                dropdownItem: function(tagData) {
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="kt-media-card">';
                        html += '       <span class="kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '" style="background-image: url(\''+ (tagData.pic ? tagData.pic : '') + '\')">';
                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="kt-media-card__info">';
                        html += '           <a href="#" class="kt-media-card__title">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="kt-media-card__desc">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--brand';
            },
            dropdown: {
                classname: "color-blue",
                enabled: 1,
                maxItems: 5
            }
        });

        var bccEl = KTUtil.find(formEl, '[name=compose_bcc]');
        var tagifyBcc = new Tagify(bccEl, {
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            whitelist: [{
                value: 'Chris Muller',
                email: 'chris.muller@wix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_11.jpg',
                class: 'tagify__tag--brand'
            }, {
                value: 'Nick Bold',
                email: 'nick.seo@gmail.com',
                initials: 'SS',
                initialsState: 'warning',
                pic: ''
            }, {
                value: 'Alon Silko',
                email: 'alon@keenthemes.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_6.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_8.jpg'
            }, {
                value: 'Sara Loran',
                email: 'sara.loran@tilda.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_9.jpg'
            }, {
                value: 'Eric Davok',
                email: 'davok@mix.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Sam Seanic',
                email: 'sam.senic@loop.com',
                initials: '',
                initialsState: '',
                pic: './assets/media/users/100_13.jpg'
            }, {
                value: 'Lina Nilson',
                email: 'lina.nilson@loop.com',
                initials: 'LN',
                initialsState: 'danger',
                pic: './assets/media/users/100_15.jpg'
            }],
            templates: {
                dropdownItem: function(tagData) {
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="kt-media-card">';
                        html += '       <span class="kt-media kt-media--' + (tagData.initialsState ? tagData.initialsState : '') + '" style="background-image: url(\''+ (tagData.pic ? tagData.pic : '') + '\')">';
                        html += '           <span>' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="kt-media-card__info">';
                        html += '           <a href="#" class="kt-media-card__title">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="kt-media-card__desc">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--brand';
            },
            dropdown: {
                classname: "color-blue",
                enabled: 1,
                maxItems: 5
            }
        });

        // CC input display
        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__tool.kt-inbox__tool--cc', 'click', function(e) {
            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');
            KTUtil.addClass(inputEl, 'kt-inbox__to--cc');
            KTUtil.find(formEl, "[name=compose_cc]").focus();
        });

        // CC input hide
        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__field.kt-inbox__field--cc .kt-inbox__icon--delete', 'click', function(e) {
            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');
            KTUtil.removeClass(inputEl, 'kt-inbox__to--cc');
        });

        // BCC input display
        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__tool.kt-inbox__tool--bcc', 'click', function(e) {
            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');
            KTUtil.addClass(inputEl, 'kt-inbox__to--bcc');
            KTUtil.find(formEl, "[name=compose_bcc]").focus();
        });

        // BCC input hide
        KTUtil.on(formEl, '.kt-inbox__to .kt-inbox__field.kt-inbox__field--bcc .kt-inbox__icon--delete', 'click', function(e) {
            var inputEl = KTUtil.find(formEl, '.kt-inbox__to');
            KTUtil.removeClass(inputEl, 'kt-inbox__to--bcc');
        });
    }

    var initAttachments = function(elemId) {
        var id = "#" + elemId;
        var previewNode = $(id + " .dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parent('.dropzone-items').html();
        previewNode.remove();

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            parallelUploads: 20,
            maxFilesize: 1, // Max filesize in MB
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + "_select" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            $(document).find(id + ' .dropzone-item').css('display', '');
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector(id + " .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector(id + " .progress-bar").style.opacity = "1";
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("complete", function(progress) {
            var thisProgressBar = id + " .dz-complete";
            setTimeout(function() {
                $(thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress").css('opacity', '0');
            }, 300)
        });
    }

    return {
        // public functions
        init: function() {
            // init
            KTAppInbox.initAside();
            KTAppInbox.initList();
            KTAppInbox.initView();
            KTAppInbox.initReply();
            KTAppInbox.initCompose();
        },

        initAside: function() {
            // Mobile offcanvas for mobile mode
            asideOffcanvas = new KTOffcanvas(asideEl, {
                overlay: true,
                baseClass: 'kt-inbox__aside',
                closeBy: 'kt_inbox_aside_close',
                toggleBy: 'kt_subheader_mobile_toggle'
            });

            // View list
            KTUtil.on(asideEl, '.kt-nav__item .kt-nav__link[data-action="list"]', 'click', function(e) {
                var type = KTUtil.attr(this, 'data-type');
                var listItemsEl = KTUtil.find(listEl, '.kt-inbox__items');
                var navItemEl = this.closest('.kt-nav__item');
                var navItemActiveEl = KTUtil.find(asideEl, '.kt-nav__item.kt-nav__item--active');

                // demo loading
                var loading = new KTDialog({
                    'type': 'loader',
                    'placement': 'top center',
                    'message': 'Loading ...'
                });
                loading.show();

                setTimeout(function() {
                    loading.hide();

                    KTUtil.css(listEl, 'display', 'flex'); // show list
                    KTUtil.css(viewEl, 'display', 'none'); // hide view

                    KTUtil.addClass(navItemEl, 'kt-nav__item--active');
                    KTUtil.removeClass(navItemActiveEl, 'kt-nav__item--active');

                    KTUtil.attr(listItemsEl, 'data-type', type);
                }, 600);
            });
        },

        initList: function() {
            // View message
            KTUtil.on(listEl, '.kt-inbox__item', 'click', function(e) {
                var actionsEl = KTUtil.find(this, '.kt-inbox__actions');

                // skip actions click
                if (e.target === actionsEl || (actionsEl && actionsEl.contains(e.target) === true)) {
                    return false;
                }

                // demo loading
                var loading = new KTDialog({
                    'type': 'loader',
                    'placement': 'top center',
                    'message': 'Loading ...'
                });
                loading.show();

                setTimeout(function() {
                    loading.hide();

                    KTUtil.css(listEl, 'display', 'none');
                    KTUtil.css(viewEl, 'display', 'flex');
                }, 800);
            });

            // Group selection
            KTUtil.on(listEl, '.kt-inbox__toolbar .kt-inbox__check .kt-checkbox input', 'click', function() {
                var items = KTUtil.findAll(listEl, '.kt-inbox__items .kt-inbox__item');

                for (var i = 0, j = items.length; i < j; i++) {
                    var item = items[i];
                    var checkbox = KTUtil.find(item, '.kt-inbox__actions .kt-checkbox input');
                    checkbox.checked = this.checked;

                    if (this.checked) {
                        KTUtil.addClass(item, 'kt-inbox__item--selected');
                    } else {
                        KTUtil.removeClass(item, 'kt-inbox__item--selected');
                    }
                }
            });

            // Individual selection
            KTUtil.on(listEl, '.kt-inbox__item .kt-checkbox input', 'click', function() {
                var item = this.closest('.kt-inbox__item');

                if (item && this.checked) {
                    KTUtil.addClass(item, 'kt-inbox__item--selected');
                } else {
                    KTUtil.removeClass(item, 'kt-inbox__item--selected');
                }
            });
        },

        initView: function() {
            // Back to listing
            KTUtil.on(viewEl, '.kt-inbox__toolbar .kt-inbox__icon.kt-inbox__icon--back', 'click', function() {
                // demo loading
                var loading = new KTDialog({
                    'type': 'loader',
                    'placement': 'top center',
                    'message': 'Loading ...'
                });
                loading.show();

                setTimeout(function() {
                    loading.hide();

                    KTUtil.css(listEl, 'display', 'flex');
                    KTUtil.css(viewEl, 'display', 'none');
                }, 1000);
            });

            // Expand/Collapse reply
            KTUtil.on(viewEl, '.kt-inbox__messages .kt-inbox__message .kt-inbox__head', 'click', function(e) {
                var dropdownToggleEl = KTUtil.find(this, '.kt-inbox__details .kt-inbox__tome .kt-inbox__label');
                var groupActionsEl = KTUtil.find(this, '.kt-inbox__actions .kt-inbox__group');

                // skip dropdown toggle click
                if (e.target === dropdownToggleEl || (dropdownToggleEl && dropdownToggleEl.contains(e.target) === true)) {
                    return false;
                }

                // skip group actions click
                if (e.target === groupActionsEl || (groupActionsEl && groupActionsEl.contains(e.target) === true)) {
                    return false;
                }

                var message = this.closest('.kt-inbox__message');

                if (KTUtil.hasClass(message, 'kt-inbox__message--expanded')) {
                    KTUtil.removeClass(message, 'kt-inbox__message--expanded');
                } else {
                    KTUtil.addClass(message, 'kt-inbox__message--expanded');
                }
            });
        },

        initReply: function() {
            initEditor('kt_inbox_reply_editor');
            initAttachments('kt_inbox_reply_attachments');
            initForm('kt_inbox_reply_form');

            // Show/Hide reply form
            KTUtil.on(viewEl, '.kt-inbox__reply .kt-inbox__actions .btn', 'click', function(e) {
                var reply = this.closest('.kt-inbox__reply');

                if (KTUtil.hasClass(reply, 'kt-inbox__reply--on')) {
                    KTUtil.removeClass(reply, 'kt-inbox__reply--on');
                } else {
                    KTUtil.addClass(reply, 'kt-inbox__reply--on');
                }
            });

            // Show reply form for messages
            KTUtil.on(viewEl, '.kt-inbox__message .kt-inbox__actions .kt-inbox__group .kt-inbox__icon.kt-inbox__icon--reply', 'click', function(e) {
                var reply = KTUtil.find(viewEl, '.kt-inbox__reply');
                KTUtil.addClass(reply, 'kt-inbox__reply--on');
            });

            // Remove reply form
            KTUtil.on(viewEl, '.kt-inbox__reply .kt-inbox__foot .kt-inbox__icon--remove', 'click', function(e) {
                var reply = this.closest('.kt-inbox__reply');

                swal.fire({
                    text: "Are you sure to discard this reply ?",
                    //type: "error",
                    buttonsStyling: false,

                    confirmButtonText: "Discard reply",
                    confirmButtonClass: "btn btn-danger",

                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    cancelButtonClass: "btn btn-label-brand"
                }).then(function(result) {
                    if (KTUtil.hasClass(reply, 'kt-inbox__reply--on')) {
                        KTUtil.removeClass(reply, 'kt-inbox__reply--on');
                    }
                });
            });
        },

        initCompose: function() {
            initEditor('kt_inbox_compose_editor');
            initAttachments('kt_inbox_compose_attachments');
            initForm('kt_inbox_compose_form');

            // Remove reply form
            KTUtil.on(composeEl, '.kt-inbox__form .kt-inbox__foot .kt-inbox__secondary .kt-inbox__icon.kt-inbox__icon--remove', 'click', function(e) {
                swal.fire({
                    text: "Are you sure to discard this message ?",
                    type: "danger",
                    buttonsStyling: false,

                    confirmButtonText: "Discard draft",
                    confirmButtonClass: "btn btn-danger",

                    showCancelButton: true,
                    cancelButtonText: "Cancel",
                    cancelButtonClass: "btn btn-label-brand"
                }).then(function(result) {
                    $(composeEl).modal('hide');
                });
            });
        }
    };
}();

KTUtil.ready(function() {
    KTAppInbox.init();
});
