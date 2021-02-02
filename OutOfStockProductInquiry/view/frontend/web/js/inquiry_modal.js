require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function ($, modal) {
        $(document).ready(function () {
            if ($('.inquiry-form-modal').length > 0) {
                var PopupOptions = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: true,
                    title: '',
                    buttons: []
                };

                modal(PopupOptions, $('.inquiry-form-modal'));

                $(".inquiry_link_button").click(function () {
                    $('.response_message').hide();
                    $(".product_sku").val($(this).attr("data-product-inquiry-sku"));
                    $(".inquiry-form-modal").modal("openModal");
                });
            }
        });

    }
);