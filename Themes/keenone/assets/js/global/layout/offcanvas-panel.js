"use strict";

var KTOffcanvasPanel = function() {
    var notificationPanel = KTUtil.get('kt_offcanvas_toolbar_notifications');
    var quickActionsPanel = KTUtil.get('kt_offcanvas_toolbar_quick_actions');
    var profilePanel = KTUtil.get('kt_offcanvas_toolbar_profile');
    var searchPanel = KTUtil.get('kt_offcanvas_toolbar_search');

    var initNotifications = function() {
        var head = KTUtil.find(notificationPanel, '.kt-offcanvas-panel__head');
        var body = KTUtil.find(notificationPanel, '.kt-offcanvas-panel__body');

        var offcanvas = new KTOffcanvas(notificationPanel, {
            overlay: true,  
            baseClass: 'kt-offcanvas-panel',
            closeBy: 'kt_offcanvas_toolbar_notifications_close',
            toggleBy: 'kt_offcanvas_toolbar_notifications_toggler_btn'
        }); 

        KTUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                var height = parseInt(KTUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KTUtil.actualHeight(head));
                    height = height - parseInt(KTUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KTUtil.css(notificationPanel, 'paddingTop'));
                height = height - parseInt(KTUtil.css(notificationPanel, 'paddingBottom'));    

                return height;
            }
        });
    }

    var initQucikActions = function() {
        var head = KTUtil.find(quickActionsPanel, '.kt-offcanvas-panel__head');
        var body = KTUtil.find(quickActionsPanel, '.kt-offcanvas-panel__body');

        var offcanvas = new KTOffcanvas(quickActionsPanel, {
            overlay: true,  
            baseClass: 'kt-offcanvas-panel',
            closeBy: 'kt_offcanvas_toolbar_quick_actions_close',
            toggleBy: 'kt_offcanvas_toolbar_quick_actions_toggler_btn'
        }); 

        KTUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                var height = parseInt(KTUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KTUtil.actualHeight(head));
                    height = height - parseInt(KTUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KTUtil.css(quickActionsPanel, 'paddingTop'));
                height = height - parseInt(KTUtil.css(quickActionsPanel, 'paddingBottom'));    

                return height;
            }
        });
    }

    var initProfile = function() {
        var head = KTUtil.find(profilePanel, '.kt-offcanvas-panel__head');
        var body = KTUtil.find(profilePanel, '.kt-offcanvas-panel__body');

        var offcanvas = new KTOffcanvas(profilePanel, {
            overlay: true,  
            baseClass: 'kt-offcanvas-panel',
            closeBy: 'kt_offcanvas_toolbar_profile_close',
            toggleBy: 'kt_offcanvas_toolbar_profile_toggler_btn'
        }); 

        KTUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                var height = parseInt(KTUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KTUtil.actualHeight(head));
                    height = height - parseInt(KTUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KTUtil.css(profilePanel, 'paddingTop'));
                height = height - parseInt(KTUtil.css(profilePanel, 'paddingBottom'));    

                return height;
            }
        });
    }

    var initSearch = function() {
        var head = KTUtil.find(searchPanel, '.kt-offcanvas-panel__head');
        var body = KTUtil.find(searchPanel, '.kt-offcanvas-panel__body');
        var search = KTUtil.get('kt_quick_search_offcanvas');
        var form = KTUtil.find(search, '.kt-quick-search__form');
        var wrapper = KTUtil.find(search, '.kt-quick-search__wrapper');

        var offcanvas = new KTOffcanvas(searchPanel, {
            overlay: true,  
            baseClass: 'kt-offcanvas-panel',
            closeBy: 'kt_offcanvas_toolbar_search_close',
            toggleBy: 'kt_offcanvas_toolbar_search_toggler_btn'
        }); 

        KTUtil.scrollInit(wrapper, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                var height = parseInt(KTUtil.getViewPort().height);

                height = height - parseInt(KTUtil.actualHeight(form));
                height = height - parseInt(KTUtil.css(form, 'marginBottom'));

                if (head) {
                    height = height - parseInt(KTUtil.actualHeight(head));
                    height = height - parseInt(KTUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KTUtil.css(searchPanel, 'paddingTop'));
                height = height - parseInt(KTUtil.css(searchPanel, 'paddingBottom'));    

                return height;
            }
        });
    }

    return {     
        init: function() {  
            initNotifications(); 
            initQucikActions();
            initProfile();
            initSearch();
        }
    };
}();

// Init on page load completed
KTUtil.ready(function() {
    KTOffcanvasPanel.init();
});