<script>
    {{--  Load product modal  --}}
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route("load-product-modal", ":productId") }}'.replace(':productId', productId),
            beforeSend: function () {
                $('.overlay').toggleClass('active');
            },
            success: function (response) {
                $('.load_product_modal_body').html(response);
                $('#cartModal').modal('show');
                $('.overlay').toggleClass('active');
            }
            ,
            error: function (xhr, status, error) {
                $('.overlay').toggleClass('active');
                console.error(error);
            }
        });

    }
</script>
