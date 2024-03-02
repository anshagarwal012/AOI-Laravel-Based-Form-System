@section('title', 'Dashboard')
@extends('main')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Edit Information</h4>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none"><a href="#"
                                        class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                                            class="icon ni ni-menu-alt-r"></em></a></div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <form method="post" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Basics</h6>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Full
                                                Name</span><input required type="text" name="name"
                                                class="form-control" value="{{ $user->name }}"
                                                placeholder="Enter your name"></div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Shop
                                                Name</span><input required type="text" name="shop_name"
                                                class="form-control" value="{{ $user->shop_name }}"
                                                placeholder="Enter your shop name">
                                        </div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Email</span><input required
                                                type="email" name="email" class="form-control"
                                                value="{{ $user->email }}" placeholder="Enter your email"></div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Password</span><input required
                                                type="password" name="password" class="form-control" value=""
                                                placeholder="Enter your password"> </div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Phone
                                                Number</span><input required type="text" name="contact"
                                                class="form-control" value="{{ $user->contact }}"
                                                placeholder="Enter your contact">
                                        </div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col"><span class="data-label">Address</span><input required
                                                type="text" name="address" class="form-control"
                                                value="{{ $user->address }}" placeholder="Enter your address"></div>
                                    </div>
                                </div>
                                <button type="submit" name="submit"
                                    class="btn btn-lg btn-primary btn-block">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
