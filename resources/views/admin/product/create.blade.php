@extends('admin.admin')
@section('content')
    <div class="content">
        <product
            view="create"
            :categories='@json($data->getCategories())'
        />
    </div>
@endsection
