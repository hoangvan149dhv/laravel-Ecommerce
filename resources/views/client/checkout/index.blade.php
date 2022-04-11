@extends('client.client')
@section('content')
    <section class="checkout_area padding_top">
        <div class="container">
                <checkout
                    total='{{ format_currency(cart('total', [0,',','']), 'VND') }}'
                    :items='@json(cart())'
                    view="checkout"
                />
        </div>
    </section>
@endsection
