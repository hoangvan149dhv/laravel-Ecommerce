@extends('admin.admin')
@section('script')
    <script>
    </script>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-5 float-right"><a class="mb-1 btn btn-lg btn-primary" href="{{ route('admin.product.create') }}">Thêm sản phẩm</a></div>
                        <table-content-by-admin
                            :items='@json($items)'
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
