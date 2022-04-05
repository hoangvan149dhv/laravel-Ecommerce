@extends('admin.admin')
@section('content')
    <div class="content">
        <category :category="{{ $data }}" view="edit"/>
    </div>
@endsection
