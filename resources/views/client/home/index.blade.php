@extends('client.client')
@section('content')
    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Danh mục nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach($categories as $i => $category)
                    <div class="col-lg-{{ ($i + 2) % 2 == 0 ? '5' : '7'}} col-sm-6">
                        <div class="single_feature_post_text">
                            <h3>{{ $category->name }}</h3>
                            <a href="#" class="feature_btn">Xem thêm <i class="fa fa-play"></i></a>
                            <image src="{{ $category->image->url }}" alt=""/>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <products
                        :items='@json($products)'
                    />
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

@endsection
