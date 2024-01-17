<h1>Xin chao ban</h1>
<h1>Duoi day la thong tin don hang cua ban</h1>
@php
    $data = session()->get('cart');
    $total = 0;
        foreach ($data as $item) {
            $total += $item['quantity'] * $item['price'];
        }
@endphp
