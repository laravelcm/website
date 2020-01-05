"use strict";
var KTAsideSecondary = function() {
    var panel = KTUtil.get('kt_aside_secondary');
    var content1 = KTUtil.get('kt_aside_secondary_tab_1');
    var content2 = KTUtil.get('kt_aside_secondary_tab_2');
    var content3 = KTUtil.get('kt_aside_secondary_tab_3');
    var scroll1 = KTUtil.find(content1, '.kt-aside-secondary__content-body');
    var scroll2 = KTUtil.find(content2, '.kt-aside-secondary__content-body');
    var scroll3 = KTUtil.find(content3, '.kt-aside-secondary__content-body');
    var mobileNavToggler;
    var lastOpenedTab;

    var getContentHeight = function(content) {
        var height;
        var head = KTUtil.find(content, '.kt-aside-secondary__content-head');
        var body = KTUtil.find(content, '.kt-aside-secondary__content-body');

        height = parseInt(KTUtil.getViewPort().height) - parseInt(KTUtil.actualHeight(head)) - 60;
        
        if (KTUtil.isInResponsiveRange('desktop')) {
            height = height - KTUtil.actualHeight(KTUtil.get('kt_header'));
        } else {
            height = height - KTUtil.actualHeight(KTUtil.get('kt_header_mobile'));
        }

        return height;
    }
    
    var initNavs = function() {
        $('#kt_aside_secondary_nav a[data-toggle="tab"]').on('click', function (e) {
            if ((lastOpenedTab && lastOpenedTab.is($(this))) && $('body').hasClass('kt-aside-secondary--expanded')) {
                KTLayout.closeAsideSecondary();
            } else {
                lastOpenedTab =  $(this);
                KTLayout.openAsideSecondary();                
            }
        });

        $('#kt_aside_secondary_close').on('click', function (e) {
            KTLayout.closeAsideSecondary();
        });

        $('#kt_aside_secondary_nav a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            KTUtil.scrollUpdate(scroll1);
            KTUtil.scrollUpdate(scroll2);
            KTUtil.scrollUpdate(scroll3);
        });

        mobileNavToggler = new KTToggle('kt_aside_secondary_mobile_nav_toggler', {
            target: 'body',
            targetState: 'kt-aside-secondary--mobile-nav-expanded'
        });
    }

    var initContent1 = function() {
        KTUtil.scrollInit(scroll1, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight(content1);
            }
        });
    }

    var initContent2 = function() {
        KTUtil.scrollInit(scroll2, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight(content2);
            }
        });
    }

    var initContent3 = function() {
        KTUtil.scrollInit(scroll3, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight(content3);
            }
        });
    }

    return {     
        init: function() {  
            //initOffcanvas(); 
            initNavs();
            initContent1();
            initContent2();
            initContent3();
        }
    };
}();

// Init on page load completed
KTUtil.ready(function() {
    KTAsideSecondary.init();
});