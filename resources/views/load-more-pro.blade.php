@php
use Illuminate\Support\Str;
@endphp
@if (!$data->isEmpty())
    @foreach ($data as $randomProduct)
        <div class="col-6 col-md-4 col-xl-2 pr-3 pl-3 pb-3">
            <div class="product new-product text-center">
                <figure class="product-media">
                    @if ($randomProduct->quantity == 0)
                        <span class="product-label label-out">Out of Stock</span>
                    @endif
                    @if ($randomProduct->spacial_price !== null)
                        <span
                            class="product-label label-sale">-{{ sprintf('%d', (($randomProduct->price - $randomProduct->spacial_price) / $randomProduct->price) * 100) }}%</span>
                    @endif
                    @if ($randomProduct->new_arrival == 1)
                        <span class="product-label label-new">NEW</span>
                    @endif

                    <div class="img-res-p">
                        <div class="img-res-c">
                            <a href="{{ route('shop.show', $randomProduct->slug) }}">
                                <img src="{{ asset('uploads/products/' . productImage($randomProduct->image)) }}"
                                    id="lazy" alt="Product image" class="product-image" />
                            </a>
                        </div>
                    </div>

                    <div class="product-action-vertical">
                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable"
                            onclick="document.getElementById('wishlistForm-{{ $randomProduct->id }}').submit()">

                        </a>
                        <form action="{{ route('add.wishlist', $randomProduct) }}" method="POST"
                            id="wishlistForm-{{ $randomProduct->id }}">
                            @csrf
                        </form>
                    </div>

                    <form action="{{ route('cart.store', $randomProduct) }}" method="POST" id="CartForm">
                        {{ csrf_field() }}
                        <div class="product-action">
                            @if ($randomProduct->sizes === null || ($randomProduct->sizes === null && $randomProduct->quantity > 0))
                                <button type="submit" class="btn-product btn-cart "><span>Add to cart</span></button>
                            @endif
                            @if (isset($randomProduct->sizes) || isset($randomProduct->colors))
                                <a href="{{ route('shop.show', $randomProduct->slug) }}" class="btn-product btn-cart"
                                    style="font-size: 14px">View Details</a>
                            @endif
                        </div>
                    </form>
                </figure>
                <div class="product-body">
                    <form action="{{ route('cart.store', $randomProduct) }}" method="POST" id="CartForm">
                        {{ csrf_field() }}
                        @if ($randomProduct->sizes === null && $randomProduct->quantity > 0)
                            <button type="submit" class="btn-product custom-cart-btn"><span>Add to cart</span></button>
                        @endif
                        @if (isset($randomProduct->sizes) || isset($randomProduct->colors))
                            <a href="{{ route('shop.show', $randomProduct->slug) }}"
                                class="btn-product custom-cart-btn" style="padding-top: 9px">
                                <span>ViewDetails</span>
                            </a>
                        @endif
                    </form>

                    @php
                        $catName = \App\Category::where('id', $randomProduct->category_id)->first();
                    @endphp
                    <div class="product-cat single-text-dot">
                        @if ($catName)
                            <a href="#">{{ $catName->name }}</a>
                        @endif
                    </div>
                    <!-- End .products-cat -->
                    <h3 class="product-title single-text-dot"><a
                            href="{{ route('shop.show', $randomProduct->slug) }}">{{ Str::limit($randomProduct->name, 32) }}</a>
                    </h3>
                    <!-- End .products-title -->
                    <div class="product-price single-text-dot">
                        @if ($randomProduct->spacial_price == null)
                            {{ presentPrice($randomProduct->price) }}
                        @elseif(isset($randomProduct->spacial_price))
                            <span class="">{{ presentPrice($randomProduct->spacial_price) }}</span>
                            <span class="text-light ml-2"><s>{{ presentPrice($randomProduct->price) }}</s></span>
                        @endif
                    </div>

                </div>

            </div>
        </div>
        @php
            $lastId = $randomProduct->id;
        @endphp

    @endforeach

    <div class="col-lg-12" id="loadmoreRemove">
        <div class="more-container text-center mt-2">
            <button id="loadMoreBtn" data-id="{{ $lastId }}" class="btn btn-outline-dark-3 btn-more">
                <span>Load more</span><i class="icon-long-arrow-right"></i>
            </button>
        </div>
    </div>
@else
    <div class="col-lg-12 text-center">
        <h6>No Product Found!</h6>
    </div>
@endif
