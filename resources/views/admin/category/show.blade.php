@extends('admin.admin')
@section('content')
    <div class="content">
        <category :category="{{ $category }}" view="edit"/>
    </div>
@endsection