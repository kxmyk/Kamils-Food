<button type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"><i
        class="fal fa-times"></i></button>
<form action=''
      method='POST'
      id='modal_add_to_cart_form'>
    <input type='hidden'
           name='product_id'
           value='{{$product->id}}'>
    <div class="fp__cart_popup_img">
        <img src="{{ asset($product->thumb_image) }}"
             alt="menu"
             class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href="{{ route('product.show', $product->slug) }}"
           class="title">{{ $product->name }}</a>
        <p class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span>(201)</span>
        </p>
        <h4 class="price">
            @if ($product->offer_price > 0)
                <input type='hidden'
                       name='base_price'
                       value='{{ $product->offer_price }}'>
                {{ currencyPosition($product->offer_price) }}
                <del>{{ currencyPosition($product->price) }}</del>
            @else
                <input type='hidden'
                       name='base_price'
                       value='{{ $product->price }}'>
                {{ currencyPosition($product->price) }}
            @endif
        </h4>

        @if($product->sizes()->exists())

            <div class="details_size">
                <h5>select size</h5>
                @foreach($product->sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               data-price='{{ $size->price }}'
                               name="product_size"
                               value='{{ $size->id }}'
                               id="size-{{$size->id}}">
                        <label class="form-check-label"
                               for="size-{{$size->id}}">
                            {{ $size->name }} <span>+ {{currencyPosition($size->price)}}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif

        @if($product->options()->exists())
            <div class="details_extra_item">
                <h5>select option <span>(optional)</span></h5>
                @foreach($product->options as $option)
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               data-price='{{ $option->price }}'
                               name='product_option[]'
                               value="{{ $option->id }}"
                               id="option-{{ $option->id }}">
                        <label class="form-check-label"
                               for="option-{{ $option->id }}">
                            {{ $option->name }} <span>+ {{ currencyPosition($option->price) }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="details_quentity">
            <h5>select quentity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                    <input type="text"
                           placeholder="1"
                           value='1'
                           id='quantity'
                           name='quantity'
                           readonly>
                    <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                </div>
                @if ($product->offer_price > 0)
                    <h3 id="total_price">{{ currencyPosition($product->offer_price) }}</h3>
                @else
                    <h3 id="total_price">{{ currencyPosition($product->price) }}</h3>
                @endif
            </div>
        </div>
        <ul class="details_button_area d-flex flex-wrap">
            <li>
                <button type='submit'
                        class='common_btn'>add to cart
                </button>
            </li>
        </ul>
    </div>

</form>

<script>
    $(document).ready(function () {
        let quantity = $('#quantity');
        $('input[name="product_size"]').on('change', function () {
            updateTotalPrice();
        });
        $('input[name="product_option[]"]').on('change', function () {
            updateTotalPrice();
        });

        // Event handlers for increment and decrement
        $('.increment').on('click', function (e) {
                e.preventDefault();
                let currentQuantity = parseFloat(quantity.val());
                quantity.val(currentQuantity + 1);
                updateTotalPrice();
            }
        );

        $('.decrement').on('click', function (e) {
                e.preventDefault();
                let currentQuantity = parseFloat(quantity.val());
                if (quantity.val() > 1) {
                    quantity.val(currentQuantity - 1);
                }
                updateTotalPrice();
            }
        );

        // Function to update the total price base on seelected options
        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="base_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionsPrice = 0;
            let quantity = parseFloat($('#quantity').val());

            // Calculate the selected size price
            let selectedSize = $('input[name="product_size"]:checked');
            if (selectedSize.length > 0) {
                selectedSizePrice = parseFloat(selectedSize.data('price'));
            }

            // Calculate selected options price
            let selectedOptions = $('input[name="product_option[]"]:checked');
            $(selectedOptions).each(function () {
                selectedOptionsPrice += parseFloat($(this).data('price'));
            });

            // Calculate the total price
            let totalPrice = (basePrice + selectedSizePrice + selectedOptionsPrice) * quantity;

            $('#total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice);
            return totalPrice;
        }

        $('#modal_add_to_cart_form').on('submit', function (e) {
            e.preventDefault();

            // Validation
            let selectedSize = $('input[name=\'product_size\']');
            if (selectedSize.length > 0) {
                if ($('input[name=\'product_size\']:checked').val() === undefined) {
                    toastr.error('Please select a size');
                    console.error('Please select a size');
                    return;
                }
            }

            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: '{{ route('add-to-cart') }}',
                data: formData,
                success: function (response) {

                },
                error: function (xhr, status, error) {

                },
            });

        });
    });
</script>
