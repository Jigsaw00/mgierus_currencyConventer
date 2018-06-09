define(['jquery'], function ($) {
    "use strict"

    return {

        /**
         * Get converted RUB to PLN
         *
         * @param from
         * @param to
         */
        convert: function(from,to){
            var url = this.getUrl();
            $.ajax({
                url:url,
                type: "POST",
                data: {
                    from: from.val()
                },
                dataType: "JSON",
                success: function(data){
                    to.val(data.value);
                    $('#conventer-to').show();
                }
            })
        },

        /**
         * Get ajax url
         *
         * @returns {string}
         */
        getUrl: function () {
            return window.location.origin +'/conventer/ajax/index';
        }

    }

});
