// plugin setup
var KTAvatar = function(elementId, options) {
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
    };

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Construct
         */

        construct: function(options) {
            if (KTUtil.data(element).has('avatar')) {
                the = KTUtil.data(element).get('avatar');
            } else {
                // reset menu
                Plugin.init(options);

                // build menu
                Plugin.build();

                KTUtil.data(element).set('avatar', the);
            }

            return the;
        },

        /**
         * Init avatar
         */
        init: function(options) {
            the.element = element;
            the.events = [];

            the.input = KTUtil.find(element, 'input[type="file"]');
            the.holder = KTUtil.find(element, '.kt-avatar__holder');
            the.cancel = KTUtil.find(element, '.kt-avatar__cancel');
            the.src = KTUtil.css(the.holder, 'backgroundImage');

            // merge default and user defined options
            the.options = KTUtil.deepExtend({}, defaultOptions, options);
        },

        /**
         * Build Form Wizard
         */
        build: function() {
            // Handle avatar change
            KTUtil.addEvent(the.input, 'change', function(e) {
                e.preventDefault();

	            if (the.input && the.input.files && the.input.files[0]) {
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                    KTUtil.css(the.holder, 'background-image', 'url('+e.target.result +')');
	                }
	                reader.readAsDataURL(the.input.files[0]);

	                KTUtil.addClass(the.element, 'kt-avatar--changed');
	            }
            });

            // Handle avatar cancel
            KTUtil.addEvent(the.cancel, 'click', function(e) {
                e.preventDefault();

	            KTUtil.removeClass(the.element, 'kt-avatar--changed');
	            KTUtil.css(the.holder, 'background-image', the.src);
	            the.input.value = "";
            });
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
    module.exports = KTAvatar;
}
