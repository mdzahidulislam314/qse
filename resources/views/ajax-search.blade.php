<div class="card">
    <div class="card-body">
        @forelse($searchResult as $item)
            <div class="sr-wrapper">
                    <div class="search-result-inner">
                        <div class="sr-pro-img">
                            <div class="img-res-p">
                                <div class="img-res-c">
                                    <a href="{{ route('shop.show', $item->slug) }}">
                                    <img src="{{ asset(productImage('uploads/products/'.$item->image)) }}" alt="image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="sr-content">
                            <div class="sr-pro-title single-text-dot">
                                <a href="{{ route('shop.show', $item->slug) }}"><span>{{$item->name}}</span></a>
                            </div>
                            <div class="sr-price">
                                <div class="product-price">
                                    @if ($item->spacial_price == null)
                                        {{ presentPrice($item->price) }}
                                    @elseif(isset($item->spacial_price))
                                        <span class="">{{ presentPrice($item->spacial_price) }}</span>
                                        <span class="text-light ml-2"><s>{{ presentPrice($item->price) }}</s></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @empty
            <div class="search-result-inner">
                <div>
                    <span>No Result Found!</span>
                </div>
            </div>
        @endforelse
    </div>
</div>