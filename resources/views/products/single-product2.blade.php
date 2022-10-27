<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <div class="img-res-p">
                <div class="img-res-c">
                    <a href="{{ route('shop.show', $row->slug) }}">
                        <img data-src="{{url(productImage('uploads/products/'.$row->image))}}" loading="auto" class="lazyload"
                             alt="{{$row->name}}" width="300" height="338" />
                        @if ($row->productAltImages)
                            @foreach($row->productAltImages->take(1) as $images)
                                <img data-src="{{url(productImage('uploads/products/'.$images->image))}}" loading="auto" class="lazyload"
                                     alt="{{$row->name}}" width="300" height="338" />
                            @endforeach
                        @endif
                    </a>
                </div>
            </div>
            <div class="product-action-horizontal">
                <a href="javascript:void(0)" class="btn-product-icon add-to-cart w-icon-cart"
                   title="Add to cart" data-id="{{$row->id}}"></a>
                <a href="javascript:void(0)" class="btn-product-icon add-wishlist-btn w-icon-heart"
                   title="Wishlist" data-id="{{$row->id}}"></a>
{{--                <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                   title="Compare"></a>--}}
                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                   title="Quick View"></a>
            </div>
        </figure>
        <div class="product-details">
            <div class="product-cat">
                <a href="shop-banner-sidebar.html">{{$row->category->name ?? ''}}</a>
            </div>
            <h3 class="product-name">
                <a href="{{ route('shop.show', $row->slug) }}">{{$row->name}}</a>
            </h3>
            @include('partials.rating-icon', ['reviews' => $row->reviews])
            <div class="product-pa-wrapper">
                <div class="product-price">
                    @if ($row->spacial_price == null)
                        <ins class="new-price">{{ presentPrice($row->price) }}</ins>
                    @elseif(isset($row->spacial_price))
                        <ins class="new-price">{{ presentPrice($row->spacial_price) }}</ins>
                        <del class="old-price">{{ presentPrice($row->price) }}</del>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>