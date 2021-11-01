define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($, modal) {
    'use strict';

    return function (config) {
        if (config.isEnabled == 1) {
            var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                title: '',
                modalClass: 'fullmage-popup',
                buttons: [{
                    text: $.mage.__('' + config.buttonText),
                    class: 'fullmage-popup-btn-action',
                    click: function () {
                        this.closeModal();
                    }
                }],
                opened: function ($Event) {
                    if (config.isFooterEnabled == 1 && config.setcontent != "newsletter_sign_up") {
                        $(".modal-footer").show();
                    } else {
                        $(".modal-footer").hide();
                    }
                    var popupShowTime = config.popupShowTime;
                    if (popupShowTime != "") {
                        setTimeout(function () {
                            $("#newsletter-model").modal("closeModal");
                            setLocalStorage();
                        }, 3000);
                    }
                },
                closed: function () {
                    setCookie('fullmage_custom_popup', 1, 1);
                    setLocalStorage();
                }
            };

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            };

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            };

            function setLocalStorage() {
                if (config.popupCookieExp != "") {
                    var date = new Date();
                    date.setDate(date.getDate() + parseInt(config.popupCookieExp));
                    var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000))
                        .toISOString()
                        .split("T")[0];
                    if (localStorage.getItem('expiredate') == null) {
                        localStorage.setItem('expiredate', dateString);
                    }
                }
            };

            var popup = modal(options, $('#newsletter-model')),
                CurrentDate = new Date(),
                 GivenDate = localStorage.getItem('expiredate');
            if (config.popupCookieExp != "") {
                if (GivenDate < CurrentDate) {
                    $("#newsletter-model").modal("openModal");
                }
            }

            if (getCookie('fullmage_custom_popup') == null) {
                $("#newsletter-model").modal("openModal");
            }
            $('#fullmage-newsletter-validate-detail').submit(function () {
                if ($('#fullmage-newsletter-validate-detail').validation('isValid')) {
                    $("#newsletter-model").modal("closeModal");
                    setCookie('fullmage_custom_popup', 1, 1);
                    setLocalStorage();
                }
            });
            $(document).keydown(function (event) {
                if (event.keyCode == 27) {
                    $("#newsletter-model").modal("closeModal");
                    setCookie('fullmage_custom_popup', 1, 1);
                    setLocalStorage();
                }
            });
        }
    }
});
