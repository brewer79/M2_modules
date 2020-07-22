/*browser:true*/
/*global define*/
define([
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'speropay',
                component: 'Speroteck_Speropay/js/view/payment/method-renderer/speropay'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);