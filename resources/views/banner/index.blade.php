@section('title', 'Dashboard')
@extends('main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Banner Lists</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('store_banner') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="preview-block">
                                <div class="row gy-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-file"><input type="file" required name="file"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="submit" class="btn btn-primary" value="Add Banner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="card-inner">
                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100" data-auto-responsive="true">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">User ID</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Banner</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td><img src="{{ '../uploads/' . $value->path }}"></td>
                                    <td><a href="{{ route('store_banner_delete', $value->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
