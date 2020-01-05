"use strict";

// Class definition
var KTProfileOverview3 = function () {

	// Private functions
	var initAside = function () {
		// Mobile offcanvas for mobile mode
		var offcanvas = new KTOffcanvas('kt_profile_aside', {
            overlay: true,  
            baseClass: 'kt-app__aside',
            closeBy: 'kt_profile_aside_close',
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
	KTProfileOverview3.init();
});