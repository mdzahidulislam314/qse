@if(count($product_ids) > 0)
    <div class="table-responsive">
        <table class="table mb-0 table-bordered">
            <thead class="thead-light">
            <tr>
                <th width="50%">Product</th>
                <th width="15%">Price</th>
                <th width="15%">Discount</th>
                <th width="20%">Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($product_ids as $key => $id)
                @php
                    $row = \App\Product::findOrFail($id);
                    $flash_deal_product = \App\FlashDealProduct::where('flashdeal_id', $flash_deal_id)->where('product_id', $row->id)->first();
                @endphp
                <tr>
                   <td>
                       <div class="form-group row mb-0">
                           <div class="col-auto">
                               <img src="{{url(productImage('uploads/products/'.$row->image))}}" width="70" height="70">
                           </div>
                           <div class="col">
                               <span> {{ Illuminate\Support\Str::limit($row->name, 60) }}</span>
                           </div>
                       </div>
                   </td>
                    <td>
                        <input type="number" name="price_{{$row->id}}" class="form-control" value="{{ $row->price }}">
                    </td>
                    <td>
                        <input type="number" name="spacial_price_{{$row->id}}" class="form-control" value="{{ $row->spacial_price }}">
                    </td>
                    <td>
                        <span>{{$row->category->name ?? ''}}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
