"use strict";
var KTLayout = function() {
    var body;

    var header;
    var headerMenu;
    var headerMenuOffcanvas;

    var asideMenu;
    var asideMenuOffcanvas;
    var asideToggler;

    var asideSecondary;
    var asideSecondaryToggler;

    var scrollTop;

    var pageStickyPortlet;

    // Header
    var initHeader = function() {
        var tmp;
        var headerEl = KTUtil.get('kt_header');

        if (tmp = KTUtil.attr(headerEl, 'data-ktheader-minimize-offset')) {
            options.offset.desktop = tmp;
        }

        if (tmp = KTUtil.attr(headerEl, 'data-ktheader-minimize-mobile-offset')) {
            options.offset.mobile = tmp;
        }

        header = new KTHeader('kt_header');
    }

    // Header Menu
    var initHeaderMenu = function() {
        // init aside left offcanvas
        headerMenuOffcanvas = new KTOffcanvas('kt_header_menu_wrapper', {
            overlay: true,
            baseClass: 'kt-header-menu-wrapper',
            closeBy: 'kt_header_menu_mobile_close_btn',
            toggleBy: {
                target: 'kt_header_mobile_toggler',
                state: 'kt-header-mobile__toolbar-toggler--active'
            }
        });

        headerMenu = new KTMenu('kt_header_menu', {
            submenu: {
                desktop: 'dropdown',
                tablet: 'accordion',
                mobile: 'accordion'
            },
            accordion: {
                slideSpeed: 200, // accordion toggle slide speed in milliseconds
                expandAll: false // allow having multiple expanded accordions in the menu
            }
        });
    }

    // Header Topbar
    var initHeaderTopbar = function() {
        asideToggler = new KTToggle('kt_header_mobile_topbar_toggler', {
            target: 'body',
            targetState: 'kt-header__topbar--mobile-on',
            togglerState: 'kt-header-mobile__toolbar-topbar-toggler--active'
        });
    }

    // Aside
    var initAside = function() {
        // init aside left offcanvas
        var asidBrandHover = false;
        var aside = KTUtil.get('kt_aside');
        var asideBrand = KTUtil.get('kt_aside_brand');
        var asideOffcanvasClass = KTUtil.hasClass(aside, 'kt-aside--offcanvas-default') ? 'kt-aside--offcanvas-default' : 'kt-aside';

        asideMenuOffcanvas = new KTOffcanvas('kt_aside', {
            baseClass: asideOffcanvasClass,
            overlay: true,
            closeBy: 'kt_aside_close_btn',
            toggleBy: {
                target: 'kt_aside_mobile_toggler',
                state: 'kt-header-mobile__toolbar-toggler--active'
            }
        });

        // Handle minimzied aside hover
        if (KTUtil.hasClass(body, 'kt-aside--fixed')) {
            var insideTm;
            var outsideTm;

            KTUtil.addEvent(aside, 'mouseenter', function(e) {
                e.preventDefault();

                if (KTUtil.isInResponsiveRange('desktop') === false) {
                    return;
                }

                if (outsideTm) {
                    clearTimeout(outsideTm);
                    outsideTm = null;
                }

                insideTm = setTimeout(function() {
                    if (KTUtil.hasClass(body, 'kt-aside--minimize') && KTUtil.isInResponsiveRange('desktop')) {
                        KTUtil.removeClass(body, 'kt-aside--minimize');
                        
                        // Minimizing class
                        KTUtil.addClass(body, 'kt-aside--minimizing');
                        KTUtil.transitionEnd(body, function() {
                            KTUtil.removeClass(body, 'kt-aside--minimizing');
                        });

                        // Hover class
                        KTUtil.addClass(body, 'kt-aside--minimize-hover');
                        asideMenu.scrollUpdate();
                        asideMenu.scrollTop();
                    }
                }, 50);
            });

            KTUtil.addEvent(aside, 'mouseleave', function(e) {
                e.preventDefault();

                if (KTUtil.isInResponsiveRange('desktop') === false) {
                    return;
                }

                if (insideTm) {
                    clearTimeout(insideTm);
                    insideTm = null;
                }

                outsideTm = setTimeout(function() {
                    if (KTUtil.hasClass(body, 'kt-aside--minimize-hover') && KTUtil.isInResponsiveRange('desktop')) {
                        KTUtil.removeClass(body, 'kt-aside--minimize-hover');
                        KTUtil.addClass(body, 'kt-aside--minimize');

                        // Minimizing class
                        KTUtil.addClass(body, 'kt-aside--minimizing');
                        KTUtil.transitionEnd(body, function() {
                            KTUtil.removeClass(body, 'kt-aside--minimizing');
                        });

                        // Hover class
                        asideMenu.scrollUpdate();
                        asideMenu.scrollTop();
                    }
                }, 100);
            });
        }
    }

    // Aside menu
    var initAsideMenu = function() {
        // Init aside menu
        var menu = KTUtil.get('kt_aside_menu');
        var menuDesktopMode = (KTUtil.attr(menu, 'data-ktmenu-dropdown') === '1' ? 'dropdown' : 'accordion');

        var scroll;
        if (KTUtil.attr(menu, 'data-ktmenu-scroll') === '1') {
            scroll = {
                rememberPosition: true, // remember position on page reload
                height: function() {  // calculate available scrollable area height
                    var height;
                    
                    if (KTUtil.isInResponsiveRange('desktop')) {
                        height =  
                            parseInt(KTUtil.getViewPort().height) - 
                            parseInt(KTUtil.actualHeight('kt_aside_brand')) -
                            parseInt(KTUtil.getByID('kt_aside_footer') ? KTUtil.actualHeight('kt_aside_footer') : 0);
                    } else {
                        height =  
                            parseInt(KTUtil.getViewPort().height) - 
                            parseInt(KTUtil.getByID('kt_aside_footer') ? KTUtil.actualHeight('kt_aside_footer') : 0);
                    }

                    height = height - (parseInt(KTUtil.css(menu, 'marginBottom')) + parseInt(KTUtil.css(menu, 'marginTop')));

                    return height;
                }
            };
        }

        asideMenu = new KTMenu('kt_aside_menu', {
            // vertical scroll
            scroll: scroll,

            // submenu setup
            submenu: {
                desktop: menuDesktopMode,
                tablet: 'accordion', // menu set to accordion in tablet mode
                mobile: 'accordion' // menu set to accordion in mobile mode
            },

            //accordion setup
            accordion: {
                expandAll: false // allow having multiple expanded accordions in the menu
            }
        });
    }

    // Sidebar toggle
    var initAsideToggler = function() {
        if (!KTUtil.get('kt_aside_toggler')) {
            return;
        }

        asideToggler = new KTToggle('kt_aside_toggler', {
            target: 'body',
            targetState: 'kt-aside--minimize',
            togglerState: 'kt-aside__brand-aside-toggler--active'
        }); 

        asideToggler.on('toggle', function(toggle) {  
            KTUtil.addClass(body, 'kt-aside--minimizing');

            KTUtil.transitionEnd(body, function() {
                KTUtil.removeClass(body, 'kt-aside--minimizing');

                if (KTUtil.get('kt_page_portlet')) {
                    pageStickyPortlet.updateSticky();      
                }
            });

            headerMenu.pauseDropdownHover(800);
            asideMenu.pauseDropdownHover(800);

            // Remember state in cookie
            Cookies.set('kt_aside_toggle_state', toggle.getState());
            // to set default minimized left aside use this cookie value in your 
            // server side code and add "kt-brand--minimize kt-aside--minimize" classes to
            // the body tag in order to initialize the minimized left aside mode during page loading.
        });

        asideToggler.on('beforeToggle', function(toggle) {   
            var body = KTUtil.get('body'); 
            if (KTUtil.hasClass(body, 'kt-aside--minimize') === false && KTUtil.hasClass(body, 'kt-aside--minimize-hover')) {
                KTUtil.removeClass(body, 'kt-aside--minimize-hover');
            }
        });
    }

    // Aside secondary
    var initAsideSecondary = function() {
        if (!KTUtil.get('kt_aside_secondary')) {
            return;
        }

        asideSecondaryToggler = new KTToggle('kt_aside_secondary_toggler', {
            target: 'body',
            targetState: 'kt-aside-secondary--expanded'
        });

        asideSecondaryToggler.on('toggle', function(toggle) {
            KTUtil.transitionEnd(body, function() {
                if (KTUtil.get('kt_page_portlet')) {
                    pageStickyPortlet.updateSticky();      
                }
            });
        });
    }

    // Scrolltop
    var initScrolltop = function() {
        var scrolltop = new KTScrolltop('kt_scrolltop', {
            offset: 300,
            speed: 600
        });
    }

    // Init page sticky portlet
    var initPageStickyPortlet = function() {
        return new KTPortlet('kt_page_portlet', {
            sticky: {
                offset: parseInt(KTUtil.css( KTUtil.get('kt_header'), 'height')),
                zIndex: 90,
                position: {
                    top: function() {
                        var pos = 0;

                        if (KTUtil.isInResponsiveRange('desktop')) {
                            if (KTUtil.hasClass(body, 'kt-header--fixed')) {
                                pos = pos + parseInt(KTUtil.css( KTUtil.get('kt_header'), 'height') );
                            }
                            
                            if (KTUtil.hasClass(body, 'kt-subheader--fixed') && KTUtil.get('kt_subheader')) {
                                pos = pos + parseInt(KTUtil.css( KTUtil.get('kt_subheader'), 'height') );
                            }
                        } else {
                            if (KTUtil.hasClass(body, 'kt-header-mobile--fixed')) {
                                pos = pos + parseInt(KTUtil.css( KTUtil.get('kt_header_mobile'), 'height') );
                            }
                        }    
                        
                        return pos;
                    },
                    left: function(portlet) {
						var porletEl = portlet.getSelf();      
						
						return KTUtil.offset(porletEl).left;
					},
					right: function(portlet) {
						var porletEl = portlet.getSelf();      

						var portletWidth = parseInt(KTUtil.css(porletEl, 'width'));
						var bodyWidth = parseInt(KTUtil.css(KTUtil.get('body'), 'width'));
						var portletOffsetLeft = KTUtil.offset(porletEl).left;
					
						return bodyWidth - portletWidth - portletOffsetLeft;
					}
                }
            }
        });
    }

    return {
        init: function() {
            body = KTUtil.get('body');

            this.initHeader();
            this.initAside();
            this.initAsideSecondary();
            this.initPageStickyPortlet();

            // Non functional links notice(can be removed in production)
            $('#kt_aside_menu, #kt_header_menu').on('click', '.kt-menu__link[href="#"]:not(.kt-menu__toggle)', function(e) {
                swal("", "You have clicked on a non-functional dummy link!");

                e.preventDefault();
            });
        },

        initHeader: function() {
            initHeader();
            initHeaderMenu();
            initHeaderTopbar();
            initScrolltop();
        },

        initAside: function() { 
            initAside();
            initAsideMenu();
            initAsideToggler();
            
            this.onAsideToggle(function(e) {
                // Update sticky portlet
                if (pageStickyPortlet) {
                    pageStickyPortlet.updateSticky();
                }

                // Reload datatable
                var datatables = $('.kt-datatable');
                if (datatables) {
                    datatables.each(function() {
                        $(this).KTDatatable('redraw');
                    });
                }                
            });
        },

        initAsideSecondary: function() { 
            initAsideSecondary();
        },

        initPageStickyPortlet: function() {
            if (!KTUtil.get('kt_page_portlet')) {
                return;
            }
            
            pageStickyPortlet = initPageStickyPortlet();
            pageStickyPortlet.initSticky();
            
            KTUtil.addResizeHandler(function(){
                pageStickyPortlet.updateSticky();
            });

            initPageStickyPortlet();
        },

        getAsideMenu: function() {
            return asideMenu;
        },

        onAsideToggle: function(handler) {
            if (typeof asideToggler.element !== 'undefined') {
                asideToggler.on('toggle', handler);
            }
        },

        getAsideToggler: function() {
            return asideToggler;
        },

        openAsideSecondary: function() {
            asideSecondaryToggler.toggleOn();
        },

        closeAsideSecondary: function() {
            asideSecondaryToggler.toggleOff();
        },

        getAsideSecondaryToggler: function() {
            return asideSecondaryToggler;
        },

        onAsideSecondaryToggle: function(handler) {
            if (asideSecondaryToggler) {
                asideSecondaryToggler.on('toggle', handler);
            }
        },

        closeMobileAsideMenuOffcanvas: function() {
            if (KTUtil.isMobileDevice()) {
                asideMenuOffcanvas.hide();
            }
        },

        closeMobileHeaderMenuOffcanvas: function() {
            if (KTUtil.isMobileDevice()) {
                headerMenuOffcanvas.hide();
            }
        }
    };
}();

// webpack support
if (typeof module !== 'undefined') {
    module.exports = KTLayout;
}

// Init on page load completed
KTUtil.ready(function() {
    KTLayout.init();
});