@extends('admin.admin')
@section('content')
    <div class="content">
        <product
            view="create"
            :categories='@json($data->getAllCategories())'
        />
    </div>
@endsection
