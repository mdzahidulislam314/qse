@extends('layouts.master')

@section('meta_title'){{ $product->meta_title }}@stop

@section('meta_description'){{ $product->meta_description }}@stop

@section('meta_keywords'){{ $product->meta_keywords }}@stop

@section('meta')
   <!-- Schema.org markup for Google+ -->
   <meta itemprop="name" content="{{ $product->meta_title }}">
   <meta itemprop="description" content="{{ $product->meta_description }}">
   <meta itemprop="image" content="{{ isset($product->meta_img) ? asset('uploads/products/meta-image/'.$product->meta_img) : asset(productImage('uploads/products/'.$product->image)) }}">

   <!-- Twitter Card data -->
   <meta name="twitter:card" content="product">
   <meta name="twitter:site" content="@publisher_handle">
   <meta name="twitter:title" content="{{ $product->meta_title }}">
   <meta name="twitter:description" content="{{ $product->meta_description }}">
   <meta name="twitter:creator" content="@author_handle">
   <meta name="twitter:image" content="{{ isset($product->meta_img) ? asset('uploads/products/meta-image/'.$product->meta_img) : asset(productImage('uploads/products/'.$product->image)) }}">
   <meta name="twitter:data1" content="{{ $product->getPrice() }}">
   <meta name="twitter:label1" content="Price">

   <!-- Open Graph data -->
   <meta property="og:title" content="{{ $product->meta_title }}" />
   <meta property="og:type" content="og:product" />
   <meta property="og:url" content="{{ route('shop.show', $product->slug) }}" />
   <meta property="og:image" content="{{ isset($product->meta_img) ? asset('uploads/products/meta-image/'.$product->meta_img) : asset(productImage('uploads/products/'.$product->image)) }}" />
   <meta property="og:description" content="{{ $product->meta_description }}" />
   <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
   <meta property="og:price:amount" content="{{ $product->getPrice() }}" />
   <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
   <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
   <main class="main mb-10 pb-1">
      <!-- Start of Breadcrumb -->
      <nav class="breadcrumb-nav container">
         <ul class="breadcrumb bb-no">
            <li><a href="demo1.html">Home</a></li>
            <li><a href="product-default.html">Products</a></li>
            <li>Vertical Thumbs</li>
         </ul>
      </nav>
      <!-- End of Breadcrumb -->

      <!-- Start of Page Content -->
      <div class="page-content">
         <div class="container">
            <div class="product product-single row">
               <div class="col-md-6 mb-6">
                  <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                     <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        @if ($product->productAltImages)
                           @foreach ($product->productAltImages as $image)
                              <figure class="product-image">
                                 <div class="img-res-p">
                                    <div class="img-res-c">
                                       <img data-src="{{asset(productImage('uploads/products/'.$image->image))}}"
                                            data-zoom-image="{{asset(productImage('uploads/products/'.$image->image))}}"
                                            alt="{{$product->name}}" width="488" height="549" loading="auto" class="lazyload">
                                    </div>
                                 </div>
                              </figure>
                           @endforeach
                        @else
                           <figure class="product-image">
                              <img data-src="{{asset('uploads/products/'.productImage($product->image))}}"
                                   data-zoom-image="{{asset('uploads/products/'.productImage($product->image))}}"
                                   alt="{{$product->name}}" width="800" height="900" loading="auto" class="lazyload">
                           </figure>
                        @endif
                     </div>
                     @foreach ($product->productAltImages as $image)
                        <a data-src="{{asset(productImage('uploads/products/'.$image->image))}}"
                           data-fancybox="gallery01" rel="gallery01" class="product-gallery-btn product-image-full">
                           <i class="w-icon-zoom"></i>
                        </a>
                     @endforeach
                     <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                           @if ($product->productAltImages)
                              @foreach ($product->productAltImages as $key => $image)
                                 <div class="product-thumb {{$key === 0 ? 'active' : ''}}">
                                    <div class="img-res-p">
                                       <div class="img-res-c">
                                          <img data-src="{{asset(productImage('uploads/products/'.$image->image))}}"
                                               alt="Product Thumb" width="800" height="900" loading="auto" class="lazyload">
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                           @else
                              <div class="product-thumb active">
                                 <div class="">
                                    <div class="">
                                       <img data-src="{{asset(productImage('uploads/products/'.$product->image))}}"
                                            alt="Product Thumb" width="800" height="900" loading="auto" class="lazyload">
                                    </div>
                                 </div>
                              </div>
                           @endif
                        </div>
                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 mb-4 mb-md-6">
                  <div class="product-details">
                     <h1 class="product-title">{{ $product->name }}</h1>
                     <div class="product-bm-wrapper">
                        @if ($product->brand)
                           <figure class="brand">
                              <img src="{{productImage($product->brand->image)}}" alt="Brand"
                                   width="105" height="48" />
                           </figure>
                        @endif
                        <div class="product-meta">
                           <div class="product-categories">
                              Category:
                              @if ($product->category)
                                 <span class="product-category"><a href="#">{{$product->category->name}}</a></span>
                              @endif
                           </div>
                           <div class="product-sku">
                              SKU: <span>{{$product->code}}</span>
                           </div>
                        </div>
                     </div>

                     <hr class="product-divider">

                     <div class="product-price">
                        @if ($product->spacial_price == null)
                           <ins class="new-price ls-50">{{ presentPrice($product->price) }}</ins>
                        @elseif(isset($product->spacial_price))
                           <ins class="new-price ls-50">{{ presentPrice($product->spacial_price) }}<s class="old-price ml-2">{{ presentPrice($product->price) }}</s></ins>
                        @endif
                     </div>

                     @include('partials.rating-icon', ['reviews' => $reviews])

                     <div class="product-short-desc lh-2 w-100" style="width: 100%;overflow: hidden">
                        {!! $product->details !!}
                     </div>

                     <hr class="product-divider">
                     <div class="product-variation-form product-size-swatch mb-5">
                        <div class="d-flex flex-wrap">
                           @if ($sizes)
                              <div class="form-group">
                                 <label for="inputEmail4" class="font-size-14">Size:</label>
                                 <select name="size" class="form-control d-flex align-items-center" id="size">
                                    @foreach($sizes as $row)
                                       <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           @endif

                           @if ($colors)
                              <div class="form-group">
                                 <label for="inputPassword4" class="font-size-14">Color:</label>
                                 <select name="color" class="form-control d-flex align-items-center" id="color">
                                    @foreach($colors as $row)
                                       <option value="{{$row}}">{{$row}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           @endif
                        </div>
                     </div>

                     <div class="product-sticky-content sticky-content">
                        <div class="product-form container">
                           <div class="product-qty-form with-label">
                              <label>Quantity:</label>
                              <div class="input-group">
                                 <input class="form-control" type="number" min="1"
                                        max="10000000" value="1" name="qty" id="qty">
                                 <button type="button" class="quantity-plus btn-plus w-icon-plus"></button>
                                 <button type="button" class="quantity-minus btn-minus w-icon-minus"></button>
                              </div>
                           </div>
                           <button class="btn btn-primary add-to-cart" data-id="{{$product->id}}">
                              <i class="w-icon-cart"></i>
                              <span>Add to Cart</span>
                           </button>
                        </div>
                     </div>

                     <div class="social-links-wrapper">
                        <div class="social-links">
                           <div class="social-icons social-no-color border-thin">
                              <div id="share"></div>
                           </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                           <a href="javascript:void(0)"
                              class="btn-product-icon w-icon-heart add-wishlist-btn" data-id="{{$product->id}}"><span></span></a>
                           <a href="#"
                              class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a href="#product-tab-description" class="nav-link active">Description</a>
                  </li>
                  <li class="nav-item">
                     <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{$reviews->count()}})</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="product-tab-description">
                     <div class="row mb-4">
                        <div class="col-md-12 mb-5">
                           {!! $product->description !!}
                        </div>
                     </div>
                     <div class="row mb-4">
                        <div class="col-md-6 mb-5">
                           <div class="banner banner-video product-video br-xs">
                              <figure class="banner-media">
                              {{--                                       <a href="#">--}}
                              {{--                                          <img src="{{asset(productImage('uploads/products/'.$image))}}" alt="banner" width="610" height="300" style="background-color: #bebebe;">--}}
                              {{--                                       </a>--}}
                                 <a class="btn-play-video" href="{{$product->video_link}}" id="productVideo"></a>
                              </figure>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="product-tab-reviews">
                     <div class="row mb-4">
                        <div class="col-xl-4 col-lg-5 mb-4">
                           <div class="ratings-wrapper">
                              <div class="avg-rating-container">
                                 <h4 class="avg-mark font-weight-bolder ls-50">{{$reviews->avg('rating')}}</h4>
                                 <div class="avg-rating">
                                    <p class="text-dark mb-1">Average Rating</p>
                                    @include('partials.rating-icon', ['reviews' => $reviews])
                                 </div>
                              </div>
                              @php
                                 $total = \App\Review::where('product_id', $product->id)->where('status', 1)->get();
                                 $fivetotal = $total->where('rating', 5.0)->count();
                                 $fourtotal = $total->where('rating', 4.0)->count();
                                 $threetotal = $total->where('rating', 3.0)->count();
                                 $twototal = $total->where('rating', 2.0)->count();
                                 $onetotal = $total->where('rating', 1.0)->count();
                              @endphp
                              @if (count($total))
                                 <div class="ratings-list mt-5">
                                    <div class="ratings-container">
                                       <div class="ratings-full">
                                          <span class="ratings" style="width: 100%;"></span>
                                          <span class="tooltiptext tooltip-top"></span>
                                       </div>
                                       <div class="progress-bar progress-bar-sm ">
                                          <span></span>
                                       </div>
                                       <div class="progress-value">
                                          <mark>{{number_format((($fivetotal/$total->count()) * 100))}}%</mark>
                                       </div>
                                    </div>
                                    <div class="ratings-container">
                                       <div class="ratings-full">
                                          <span class="ratings" style="width: 80%;"></span>
                                          <span class="tooltiptext tooltip-top"></span>
                                       </div>
                                       <div class="progress-bar progress-bar-sm ">
                                          <span></span>
                                       </div>
                                       <div class="progress-value">
                                          <mark>{{number_format((($fourtotal/$total->count()) * 100))}}%</mark>
                                       </div>
                                    </div>
                                    <div class="ratings-container">
                                       <div class="ratings-full">
                                          <span class="ratings" style="width: 60%;"></span>
                                          <span class="tooltiptext tooltip-top"></span>
                                       </div>
                                       <div class="progress-bar progress-bar-sm ">
                                          <span></span>
                                       </div>
                                       <div class="progress-value">
                                          <mark>{{number_format((($threetotal/$total->count()) * 100))}}%</mark>
                                       </div>
                                    </div>
                                    <div class="ratings-container">
                                       <div class="ratings-full">
                                          <span class="ratings" style="width: 40%;"></span>
                                          <span class="tooltiptext tooltip-top"></span>
                                       </div>
                                       <div class="progress-bar progress-bar-sm ">
                                          <span></span>
                                       </div>
                                       <div class="progress-value">
                                          <mark>{{number_format((($twototal/$total->count()) * 100))}}%</mark>
                                       </div>
                                    </div>
                                    <div class="ratings-container">
                                       <div class="ratings-full">
                                          <span class="ratings" style="width: 20%;"></span>
                                          <span class="tooltiptext tooltip-top"></span>
                                       </div>
                                       <div class="progress-bar progress-bar-sm ">
                                          <span></span>
                                       </div>
                                       <div class="progress-value">
                                          <mark>{{number_format((($onetotal/$total->count()) * 100))}}%</mark>
                                       </div>
                                    </div>
                                 </div>
                              @endif

                           </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 mb-4">
                           <div class="review-form-wrapper">
                              @guest('customer')
                                 <h3 class="title tab-pane-title font-weight-bold mb-1">For Add Product Review. You Need to Login First</h3>
                                 <a href="{{ route('login') }}">Login Here</a>
                              @else
                                 @if ($canReview === true)
                                    <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review</h3>
                                    <form action="{{route('customer.review')}}" method="POST" class="review-form">
                                       @csrf
                                       <div class="give-review-wrap">
                                          <div class="rateyo d-inline-block" id="rateYo" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                                          </div>
                                          <span class="result d-inline-block">0</span>
                                          <input type="hidden" name="rating">
                                          <input type="hidden" name="id" value="{{$product->id}}">
                                       </div>
                                       <div class="row gutter-md">
                                          <div class="col-md-12">
                                             <input type="text" class="form-control" placeholder="Your Name" name="title" required>
                                          </div>
                                       </div>
                                       <textarea cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control" name="massage"></textarea>
                                       <button type="submit" class="btn btn-dark">Submit Review</button>
                                    </form>
                                 @endif
                              @endguest
                           </div>
                        </div>
                     </div>
                     <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                        <div class="tab-content">
                           <div class="tab-pane active" id="show-all">
                              <ul class="comments list-style-none">
                                 @foreach($reviews as $review)
                                    <li class="comment">
                                       <div class="comment-body">
                                          <figure class="comment-avatar">
                                             <img src="{{url('demo/avatar-male.png')}}"
                                                  alt="Commenter Avatar" width="80" height="80">
                                          </figure>
                                          <div class="comment-content">
                                             <h4 class="comment-author">
                                                <a href="#">{{$review->customer->name}}</a>
                                                <span class="comment-date">{{$review->created_at->diffForHumans()}}</span>
                                             </h4>
                                             <div class="ratings-container comment-rating">
                                                {{-- <div class="my-ratings" data-rating="{{$review->rating}}"></div>--}}
                                                <div class="ratings-full">
                                                   @if ($review->rating == 0)
                                                      <span class="ratings" style="width: 0%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @elseif($review->rating == 1)
                                                      <span class="ratings" style="width: 20%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @elseif($review->rating == 2)
                                                      <span class="ratings" style="width: 40%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @elseif($review->rating == 3)
                                                      <span class="ratings" style="width: 60%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @elseif($review->rating == 4)
                                                      <span class="ratings" style="width: 80%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @elseif($review->rating == 5)
                                                      <span class="ratings" style="width: 100%;"></span>
                                                      <span class="tooltiptext tooltip-top"></span>
                                                   @endif
                                                </div>
                                             </div>
                                             <strong>{{$review->title}}</strong>
                                             <p>{{$review->massage}}</p>
                                          </div>
                                       </div>
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <section class="related-product-section">
               <div class="title-link-wrapper mb-4">
                  <h4 class="title">Related Products</h4>
                  <a href="{{route('shop.index')}}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                     Products<i class="w-icon-long-arrow-right"></i></a>
               </div>
               <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2"
                    data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'autoplay': true,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 5
                                        }
                                    }
                                }">
                  @foreach($relatedProduct as $row)
                     <div class="product">
                        <figure class="product-media">
                           <div class="img-res-p">
                              <div class="img-res-c">
                                 <img src="{{asset(productImage('uploads/products/'.$row->image))}}"
                                      data-zoom-image="{{asset(productImage('uploads/products/'.$row->image))}}"
                                      alt="Pink Sport Shoes" width="488" height="549">
                              </div>
                           </div>
                           <div class="product-action-vertical">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Add to wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Add to Compare"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <h4 class="product-name"><a href="{{ route('shop.show', $row->slug) }}">{{$row->name}}</a></h4>
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
                  @endforeach
               </div>
            </section>
         </div>
      </div>
      <!-- End of Page Content -->
   </main>
@stop

@section('script')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
   <script src="/site/assets/vendor/photoswipe/photoswipe.min.js"></script>
   <script src="/site/assets/vendor/photoswipe/photoswipe-ui-default.min.js"></script>

   <script>
      // Review js here
      $(function () {

         $("#rateYo").rateYo({
            rating: 2,
            fullStar: true
         });

         $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
         });

         var reviews = $(".my-ratings");
         reviews.each( function(index, value) {
            var test = $(value);
            test.rateYo({
               rating: test.data('rating'),
               readOnly: true,
            });
         });
      });
   </script>

   <script>
      $('#productVideo').magnificPopup({
         type: 'iframe'
      });

      $("#share").jsSocials({
         showLabel: false,
         showCount: false,
         shares: ["email", "twitter", "facebook", "linkedin", "pinterest","whatsapp"]
      });

   </script>
@stop
