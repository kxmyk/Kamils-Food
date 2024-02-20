<script>
    /** Loard product modal**/
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route("load-product-modal", ":productId") }}'.replace(':productId', productId),
            beforeSend: function () {
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');

            },
            success: function (response) {
                $('.load_product_modal_body').html(response);
                $('#cartModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
            complete: function () {
                $('.overlay').removeClass('active');
                $('.overlay-container').addClass('d-none');

            }
        });
    }

    /** Update sidebar cart **/
    function updateSidebarCart(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('get-cart-products') }}',
            beforeSend: function () {

            },
            success: function (response) {
                $('.cart_contents').html(response);
                $('.cart_total').html($('#cart_total').val());
                $('.cart_count').html($('#cart_product_count').val());
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
            complete: function () {

            }
        });
    }

    /** Remove cart product **/
    function removeProductFromSidebar($rowId) 
    {
        $.ajax({
            method: 'GET',
            url: '{{ route("cart-product-remove", ":rowId") }}'.replace(":rowId", $rowId),
            success: function($response) {

            },
            error(xhr, status, error) {
                console.error(error)
            }
        })
    }
</script>