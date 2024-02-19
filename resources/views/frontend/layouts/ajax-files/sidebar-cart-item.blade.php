@foreach( Cart::content() as $item)
    <li>
        <div class="menu_cart_img">
            <img src="{{ $item->options->product_info['image'] }}"
                 alt="menu"
                 class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title"
               href="{{ route('product.show', $item->options->product_info['slug']) }}">{!! $item->name !!}</a>
            <p class="size">Qty: {{ $item->qty }}</p>
            <p class="size">{{ @$item->options->product_size[0]['name'] }}</p>
            @foreach($item->options->product_options as $option)
                <span class="extra">{{ $option['name'] }}</span>
            @endforeach

            <p class="price"> {{ currencyPosition($item->price) }}</p>
        </div>
        <span class="del_icon"><i class="fal fa-times"></i></span>
    </li>
@endforeach
