@extends('client.client')
@section('content')
    <section class="cart_area padding_top">
        <div class="container">
            @if(cart()->isnotEmpty())
                <div class="cart_inner">
                    <div class="table-responsive">
                        <cart
                            total='{{ cart('total', [0,',','.']) }}'
                            :items='@json(cart())'
                            view="cart"
                        />
                    </div>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="/">Tiếp tục mua hàng</a>
                        <a class="btn_1 checkout_btn_1" href="{{ route('client.checkout.index') }}">Thanh toán</a>
                    </div>
                </div>
            @else
                <div class="row align-content-center">Giỏ hàng rỗng</div>
            @endif
        </div>
    </section>

@endsection
