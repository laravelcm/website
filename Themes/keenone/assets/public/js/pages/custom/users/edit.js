// Class definition
var KTUsersEdit = function () {
    // Base elements
    var formEl;
    var validator;
    var avatar;

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-action="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                //KTApp.block(formEl);

                // See: http://malsup.com/jquery/form/#ajaxSubmit
                formEl.ajaxSubmit({
                    success: function() {
                        KTApp.unprogress(btn);
                        //KTApp.unblock(formEl);

                        swal.fire({
                            "title": "", 
                            "text": "The application has been successfully submitted!", 
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                });
            }
        });
    }

    return {
        // public functions
        init: function() {
            formEl = $('#kt_user_form');

            var avatar = new KTAvatar('kt_user_avatar');
            initSubmit();
        }
    };
}();

jQuery(document).ready(function() {    
    KTUsersEdit.init();
});