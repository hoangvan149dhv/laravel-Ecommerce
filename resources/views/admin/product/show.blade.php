@extends('admin.admin')
@section('content')
    <product
        view="update"
        :categories='@json($data->getCategories())'
        :product='@json($data)'
    />
@endsection
