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
                        <h2>Danh mục sản phẩm</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-5 float-right"><a class="mb-1 btn btn-lg btn-dark" href="{{ route('admin.category.create') }}">Thêm danh mục</a></div>
                        <table-content
                            :items='@json($items)'
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
