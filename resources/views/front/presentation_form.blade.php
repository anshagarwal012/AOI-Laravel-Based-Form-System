@section('title', ' presentation Form')
@extends('main')

@section('content')
    <div class="nk-block nk-block-middle nk-auth-body wide-sm">
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Presentation Form</h5>
                        <div class="nk-block-des">
                            <p>Please Type/ Fill in Block Letters</p>
                        </div>
                    </div>
                </div>
                @if (!empty(session('success')) && gettype(session('success')) != 'object')
                    <div class="alert alert-success alert-succe4ss alert-icon">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <form action="{{ route('form_submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Upload Photo</label>
                        <div class="form-control-wrap">
                            <input type="hidden" class="form-control" name="Upload Photo" id="editedImageData" required>
                            <input type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                data-target="#imageEditorModal" value="Upload Image">
                            <img src="" class="img-fluid preview_image" style="width:100px;height:100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="namecategory" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tittle of the Presentation</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="Tittle_Presentation"
                                placeholder="Enter Presentation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Model of presentation</label>
                        <div class="row">
                            <div class="col-auto">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="Oral" class="custom-control-input" id="customCheck7Oral"
                                        name="model">
                                    <label class="custom-control-label" for="customCheck7Oral">Oral</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="Poster" class="custom-control-input"
                                        id="customCheck7Poster" name="model">
                                    <label class="custom-control-label" for="customCheck7Poster">Poster</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name of the author</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="Name_author" placeholder="Enter Name author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">AOI Membership Number</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="AOIMembershipNumber"
                                placeholder="Enter AOI Membership Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Designation(please specificy)</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="Designation" placeholder="Enter Designation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name of</label>
                        <div class="row">
                            <div class="col-md-4 pr-0">
                                <div class="form-control-wrap">
                                    <select name="name_inst_hos" class="form-control">
                                        <option value="">Hospital</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 pl-0">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="institution_name"
                                        placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="address1" placeholder="Enter Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <div class="form-control-wrap">
                            <input type="phone" class="form-control" name="MobileNumber"
                                placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="form-control-wrap">
                            <input type="mail" class="form-control" name="Email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name of the C0-authors(for poster only)</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="C0_authors" placeholder="Enter C0-authors">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name of</label>
                        <div class="row">
                            <div class="col-md-4 pr-0">
                                <div class="form-control-wrap">
                                    <select name="name_inst" class="form-control">
                                        <option value="">Hospital</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 pl-0">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="hos_name" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Submit Form</button>
                    </div>
                    <input type="hidden" name="form_type" value="presentation_form">
                </form>
            </div>
        </div>
    </div>
@endsection
