@section('title', 'Diplomate Registration Form')
@extends('backend.main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Diplomate Registration Form</h3>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100" data-auto-responsive="true">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">Serial No.</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Photo</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Mobile</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">City</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">State</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ '../uploads/' . ($value->Upload_Photo ?? '') }}" width="60"></td>
                                    {{-- <td>{{ $key+1 }}</td> --}}
                                    <td>{{ ($value->name_profession ?? '') . ' ' . ($value->full_name ?? '') }}</td>
                                    <td>{{ $value->Email ?? '' }}</td>
                                    <td>{{ $value->MobileNumber ?? '' }}</td>
                                    <td>{{ $value->address1 ?? '' }}</td>
                                    <td>{{ $value->City ?? '' }}</td>
                                    <td>{{ $value->State ?? '' }}</td>
                                    <td ><a target="_blank" href="/download-form/{{ $value->id }}" class="btn btn-primary">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
