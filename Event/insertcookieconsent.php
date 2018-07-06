<?php
/*
 * Goal   : Inject scripts into footer
 * Code   : inject_scripts
 * Trigger: catalog/view/common/footer/after
 * Actions: event/insertcookieconsent/inject_cookieconsent
 * Reference: Original script by iSense https://github.com/iSenseLabs/tutorials/tree/master/cookie-consent-notification-in-opencart
 *
 * SQL: INSERT INTO `oc_event` (`code`, `trigger`, `action`, `status`, `sort_order`) VALUES
        ('inject_scripts', 'catalog/view/common/footer/after', 'event/insertcookieconsent/inject_cookieconsent', 1, 0);
 */

class Controllereventinsertcookieconsent {
  public function inject_cookieconsent($route, &$data = false, &$output = false){
    // after HR tag in default footer
    $hook = '<hr>';
    $js = "
          <!-- Start of Cookie consent script -->
            <style type=\"text/css\">
                    #cookie_consent_notification,
                    #cookie_consent_notification *,
                    #cookie_consent_notification *:before,
                    #cookie_consent_notification *:after {
                        font-family: \"HelveticaNeue-Light\", \"Helvetica Neue Light\", \"Helvetica Neue\", Helvetica, Arial, \"Lucida Grande\", sans-serif;
                        font-weight: 300;
                        font-size: 16px;
                        line-height: 1.6;
                        -webkit-box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        box-sizing: border-box;
                    }

                    #cookie_consent_notification {
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: auto;
                        bottom: auto;
                        margin: 0;
                        padding: 12px 24px;
                        color: white;
                        background: rgba(0,0,0,.9);
                        z-index: 999999;
                        width: 100%;
                        text-align: center;
                        -webkit-transition: all ease-out 0.3s;
                        -moz-transition: all ease-out 0.3s;
                        -ms-transition: all ease-out 0.3s;
                        -o-transition: all ease-out 0.3s;
                        transition: all ease-out 0.3s;
                        -webkit-transform: translate3d(0,-100%,0);
                        -moz-transform: translate3d(0,-100%,0);
                        -ms-transform: translate3d(0,-100%,0);
                        -o-transform: translate3d(0,-100%,0);
                        transform: translate3d(0,-100%,0);
                        -webkit-backface-visibility: hidden; /* Chrome, Safari, Opera */
                        backface-visibility: hidden;
                    }

                    #cookie_consent_notification.active {
                        -webkit-transform: translate3d(0,0,0);
                        -moz-transform: translate3d(0,0,0);
                        -ms-transform: translate3d(0,0,0);
                        -o-transform: translate3d(0,0,0);
                        transform: translate3d(0,0,0);
                    }

                    #cookie_consent_notification .disable_cookie_consent_notification {
                        display: inline-block;
                        text-decoration: none;
                        text-align: center;
                        font-weight: bold;
                        margin: 0 10px;
                        padding: 0 6px;
                        color: #32C0F4;
                    }
                </style>
                <script type=\"text/javascript\">
                (function($) {
                    (function(g,f){\"use strict\";var h=function(e){if(\"object\"!==typeof e.document)throw Error(\"Cookies.js requires a `window` with a `document` object\");var b=function(a,d,c){return 1===arguments.length?b.get(a):b.set(a,d,c)};b._document=e.document;b._cacheKeyPrefix=\"cookey.\";b._maxExpireDate=new Date(\"Fri, 31 Dec 9999 23:59:59 UTC\");b.defaults={path:\"/\",secure:!1};b.get=function(a){b._cachedDocumentCookie!==b._document.cookie&&b._renewCache();return b._cache[b._cacheKeyPrefix+a]};b.set=function(a,d,c){c=b._getExtendedOptions(c); c.expires=b._getExpiresDate(d===f?-1:c.expires);b._document.cookie=b._generateCookieString(a,d,c);return b};b.expire=function(a,d){return b.set(a,f,d)};b._getExtendedOptions=function(a){return{path:a&&a.path||b.defaults.path,domain:a&&a.domain||b.defaults.domain,expires:a&&a.expires||b.defaults.expires,secure:a&&a.secure!==f?a.secure:b.defaults.secure}};b._isValidDate=function(a){return\"[object Date]\"===Object.prototype.toString.call(a)&&!isNaN(a.getTime())};b._getExpiresDate=function(a,d){d=d||new Date; \"number\"===typeof a?a=Infinity===a?b._maxExpireDate:new Date(d.getTime()+1E3*a):\"string\"===typeof a&&(a=new Date(a));if(a&&!b._isValidDate(a))throw Error(\"`expires` parameter cannot be converted to a valid Date instance\");return a};b._generateCookieString=function(a,b,c){a=a.replace(/[^#$&+\^`|]/g,encodeURIComponent);a=a.replace(/\(/g,\"%28\").replace(/\)/g,\"%29\");b=(b+\"\").replace(/[^!#$&-+\--:<-\[\]-~]/g,encodeURIComponent);c=c||{};a=a+\"=\"+b+(c.path?\";path=\"+c.path:\"\");a+=c.domain?\";domain=\"+c.domain: \"\";a+=c.expires?\";expires=\"+c.expires.toUTCString():\"\";return a+=c.secure?\";secure\":\"\"};b._getCacheFromString=function(a){var d={};a=a?a.split(\"; \"):[];for(var c=0;c<a.length;c++){var e=b._getKeyValuePairFromCookieString(a[c]);d[b._cacheKeyPrefix+e.key]===f&&(d[b._cacheKeyPrefix+e.key]=e.value)}return d};b._getKeyValuePairFromCookieString=function(a){var b=a.indexOf(\"=\"),b=0>b?a.length:b;return{key:decodeURIComponent(a.substr(0,b)),value:decodeURIComponent(a.substr(b+1))}};b._renewCache=function(){b._cache= b._getCacheFromString(b._document.cookie);b._cachedDocumentCookie=b._document.cookie};b._areEnabled=function(){var a=\"1\"===b.set(\"cookies.js\",1).get(\"cookies.js\");b.expire(\"cookies.js\");return a};b.enabled=b._areEnabled();return b},e=\"object\"===typeof g.document?h(g):h;\"function\"===typeof define&&define.amd?define(function(){return e}):\"object\"===typeof exports?(\"object\"===typeof module&&\"object\"===typeof module.exports&&(exports=module.exports=e),exports.Cookies=e):g.Cookies=e})(\"undefined\"===typeof window? this:window);

                    $(document).ready(function($) {
                        var show_notification = true;

                        var html = '<div id=\"cookie_consent_notification\">';
            								html += 'We gebruiken cookies om er zeker van te zijn dat je onze website zo goed mogelijk beleeft. Als je deze website blijft gebruiken gaan we ervan uit dat je dat goed vindt.';
            								html += '<a href=\"javascript:void(0);\" class=\"disable_cookie_consent_notification\">';
            								html += ' Ik ga akkoord';
            							html += '</a></div>';

                        if (typeof Cookies == \"undefined\" || typeof Cookies != \"function\") {
                            show_notification = false;
                        } else if (typeof Cookies.get('disable_cookie_consent_notification') != \"undefined\" && Cookies.get('disable_cookie_consent_notification') == 'true') {
                            show_notification = false;
                        }

                        if (show_notification) {
                            $('body').append(html);
                            $('#cookie_consent_notification').addClass('active');

                            $('.disable_cookie_consent_notification').on('click', function(event) {
                                event.preventDefault();
                                $('#cookie_consent_notification').removeClass('active');
                                Cookies.set('disable_cookie_consent_notification', 'true');
                            });
                        }
                    });
                })(jQuery);
                </script>
              <!-- End of Cookie consent script -->
          <hr>";
    $output = str_replace($hook, $js, $output);
    return $output;
  }
}
