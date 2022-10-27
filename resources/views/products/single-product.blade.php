
<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <div class="img-res-p">
                <div class="img-res-c">
                    <a href="{{ route('shop.show', $row->slug) }}">
                        <img data-src="{{url(productImage('uploads/products/'.$row->image))}}"
                             loading="auto" class="lazyload" alt="{{$row->name}}" width="300" height="338" />
                        @if ($row->productAltImages)
                            @foreach($row->productAltImages->take(1) as $images)
                                <img data-src="{{url(productImage('uploads/products/'.$images->image))}}"
                                     loading="auto" class="lazyload" alt="{{$row->name}}" width="300" height="338" />
                            @endforeach
                        @endif
                    </a>
                </div>
            </div>
            <div class="product-action-vertical">
                <a href="javascript:void(0)" class="btn-product-icon w-icon-cart add-to-cart"
                   title="Add to cart" data-id="{{$row->id}}"></a>
                <a href="javascript:void(0)" class="btn-product-icon add-wishlist-btn w-icon-heart"
                   title="Add to wishlist" data-id="{{$row->id}}"></a>
{{--                <a href="javascript:void(0)" class="btn-product-icon w-icon-search"--}}
{{--                   title="Quickview" data-toggle="modal" data-target="#quickview-{{$row->id}}"></a>--}}
                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                   title="Add to Compare"></a>
            </div>
            <div class="product-label-group">
                @if ($row->spacial_price)
                    <label class="product-label label-discount">{{ sprintf('%d', (($row->price - $row->spacial_price) / $row->price) * 100) }}% Off</label>
                @endif
            </div>
        </figure>
        <div class="product-details">
            <h4 class="product-name"><a href="{{ route('shop.show', $row->slug) }}">{{$row->name}}</a></h4>
            @include('partials.rating-icon', ['reviews' => $row->reviews])
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

