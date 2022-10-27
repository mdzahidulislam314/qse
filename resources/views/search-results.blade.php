@extends('layouts.master')
@section('title', 'Shop')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h5 class="page-title">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</h5>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="page-content mb-10">
            <div class="container">
                @if (count($products))
                    <div class="shop-content">
                        <div class="main-content">
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">

                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control count" >
                                            <option value="10" {{ $products->count() == 10 ? 'selected' : '' }}>Show 10</option>
                                            <option value="20" {{ $products->count() == 20 ? 'selected' : '' }}>Show 20</option>
                                            <option value="30" {{ $products->count() == 30 ? 'selected' : '' }}>Show 30</option>
                                            <option value="40" {{ $products->count() == 40 ? 'selected' : '' }}>Show 40</option>
                                        </select>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach($products as $row)
                                    @include('products.single-product2',['row' => $row])
                                @endforeach
                            </div>

                            <div class="toolbox toolbox-pagination justify-content-between">
                                <p class="showing-info mb-2 mb-sm-0">
                                    Showing<span>{{ $products->firstItem() }} to {{ $products->lastItem() }} of {{$products->total()}}</span>Products
                                </p>
                                {{ $products->appends(request()->input())->links('partials.custom-paginate') }}
                            </div>
                        </div>
                        <!-- End of Shop Main Content -->

                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>All Categories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Babies</a></li>
                                        <li><a href="#">Beauty</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Furniture</a></li>
                                        <li><a href="#">Kitchen</a></li>
                                        <li><a href="#">Medical</a></li>
                                        <li><a href="#">Sports</a></li>
                                        <li><a href="#">Watches</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Price</span></h3>
                                    <div class="widget-body">
                                        <ul class="filter-items search-ul">
                                            <li><a href="#">$0.00 - $100.00</a></li>
                                            <li><a href="#">$100.00 - $200.00</a></li>
                                            <li><a href="#">$200.00 - $300.00</a></li>
                                            <li><a href="#">$300.00 - $500.00</a></li>
                                            <li><a href="#">$500.00+</a></li>
                                        </ul>
                                        <form class="price-range">
                                            <input type="number" name="min_price" class="min_price text-center"
                                                   placeholder="$min"><span class="delimiter">-</span><input type="number"
                                                                                                             name="max_price" class="max_price text-center" placeholder="$max"><a
                                                    href="#" class="btn btn-primary btn-rounded">Go</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Size</span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Extra Large</a></li>
                                        <li><a href="#">Large</a></li>
                                        <li><a href="#">Medium</a></li>
                                        <li><a href="#">Small</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widg    et -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Brand</span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Elegant Auto Group</a></li>
                                        <li><a href="#">Green Grass</a></li>
                                        <li><a href="#">Node Js</a></li>
                                        <li><a href="#">NS8</a></li>
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Skysuite Tech</a></li>
                                        <li><a href="#">Sterling</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Color</span></h3>
                                    <ul class="widget-body filter-items item-check">
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">Grey</a></li>
                                        <li><a href="#">Orange</a></li>
                                        <li><a href="#">Yellow</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->
                    </div>
                @else
                    <div class="text-center pb-10 mt-10">
                        <img src="/demo/box.png" width="60">
                        <div class="font-weight-bold mt-1">No Product Found!</div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@stop

@section('js')
@stop
