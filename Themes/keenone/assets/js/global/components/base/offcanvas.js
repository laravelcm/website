"use strict";
var KTOffcanvas = function(elementId, options) {
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
    var defaultOptions = {};

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        construct: function(options) {
            if (KTUtil.data(element).has('offcanvas')) {
                the = KTUtil.data(element).get('offcanvas');
            } else {
                // reset offcanvas
                Plugin.init(options);
                
                // build offcanvas
                Plugin.build();

                KTUtil.data(element).set('offcanvas', the);
            }

            return the;
        },

        init: function(options) {
            the.events = [];

            // merge default and user defined options
            the.options = KTUtil.deepExtend({}, defaultOptions, options);
            the.overlay;

            the.classBase = the.options.baseClass;
            the.classShown = the.classBase + '--on';
            the.classOverlay = the.classBase + '-overlay';

            the.state = KTUtil.hasClass(element, the.classShown) ? 'shown' : 'hidden';
        },

        build: function() {
            // offcanvas toggle
            if (the.options.toggleBy) {
                if (typeof the.options.toggleBy === 'string') { 
                    KTUtil.addEvent( the.options.toggleBy, 'click', function(e) {
                        e.preventDefault();
                        Plugin.toggle();
                    }); 
                } else if (the.options.toggleBy && the.options.toggleBy[0]) {
                    if (the.options.toggleBy[0].target) {
                        for (var i in the.options.toggleBy) { 
                            KTUtil.addEvent( the.options.toggleBy[i].target, 'click', function(e) {
                                e.preventDefault();
                                Plugin.toggle();
                            }); 
                        }
                    } else {
                        for (var i in the.options.toggleBy) { 
                            KTUtil.addEvent( the.options.toggleBy[i], 'click', function(e) {
                                e.preventDefault();
                                Plugin.toggle();
                            }); 
                        }
                    }
                    
                } else if (the.options.toggleBy && the.options.toggleBy.target) {
                    KTUtil.addEvent( the.options.toggleBy.target, 'click', function(e) {
                        e.preventDefault();
                        Plugin.toggle();
                    }); 
                } 
            }

            // offcanvas close
            var closeBy = KTUtil.get(the.options.closeBy);
            if (closeBy) {
                KTUtil.addEvent(closeBy, 'click', function(e) {
                    e.preventDefault();
                    Plugin.hide();
                });
            }

            // Window resize
            KTUtil.addResizeHandler(function() {
                if (parseInt(KTUtil.css(element, 'left')) >= 0 || parseInt(KTUtil.css(element, 'right') >= 0) || KTUtil.css(element, 'position') != 'fixed') {
                    KTUtil.css(element, 'opacity', '1');
                }
            });
        },

        isShown: function(target) {
            return (the.state == 'shown' ? true : false);
        },

        toggle: function() {;
            Plugin.eventTrigger('toggle'); 

            if (the.state == 'shown') {
                Plugin.hide(this);
            } else {
                Plugin.show(this);
            }
        },

        show: function(target) {
            if (the.state == 'shown') {
                return;
            }

            Plugin.eventTrigger('beforeShow');

            Plugin.togglerClass(target, 'show');

            // Offcanvas panel
            KTUtil.addClass(body, the.classShown);
            KTUtil.addClass(element, the.classShown);
            KTUtil.css(element, 'opacity', '1');

            the.state = 'shown';

            if (the.options.overlay) {
                the.overlay = KTUtil.insertAfter(document.createElement('DIV') , element );
                KTUtil.addClass(the.overlay, the.classOverlay);
                KTUtil.addEvent(the.overlay, 'click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    Plugin.hide(target);       
                });
            }

            Plugin.eventTrigger('afterShow');
        },

        hide: function(target) {
            if (the.state == 'hidden') {
                return;
            }

            Plugin.eventTrigger('beforeHide');

            Plugin.togglerClass(target, 'hide');

            KTUtil.removeClass(body, the.classShown);
            KTUtil.removeClass(element, the.classShown);

            the.state = 'hidden';

            if (the.options.overlay && the.overlay) {
                KTUtil.remove(the.overlay);
            }

            KTUtil.transitionEnd(element, function() {
                KTUtil.css(element, 'opacity', '0');
            });

            Plugin.eventTrigger('afterHide');
        },

        togglerClass: function(target, mode) {
            // Toggler
            var id = KTUtil.attr(target, 'id');
            var toggleBy;

            if (the.options.toggleBy && the.options.toggleBy[0] && the.options.toggleBy[0].target) {
                for (var i in the.options.toggleBy) {
                    if (the.options.toggleBy[i].target === id) {
                        toggleBy = the.options.toggleBy[i];
                    }        
                }
            } else if (the.options.toggleBy && the.options.toggleBy.target) {
                toggleBy = the.options.toggleBy;
            }

            if (toggleBy) {                
                var el = KTUtil.get(toggleBy.target);
                
                if (mode === 'show') {
                    KTUtil.addClass(el, toggleBy.state);
                }

                if (mode === 'hide') {
                    KTUtil.removeClass(el, toggleBy.state);
                }
            }
        },

        eventTrigger: function(name, args) {
            for (var i = 0; i < the.events.length; i++) {
                var event = the.events[i];
                if (event.name == name) {
                    if (event.one == true) {
                        if (event.fired == false) {
                            the.events[i].fired = true;
                            return event.handler.call(this, the, args);
                        }
                    } else {
                        return event.handler.call(this, the, args);
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
        }
    };

    //////////////////////////
    // ** Public Methods ** //
    //////////////////////////
    the.setDefaults = function(options) {
        defaultOptions = options;
    };

    the.isShown = function() {
        return Plugin.isShown();
    };

    the.hide = function() {
        return Plugin.hide();
    };

    the.show = function() {
        return Plugin.show();
    };

    the.on = function(name, handler) {
        return Plugin.addEvent(name, handler);
    };

    the.one = function(name, handler) {
        return Plugin.addEvent(name, handler, true);
    };

    ///////////////////////////////
    // ** Plugin Construction ** //
    ///////////////////////////////

    // Run plugin
    Plugin.construct.apply(the, [options]);

    // Init done
    init = true;

    // Return plugin instance
    return the;
};

// webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = KTOffcanvas;
}