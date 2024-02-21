<script>
    /** Load product modal**/
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
            beforeSend: function () {
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');

            },
            success: function(response) {
                if (response.status === 'success') {
                    updateSidebarCart();
                    toastr.success(response.message);
                }
            },
            error(xhr, status, error) {
                console.error(error)
                toastr.error(xhr.responseJSON.message);
            },
            complete: function () {
                $('.overlay').removeClass('active');
                $('.overlay-container').addClass('d-none');

            }
        })
    }
</script>