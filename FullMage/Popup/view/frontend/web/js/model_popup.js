define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($, modal) {
    'use strict';

    return function (config) {

        if(config.isEnabled == 1) {
            var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                title: '',
                modalClass: 'fullmage-popup',
                buttons: [{
                    text: $.mage.__('Close'),
                    class: 'cancel',
                    click: function () {
                        this.closeModal();
                    }
                },
                {
                    text: $.mage.__('Okay'),
                    class: 'submit',
                    click: function () {
                        this.closeModal();   
                    }

                }],

                opened: function($Event) {
                    if (config.isFooterEnabled == 0) {
                        $(".modal-footer").hide();
                    }
                    // $(".modal-footer").hide();
                },
                closed: function () {
                    setCookie('fullmage_custom_popup',1,365);
                }
            };


            

            function setCookie(name,value,days){
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days*24*60*60*1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "")  + expires + "; path=/";
            };

            function getCookie(name){
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            };

            var popup = modal(options, $('#newsletter-model'));
            // if(getCookie('fullmage_custom_popup') == null)
            // {
                $("#newsletter-model").modal("openModal");
            // }
            $(document).keydown(function(event) { 
              if (event.keyCode == 27) { 
                $("#newsletter-model").modal("closeModal");
                setCookie('fullmage_custom_popup',1,365);
              }
            });
        }
    }
});