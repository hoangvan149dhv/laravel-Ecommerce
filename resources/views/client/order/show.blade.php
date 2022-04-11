@extends('client.client')
@section('content')
    <section class="confirmation_part padding_top">
        <div class="container">
            <section class="confirmation_part padding_top">
                <div class="container">
                    <div>
                        <order
                            :data='@json($order)'
                            payment-status="{{ $order->status === 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}"
                        />
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="order_details_iner">
                                <cart
                                    total='{{ $order->customer['price']['total'] }}'
                                    :items='@json($order->products)'
                                    view="order"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    </section>
@endsection
