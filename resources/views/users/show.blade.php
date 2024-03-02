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
                                    <h4 class="nk-block-title">User Information</h4>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none"><a href="#"
                                        class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                                            class="icon ni ni-menu-alt-r"></em></a></div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Full
                                            Name</span><span class="data-value">{{ $user->name }}</span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Shop
                                            Name</span><span class="data-value">{{ $user->shop_name }}</span>
                                    </div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Email</span><span
                                            class="data-value">{{ $user->email }}</span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Phone
                                            Number</span><span class="data-value">{{ $user->contact }}</span>
                                    </div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Address</span><span
                                            class="data-value">{{ $user->address }}</span></div>
                                </div>
                                <div class="data-head">
                                    <h6 class="overline-title">Staf List</h6>
                                </div>
                                <div class="card-inner">
                                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100"
                                        data-auto-responsive="true">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">Staff
                                                        ID</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Contact</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Shop Name</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Date Time</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staff as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->contact }}</td>
                                                    <td>{{ $value->shop_name }}</td>
                                                    <td>{{ $value->address }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
