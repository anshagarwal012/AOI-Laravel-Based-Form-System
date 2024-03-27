@section('title', 'Presentation Form')
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
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name Author</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">AOI Membership Number</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Designation</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ 'P-' . ((int) $key + 100) }}</td>
                                    <td><img src="{{ '../uploads/' . ($value->Upload_Photo ?? '') }}" width="60"></td>
                                    <td>{{ $value->Tittle_Presentation ?? '' }}</td>
                                    <td>{{ $value->Name_author ?? '' }}</td>
                                    <td>{{ $value->AOIMembershipNumber ?? '' }}</td>
                                    <td>{{ $value->Designation ?? '' }}</td>
                                    <td><a target="_blank" href="/download-form/{{ $value->id }}"
                                            class="btn btn-primary">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
