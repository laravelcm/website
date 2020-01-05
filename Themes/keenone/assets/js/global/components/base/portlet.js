"use strict";
// plugin setup
var KTPortlet = function(elementId, options) {
    // Main object
    var the = this;
    var init = false;

    // Get element object
    var element = KTUtil.get(elementId);
    var body = KTUtil.get('body');

    if (!element) {
        return;
    }

    // Default options
    var defaultOptions = {
        bodyToggleSpeed: 400,
        tooltips: true,
        tools: {
            toggle: {
                collapse: 'Collapse',
                expand: 'Expand'
            },
            reload: 'Reload',
            remove: 'Remove',
            fullscreen: {
                on: 'Fullscreen',
                off: 'Exit Fullscreen'
            }
        },
        sticky: {
            offset: 300,
            zIndex: 101
        }
    };

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Construct
         */

        construct: function(options) {
            if (KTUtil.data(element).has('portlet')) {
                the = KTUtil.data(element).get('portlet');
            } else {
                // reset menu
                Plugin.init(options);

                // build menu
                Plugin.build();

                KTUtil.data(element).set('portlet', the);
            }

            return the;
        },

        /**
         * Init portlet
         */
        init: function(options) {
            the.element = element;
            the.events = [];

            // merge default and user defined options
            the.options = KTUtil.deepExtend({}, defaultOptions, options);
            the.head = KTUtil.child(element, '.kt-portlet__head');
            the.foot = KTUtil.child(element, '.kt-portlet__foot');

            if (KTUtil.child(element, '.kt-portlet__body')) {
                the.body = KTUtil.child(element, '.kt-portlet__body');
            } else if (KTUtil.child(element, '.kt-form')) {
                the.body = KTUtil.child(element, '.kt-form');
            }
        },

        /**
         * Build Form Wizard
         */
        build: function() {
            // Remove
            var remove = KTUtil.find(the.head, '[data-ktportlet-tool=remove]');
            if (remove) {
                KTUtil.addEvent(remove, 'click', function(e) {
                    e.preventDefault();
                    Plugin.remove();
                });
            }

            // Reload
            var reload = KTUtil.find(the.head, '[data-ktportlet-tool=reload]');
            if (reload) {
                KTUtil.addEvent(reload, 'click', function(e) {
                    e.preventDefault();
                    Plugin.reload();
                });
            }

            // Toggle
            var toggle = KTUtil.find(the.head, '[data-ktportlet-tool=toggle]');
            if (toggle) {
                KTUtil.addEvent(toggle, 'click', function(e) {
                    e.preventDefault();
                    Plugin.toggle();
                });
            }

            //== Fullscreen
            var fullscreen = KTUtil.find(the.head, '[data-ktportlet-tool=fullscreen]');
            if (fullscreen) {
                KTUtil.addEvent(fullscreen, 'click', function(e) {
                    e.preventDefault();
                    Plugin.fullscreen();
                });
            }

            Plugin.setupTooltips();
        },

        /**
         * Enable stickt mode
         */
        initSticky: function() {
            var lastScrollTop = 0;
            var offset = the.options.sticky.offset;

            if (!the.head) {
                return;
            }

	        window.addEventListener('scroll', Plugin.onScrollSticky);
        },

	    /**
	     * Window scroll handle event for sticky portlet
	     */
	    onScrollSticky: function(e) {
		    var offset = the.options.sticky.offset;

		    if(isNaN(offset)) return;

		    var st = KTUtil.getScrollTop();

		    if (st >= offset && KTUtil.hasClass(body, 'kt-portlet--sticky') === false) {
			    Plugin.eventTrigger('stickyOn');

			    KTUtil.addClass(body, 'kt-portlet--sticky');
			    KTUtil.addClass(element, 'kt-portlet--sticky');

			    Plugin.updateSticky();

		    } else if ((st*1.5) <= offset && KTUtil.hasClass(body, 'kt-portlet--sticky')) {
			    // back scroll mode
			    Plugin.eventTrigger('stickyOff');

			    KTUtil.removeClass(body, 'kt-portlet--sticky');
			    KTUtil.removeClass(element, 'kt-portlet--sticky');

			    Plugin.resetSticky();
		    }
	    },

        updateSticky: function() {
            if (!the.head) {
                return;
            }

            var top;

            if (KTUtil.hasClass(body, 'kt-portlet--sticky')) {
                if (the.options.sticky.position.top instanceof Function) {
                    top = parseInt(the.options.sticky.position.top.call(this, the));
                } else {
                    top = parseInt(the.options.sticky.position.top);
                }

                var left;
                if (the.options.sticky.position.left instanceof Function) {
                    left = parseInt(the.options.sticky.position.left.call(this, the));
                } else {
                    left = parseInt(the.options.sticky.position.left);
                }

                var right;
                if (the.options.sticky.position.right instanceof Function) {
                    right = parseInt(the.options.sticky.position.right.call(this, the));
                } else {
                    right = parseInt(the.options.sticky.position.right);
                }

                KTUtil.css(the.head, 'z-index', the.options.sticky.zIndex);
                KTUtil.css(the.head, 'top', top + 'px');
                KTUtil.css(the.head, 'left', left + 'px');
                KTUtil.css(the.head, 'right', right + 'px');
            }
        },

        resetSticky: function() {
            if (!the.head) {
                return;
            }

            if (KTUtil.hasClass(body, 'kt-portlet--sticky') === false) {
                KTUtil.css(the.head, 'z-index', '');
                KTUtil.css(the.head, 'top', '');
                KTUtil.css(the.head, 'left', '');
                KTUtil.css(the.head, 'right', '');
            }
        },

        /**
         * Remove portlet
         */
        remove: function() {
            if (Plugin.eventTrigger('beforeRemove') === false) {
                return;
            }

            if (KTUtil.hasClass(body, 'kt-portlet--fullscreen') && KTUtil.hasClass(element, 'kt-portlet--fullscreen')) {
                Plugin.fullscreen('off');
            }

            Plugin.removeTooltips();

            KTUtil.remove(element);

            Plugin.eventTrigger('afterRemove');
        },

        /**
         * Set content
         */
        setContent: function(html) {
            if (html) {
                the.body.innerHTML = html;
            }
        },

        /**
         * Get body
         */
        getBody: function() {
            return the.body;
        },

        /**
         * Get self
         */
        getSelf: function() {
            return element;
        },

        /**
         * Setup tooltips
         */
        setupTooltips: function() {
            if (the.options.tooltips) {
                var collapsed = KTUtil.hasClass(element, 'kt-portlet--collapse') || KTUtil.hasClass(element, 'kt-portlet--collapsed');
                var fullscreenOn = KTUtil.hasClass(body, 'kt-portlet--fullscreen') && KTUtil.hasClass(element, 'kt-portlet--fullscreen');

                //== Remove
                var remove = KTUtil.find(the.head, '[data-ktportlet-tool=remove]');
                if (remove) {
                    var placement = (fullscreenOn ? 'bottom' : 'top');
                    var tip = new Tooltip(remove, {
                        title: the.options.tools.remove,
                        placement: placement,
                        offset: (fullscreenOn ? '0,10px,0,0' : '0,5px'),
                        trigger: 'hover',
                        template: '<div class="tooltip tooltip-portlet tooltip bs-tooltip-' + placement + '" role="tooltip">\
                            <div class="tooltip-arrow arrow"></div>\
                            <div class="tooltip-inner"></div>\
                        </div>'
                    });

                    KTUtil.data(remove).set('tooltip', tip);
                }

                //== Reload
                var reload = KTUtil.find(the.head, '[data-ktportlet-tool=reload]');
                if (reload) {
                    var placement = (fullscreenOn ? 'bottom' : 'top');
                    var tip = new Tooltip(reload, {
                        title: the.options.tools.reload,
                        placement: placement,
                        offset: (fullscreenOn ? '0,10px,0,0' : '0,5px'),
                        trigger: 'hover',
                        template: '<div class="tooltip tooltip-portlet tooltip bs-tooltip-' + placement + '" role="tooltip">\
                            <div class="tooltip-arrow arrow"></div>\
                            <div class="tooltip-inner"></div>\
                        </div>'
                    });

                    KTUtil.data(reload).set('tooltip', tip);
                }

                //== Toggle
                var toggle = KTUtil.find(the.head, '[data-ktportlet-tool=toggle]');
                if (toggle) {
                    var placement = (fullscreenOn ? 'bottom' : 'top');
                    var tip = new Tooltip(toggle, {
                        title: (collapsed ? the.options.tools.toggle.expand : the.options.tools.toggle.collapse),
                        placement: placement,
                        offset: (fullscreenOn ? '0,10px,0,0' : '0,5px'),
                        trigger: 'hover',
                        template: '<div class="tooltip tooltip-portlet tooltip bs-tooltip-' + placement + '" role="tooltip">\
                            <div class="tooltip-arrow arrow"></div>\
                            <div class="tooltip-inner"></div>\
                        </div>'
                    });

                    KTUtil.data(toggle).set('tooltip', tip);
                }

                //== Fullscreen
                var fullscreen = KTUtil.find(the.head, '[data-ktportlet-tool=fullscreen]');
                if (fullscreen) {
                    var placement = (fullscreenOn ? 'bottom' : 'top');
                    var tip = new Tooltip(fullscreen, {
                        title: (fullscreenOn ? the.options.tools.fullscreen.off : the.options.tools.fullscreen.on),
                        placement: placement,
                        offset: (fullscreenOn ? '0,10px,0,0' : '0,5px'),
                        trigger: 'hover',
                        template: '<div class="tooltip tooltip-portlet tooltip bs-tooltip-' + placement + '" role="tooltip">\
                            <div class="tooltip-arrow arrow"></div>\
                            <div class="tooltip-inner"></div>\
                        </div>'
                    });

                    KTUtil.data(fullscreen).set('tooltip', tip);
                }
            }
        },

        /**
         * Setup tooltips
         */
        removeTooltips: function() {
            if (the.options.tooltips) {
                //== Remove
                var remove = KTUtil.find(the.head, '[data-ktportlet-tool=remove]');
                if (remove && KTUtil.data(remove).has('tooltip')) {
                    KTUtil.data(remove).get('tooltip').dispose();
                }

                //== Reload
                var reload = KTUtil.find(the.head, '[data-ktportlet-tool=reload]');
                if (reload && KTUtil.data(reload).has('tooltip')) {
                    KTUtil.data(reload).get('tooltip').dispose();
                }

                //== Toggle
                var toggle = KTUtil.find(the.head, '[data-ktportlet-tool=toggle]');
                if (toggle && KTUtil.data(toggle).has('tooltip')) {
                    KTUtil.data(toggle).get('tooltip').dispose();
                }

                //== Fullscreen
                var fullscreen = KTUtil.find(the.head, '[data-ktportlet-tool=fullscreen]');
                if (fullscreen && KTUtil.data(fullscreen).has('tooltip')) {
                    KTUtil.data(fullscreen).get('tooltip').dispose();
                }
            }
        },

        /**
         * Reload
         */
        reload: function() {
            Plugin.eventTrigger('reload');
        },

        /**
         * Toggle
         */
        toggle: function() {
            if (KTUtil.hasClass(element, 'kt-portlet--collapse') || KTUtil.hasClass(element, 'kt-portlet--collapsed')) {
                Plugin.expand();
            } else {
                Plugin.collapse();
            }
        },

        /**
         * Collapse
         */
        collapse: function() {
            if (Plugin.eventTrigger('beforeCollapse') === false) {
                return;
            }

            KTUtil.slideUp(the.body, the.options.bodyToggleSpeed, function() {
                Plugin.eventTrigger('afterCollapse');
            });

            KTUtil.addClass(element, 'kt-portlet--collapse');

            var toggle = KTUtil.find(the.head, '[data-ktportlet-tool=toggle]');
            if (toggle && KTUtil.data(toggle).has('tooltip')) {
                KTUtil.data(toggle).get('tooltip').updateTitleContent(the.options.tools.toggle.expand);
            }
        },

        /**
         * Expand
         */
        expand: function() {
            if (Plugin.eventTrigger('beforeExpand') === false) {
                return;
            }

            KTUtil.slideDown(the.body, the.options.bodyToggleSpeed, function() {
                Plugin.eventTrigger('afterExpand');
            });

            KTUtil.removeClass(element, 'kt-portlet--collapse');
            KTUtil.removeClass(element, 'kt-portlet--collapsed');

            var toggle = KTUtil.find(the.head, '[data-ktportlet-tool=toggle]');
            if (toggle && KTUtil.data(toggle).has('tooltip')) {
                KTUtil.data(toggle).get('tooltip').updateTitleContent(the.options.tools.toggle.collapse);
            }
        },

        /**
         * fullscreen
         */
        fullscreen: function(mode) {
            var d = {};
            var speed = 300;

            if (mode === 'off' || (KTUtil.hasClass(body, 'kt-portlet--fullscreen') && KTUtil.hasClass(element, 'kt-portlet--fullscreen'))) {
                Plugin.eventTrigger('beforeFullscreenOff');

                KTUtil.removeClass(body, 'kt-portlet--fullscreen');
                KTUtil.removeClass(element, 'kt-portlet--fullscreen');

                Plugin.removeTooltips();
                Plugin.setupTooltips();

                if (the.foot) {
                    KTUtil.css(the.body, 'margin-bottom', '');
                    KTUtil.css(the.foot, 'margin-top', '');
                }

                Plugin.eventTrigger('afterFullscreenOff');
            } else {
                Plugin.eventTrigger('beforeFullscreenOn');

                KTUtil.addClass(element, 'kt-portlet--fullscreen');
                KTUtil.addClass(body, 'kt-portlet--fullscreen');

                Plugin.removeTooltips();
                Plugin.setupTooltips();


                if (the.foot) {
                    var height1 = parseInt(KTUtil.css(the.foot, 'height'));
                    var height2 = parseInt(KTUtil.css(the.foot, 'height')) + parseInt(KTUtil.css(the.head, 'height'));
                    KTUtil.css(the.body, 'margin-bottom', height1 + 'px');
                    KTUtil.css(the.foot, 'margin-top', '-' + height2 + 'px');
                }

                Plugin.eventTrigger('afterFullscreenOn');
            }
        },

        /**
         * Trigger events
         */
        eventTrigger: function(name) {
            //KTUtil.triggerCustomEvent(name);
            for (var i = 0; i < the.events.length; i++) {
                var event = the.events[i];
                if (event.name == name) {
                    if (event.one == true) {
                        if (event.fired == false) {
                            the.events[i].fired = true;
                            return event.handler.call(this, the);
                        }
                    } else {
                        return event.handler.call(this, the);
                    }
                }
            }
        },

        addEvent: function(name, handler, one) {
            the.events.push({
                name: name,
                handler: handler,
                one: one,
                fired: false
            });

            return the;
        }
    };

    //////////////////////////
    // ** Public Methods ** //
    //////////////////////////

    /**
     * Set default options
     */

    the.setDefaults = function(options) {
        defaultOptions = options;
    };

    /**
     * Remove portlet
     * @returns {KTPortlet}
     */
    the.remove = function() {
        return Plugin.remove(html);
    };

    /**
     * Remove portlet
     * @returns {KTPortlet}
     */
    the.initSticky = function() {
        return Plugin.initSticky();
    };

    /**
     * Remove portlet
     * @returns {KTPortlet}
     */
    the.updateSticky = function() {
        return Plugin.updateSticky();
    };

    /**
     * Remove portlet
     * @returns {KTPortlet}
     */
    the.resetSticky = function() {
        return Plugin.resetSticky();
    };

	/**
	 * Destroy sticky portlet
	 */
	the.destroySticky = function() {
		Plugin.resetSticky();
		window.removeEventListener('scroll', Plugin.onScrollSticky);
	};

    /**
     * Reload portlet
     * @returns {KTPortlet}
     */
    the.reload = function() {
        return Plugin.reload();
    };

    /**
     * Set portlet content
     * @returns {KTPortlet}
     */
    the.setContent = function(html) {
        return Plugin.setContent(html);
    };

    /**
     * Toggle portlet
     * @returns {KTPortlet}
     */
    the.toggle = function() {
        return Plugin.toggle();
    };

    /**
     * Collapse portlet
     * @returns {KTPortlet}
     */
    the.collapse = function() {
        return Plugin.collapse();
    };

    /**
     * Expand portlet
     * @returns {KTPortlet}
     */
    the.expand = function() {
        return Plugin.expand();
    };

    /**
     * Fullscreen portlet
     * @returns {MPortlet}
     */
    the.fullscreen = function() {
        return Plugin.fullscreen('on');
    };

    /**
     * Fullscreen portlet
     * @returns {MPortlet}
     */
    the.unFullscreen = function() {
        return Plugin.fullscreen('off');
    };

    /**
     * Get portletbody
     * @returns {jQuery}
     */
    the.getBody = function() {
        return Plugin.getBody();
    };

    /**
     * Get portletbody
     * @returns {jQuery}
     */
    the.getSelf = function() {
        return Plugin.getSelf();
    };

    /**
     * Attach event
     */
    the.on = function(name, handler) {
        return Plugin.addEvent(name, handler);
    };

    /**
     * Attach event that will be fired once
     */
    the.one = function(name, handler) {
        return Plugin.addEvent(name, handler, true);
    };

    // Construct plugin
    Plugin.construct.apply(the, [options]);

    return the;
};

// webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = KTPortlet;
}
