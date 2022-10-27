
<thead>
<tr>
    <th colspan="2">
        <b>Product</b>
    </th>
</tr>
</thead>
<tbody>
@foreach (Cart::content() as $item)
    <tr class="bb-no">
        <td class="product-name">
            <a href="{{ route('shop.show', $item->model->slug) }}">{{ Illuminate\Support\Str::limit($item->model->name, 20) }}
            </a>
            <i class="fas fa-times"></i>
            <span class="product-quantity">{{$item->qty}}</span>
            <div>
                @if($item->options->has('size')) <small>Size: {{$item->options->size}}</small>@endif
                @if($item->options->has('color')) <small>Color: {{$item->options->color}}</small>@endif
            </div>
        </td>
        <td class="product-total">{{ presentPrice($item->subtotal) }}</td>
    </tr>
@endforeach
<tr class="cart-subtotal bb-no">
    <td>
        <b>Subtotal</b>
    </td>
    <td>
        <b>{{ presentPrice(Cart::subtotal()) }}</b>
    </td>
</tr>
{{--Coupon area Start--}}
@if (session()->has('coupon'))
    <tr class="summary-subtotal" style="padding-bottom: 6px">
        <td>Discount:({{session()->get('coupon')['name']}})
            <form action="{{ route('coupon.destroy') }}" method="POST" class="d-inline-block">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" id="removeCoupon" class="text-danger">X</button>
            </form>
        </td>
        <td class="text-danger">- {{ presentPrice(session()->get('coupon')['discount']) }}</td>
    </tr>
    <tr class="summary-subtotal">
        <td>New Subtotal:</td>
        <td>{{presentPrice($newSubtotal)}}</td>
    </tr>
@endif
{{--Coupon area End--}}
@if(isset($shippingCost))
    <tr class="cart-subtotal bb-no">
        <td> <b>Shipping:</b></td>
        <td>{{ presentPrice($shippingCost) }}</td>
    </tr>
@endif
</tbody>
<tfoot>
<tr class="order-total">
    <th>
        <b>Total</b>
    </th>
    <td>
        <b>{{ presentPrice($newTotal) }}</b>
    </td>
</tr>
</tfoot>