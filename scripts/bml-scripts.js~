(function() {

    // Localize jQuery variable
    var jQuery;
    //console.log('pirate: welcome to pirate diagnostic');

    /******** Load jQuery if not present *********/
    if (window.jQuery === undefined) {
        var script_tag = document.createElement("script");
        script_tag.setAttribute("type", "text/javascript");
        script_tag.setAttribute("src", "//code.jquery.com/jquery-latest.min.js");
        if (script_tag.readyState) {
            script_tag.onreadystatechange = function() { // For old versions of IE
                if (this.readyState === "complete" || this.readyState === "loaded") {
                    scriptLoadHandler();
                }
            };
        } else {
            script_tag.onload = scriptLoadHandler;
        }
        // Try to find the head, otherwise default to the documentElement
        (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
    } else {
        // The jQuery version on the window is the one we want to use
        jQuery = window.jQuery;
        main();
    }

    /******** Called once jQuery has loaded ******/
    function scriptLoadHandler() {
        // Restore $ and window.jQuery to their previous values and store the
        // new jQuery in our local jQuery variable
        jQuery = window.jQuery.noConflict(true);
        // Call our main function
        main();
    }
    
    /******** Our main function ********/
    function main() {
       	if (document.readyState === "complete") {
            loadBML(jQuery);
        } else {
            jQuery(document).ready(loadBML);
        }
        
        function loadBML(jQuery) {
            // check if current page is in the payment page: step=payment_method
            var current_page = window.location.href;
            var scripts = document.getElementsByTagName('script');
            for (var i = 0; i < scripts.length; i++) {
                if (scripts[i].src.indexOf('bml-scripts.js?shop') > 0) {
                    var parameters = scripts[i].src.split('?');
                    parameters = parameters[1].split('=');
                    parameters = parameters[1].split('&');
                    var shop = parameters[0];
                }
            }
            
            if (current_page.indexOf('step=payment_method') !== -1) {
                /*CONFIG ENTRY POINT, change the value for the instance. */
                var jsonp_url = "https://bml-app.herokuapp.com/requests/enable-cod-payment.php";
                jsonp_url += "?shop=" + shop + "&current_page=" + current_page;

                // set caching for requests to false
                jQuery.ajaxSetup({ cache: false });

                // Load HTML
                jQuery.getJSON(jsonp_url, function(data) {
                    if (data.enable_cod === false) {
                        jQuery("div.radio-wrapper[data-select-gateway='57934598']").hide();
                    }
                });
            }
            
            jQuery('#submit-bml-form').click(function(e) {
                if (jQuery('#bml-integration').attr('action') === "") {
                    e.preventDefault();
                    
                    /*CONFIG ENTRY POINT, change the value for the instance. */
                    var jsonp_url = "https://bml-app.herokuapp.com/requests/get-formatted-data.php";

                    // set caching for requests to false
                    jQuery.ajaxSetup({ cache: false });

                    // Load HTML
                    jQuery.getJSON(jsonp_url, jQuery('#bml-integration').serialize(), function(data) {
                        if (data) {
                            jQuery('#bml-form-container').empty().html(data.form);
                            jQuery('#bml-integration').submit();
                        }
                    });
                }
            });
        }//end of ready
    }

})(); // We call our anonymous function immediately