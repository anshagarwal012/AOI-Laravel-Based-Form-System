@section('title', 'Dashboard')
@extends('main')
@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle">
            <div class="card">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Add Users</h4>
                            @if (!empty($errors) && gettype($errors) != 'object')
                                <div class="alert alert-fill alert-danger alert-icon"><em
                                        class="icon ni ni-cross-circle"></em>
                                    <strong>{{ dd($errors) }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Name</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="text" name="name" class="form-control form-control-lg"
                                            value="{{ old('name') }}" placeholder="Enter your name">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="email" name="email" class="form-control form-control-lg"
                                            value="{{ old('email') }}" placeholder="Enter your email">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Contact No.</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="text" name="contact" class="form-control form-control-lg"
                                            value="{{ old('contact') }}" placeholder="Enter your contact">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Password</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="password" name="password" class="form-control form-control-lg"
                                            value="{{ old('password') }}" placeholder="Enter your password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Shop Name</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="text" name="shop_name" class="form-control form-control-lg"
                                            value="{{ old('shop_name') }}" placeholder="Enter your shop name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Address</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input required type="text" name="address" class="form-control form-control-lg"
                                            value="{{ old('address') }}" placeholder="Enter your address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" name="submi"
                                        class="btn btn-lg btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
