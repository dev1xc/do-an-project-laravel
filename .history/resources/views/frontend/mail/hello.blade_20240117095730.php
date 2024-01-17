<h1>Xin chao ban</h1>
<h1>Duoi day la thong tin don hang cua ban</h1>
{{-- @php
    $data = session()->get('cart');
    $total = 0;
        foreach ($data as $item) {
            $total += $item['quantity'] * $item['price'];
        }
@endphp
<h2>{{ 'Tong gia tri don hang la:'.$total }}</h2>
<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="image">Picture</td>
            <td class="description">Description</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @if (empty($data))
            {{ 'Khong co san pham' }}
        @else
        @foreach ($data as $item)
        <tr id="{{ $item['product_id'] }}">
            <td class="cart_description">
                <h4><a href="">{{ $item['product_id'] }}</a></h4>
            </td>
            <td class="cart_product">
                <a href=""><img src="{{ asset('/upload/product/image/'.$item['image']) }}" alt="" style="height: 100px"/></a>
            </td>
            <td class="cart_description">
                <h4><a href="">{{ $item['name'] }}</a></h4>
            </td>
            <td class="cart_price">
                <p>{{ $item['price'] }}</p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <a class="cart_quantity_up" > + </a>
                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['quantity'] }}" autocomplete="off" size="2">
                    <a class="cart_quantity_down" > - </a>
                </div>
            </td>
            <td class="cart_total">
                <p class="cart_total_price">{{ $item['quantity'] * $item['price'] }}</p>
            </td>
            <td class="cart_delete">
                <a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table> --}}
