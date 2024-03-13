@section('title', 'Registration Form')
@extends('backend.main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Presentation Form</h3>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <table class="datatable-init table nk-tb-list nk-tb-ulist w-100" data-auto-responsive="true">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb sorting_desc"><span class="sub-text">Serial No.</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Photo</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Tittle_Presentation</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Model</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name Author</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">AOI Membership Number</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Designation</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Hospital Name</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Mobile Number</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Address</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">City</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Co-Authors</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Hospital Name 2</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ '../uploads/' . ($value->Upload_Photo ?? '') }}" width="60"></td>
                                    {{-- <td>{{ $key+1 }}</td> --}}
                                    {{-- <td>{{ ($value->name_profession ?? '') . ' ' . ($value->full_name ?? '') }}</td> --}}
                                    <td>{{ $value->Tittle_Presentation ?? '' }}</td>
                                    <td>{{ $value->model ?? '' }}</td>
                                    <td>{{ $value->Name_author ?? '' }}</td>
                                    <td>{{ $value->AOIMembershipNumber ?? '' }}</td>
                                    <td>{{ $value->Designation ?? '' }}</td>
                                    <td>{{ ($value->name_inst_hos ?? '') . ' ' . ($value->institution_name ?? '') }}</td>
                                    <td>{{ $value->Email ?? '' }}</td>
                                    <td>{{ $value->MobileNumber ?? '' }}</td>
                                    <td>{{ $value->address1 ?? '' }}</td>
                                    <td>{{ $value->City ?? '' }}</td>
                                    <td>{{ $value->C0_authors ?? '' }}</td>
                                    <td>{{ ($value->name_inst ?? '') . ' ' . ($value->hos_name ?? '') }}</td>
                                    <td>{{ $value->State ?? '' }}</td>
                                    <td target="_blank" href="/download-form/{{ $value->id }}" class="btn btn-primary">
                                        <a Download></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
