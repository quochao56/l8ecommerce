<main id="main" class="main-site left-sidebar">
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
        .product-wish {
            position: absolute;
            top: 10%;
            left: 0;
            z-index: 99;
            right: 30px;
            text-align: right;
            padding-top: 0;
        }

        .product-wish .fa {
            color: #cbcbcb;
            font-size: 32px;
        }

        .product-wish .fa:hover {
            color: #ff7007;
        }

        .fill-heart {
            color: #ff7007 !important;
        }
    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
    <div class="row">
        @if (Cart::instance('wishlist')->content()->count() > 0)
        
        <ul class="product-list grid-products equal-container">
            @foreach (Cart::instance('wishlist')->content() as $item)
                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            {{-- /product/details/ tiếp tục là slug và giá trị slug được gán 
                            từ $item->model->slug(lấy slug của product được click vào) và nó đưa vào slug
                            sau đó slug đó sẽ được truy vấn xử lý bên DetailsComponent --}}
                            <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                title="{{ $item->model->name }}">
                                <figure><img
                                        src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                        alt="{{ $item->model->name }}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                class="product-name"><span>{{ $item->model->name }}</span></a>
                            <div class="wrap-price"><span
                                    class="product-price">{{ $item->model->regular_price }}</span></div>
                            {{-- đưa dữ liệu vào func store trong ShopComponent bằng wire:click.prevent="store() --}}
                            <a href="#" class="btn add-to-cart"
                                wire:click.prevent="store({{ $item->model->id }}, '{{ $item->model->name }}', {{ $item->model->regular_price }})">Add
                                To Cart</a>
                            

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        @else
            <h4>No item in wishlist</h4>
        @endif
    </div>
</div>

</main>