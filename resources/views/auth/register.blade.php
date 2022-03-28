@extends('client.layouts.app')

@section('script')

@endsection

@section('content')

    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5">Đăng ký</h4>
                        <form id="register" class="client-form-request" method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           aria-describedby="name" name="name"  value="{{ old('name') }}"
                                           placeholder="Họ tên">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input id="emailRegister" type="email"
                                           class="form-control form-control-register {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" placeholder="abc@gmail.com"
                                           required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                                <strong>{!! nl2br($errors->first('email')) !!}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input id="password" type="password"
                                           class="form-control form-control-register {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password"
                                           value="{{ old('password') }}" placeholder="Mật khẩu" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="d-inline-block mr-3">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Xác nhận
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
