"use strict";

// Class definition
var KTUsersListColumns = function () {

	// Private functions
	var initAside = function () {
		// Mobile offcanvas for mobile mode
		var offcanvas = new KTOffcanvas('kt_users_aside', {
            overlay: true,  
            baseClass: 'kt-app__aside',
            closeBy: 'kt_users_aside_close',
            toggleBy: 'kt_subheader_mobile_toggle'
        }); 
	}

	return {
		// public functions
		init: function() {
			initAside();
		}
	};
}();

KTUtil.ready(function() {	
	KTUsersListColumns.init();
});