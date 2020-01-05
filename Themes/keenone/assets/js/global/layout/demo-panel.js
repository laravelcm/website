"use strict";

var KTDemoPanel = function() {
    var demoPanel = KTUtil.getByID('kt_demo_panel');
    var offcanvas;

    var init = function() {
        offcanvas = new KTOffcanvas(demoPanel, {
            overlay: true,  
            baseClass: 'kt-demo-panel',
            closeBy: 'kt_demo_panel_close',
            toggleBy: 'kt_demo_panel_toggle'
        }); 

        var head = KTUtil.find(demoPanel, '.kt-demo-panel__head');
        var body = KTUtil.find(demoPanel, '.kt-demo-panel__body');

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
        
                height = height - parseInt(KTUtil.css(demoPanel, 'paddingTop'));
                height = height - parseInt(KTUtil.css(demoPanel, 'paddingBottom'));    

                return height;
            }
        });

        if (typeof offcanvas !== 'undefined' && !$.isEmptyObject(offcanvas)) {
            offcanvas.on('hide', function() {
                alert(1);
                var expires = new Date(new Date().getTime() + 60 * 60 * 1000); // expire in 60 minutes from now
                Cookies.set('kt_demo_panel_shown', 1, { expires: expires });
            });
        }
    }

    var remind = function() {
        if (!(encodeURI(window.location.hostname) == 'keenthemes.com' || encodeURI(window.location.hostname) == 'www.keenthemes.com')) {
            return;
        }

        setTimeout(function() {
            if (!Cookies.get('kt_demo_panel_shown')) {
                var expires = new Date(new Date().getTime() + 15 * 60 * 1000); // expire in 15 minutes from now
                Cookies.set('kt_demo_panel_shown', 1, { expires: expires });
                offcanvas.show();
            } 
        }, 4000);
    }

    return {     
        init: function() {  
            init(); 
            remind();
        }
    };
}();

// Init on page load completed
KTUtil.ready(function() {
    KTDemoPanel.init();
});