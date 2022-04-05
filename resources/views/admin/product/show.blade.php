@extends('admin.admin')
@section('content')
    <product
        view="update"
        :categories='@json($data->getAllCategories())'
        :product='@json($data)'
    />
@endsection
