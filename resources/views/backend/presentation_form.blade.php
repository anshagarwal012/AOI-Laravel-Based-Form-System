@section('title', 'Membership Form')
@extends('backend.main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Membership Form</h3>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100" data-auto-responsive="true">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">Serial No.</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Photo</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Membership Number</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">DOB</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">City</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">State</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td><img src="{{ '../uploads/' . $value->path }}"></td> --}}
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="" download class="btn btn-primary">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
