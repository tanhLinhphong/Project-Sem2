@extends('main')

<style>
    .new-container {
        margin-top: 10vh;
        margin-bottom: 10vh;
    }
    .background-image {
        background-image: url('/template/images/bg_title.png');
        background-size: cover; 
        background-position: center; 
        height: 250px;
        position: relative;
        color: white; 
        text-align: center;
        display: flex; 
        justify-content: center; 
        align-items: center; 
        margin-bottom: 10vh;
        margin-top: 10vh;
    }
    .content {
        position: absolute;
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        text-align: center;
        width: 100%; 
    }
    .content h3 {
        margin: 0; 
        font-size: 33px;
        font-family: 'Sriracha', cursive;
        color: #fffc00;
    }


</style>

@section('content')
<div class="background-image">
        <div class="content">
            <h3>{{ $title }}</h3>
        </div>
    </div>

<div class="container">
<div class="new-container">
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->pty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ asset($cart->product->thumb) }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->pty }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection


