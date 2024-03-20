@section('title', 'Membership Form')
@extends('main')

@section('content')
    <div class="nk-block nk-block-middle nk-auth-body wide-sm">
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Membership Form</h5>
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
                            <input type="file" class="form-control" name="Upload Photo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Membership No.</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="Membership" placeholder="Membership No">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <div class="row">
                            <div class="col-md-2 pr-0">
                                <div class="form-control-wrap">
                                    <select name="AccompanyingPersonsProfession1" class="form-control">
                                        <option value="Dr" selected>Dr.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-10 pl-0">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="AccompanyingPersonsProfessionname1"
                                        placeholder="Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date of Birth :</label>
                        <div class="row">
                            <div class="col-md-3 pr-0">
                                <label class="form-label">Date</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="Date" placeholder="Enter DD">
                                </div>
                            </div>
                            <div class="col-md-3 pr-0">
                                <label class="form-label">Month</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="Month" placeholder="Enter MM">
                                </div>
                            </div>
                            <div class="col-md-3 pr-0">
                                <label class="form-label">Year</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="Year" placeholder="Enter YY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="address1" placeholder="Enter Address Line 1">
                            <input type="text" class="form-control" name="address2" placeholder="Enter Address Line 2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name of</label>
                        <div class="row">
                            <div class="col-md-4 pr-0">
                                <div class="form-control-wrap">
                                    <select name="name_inst_hos" class="form-control">
                                        <option value="Hospital">Hospital</option>
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
                        <label class="form-label">Implant courses attended</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="courses" placeholder="Enter courses">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Dental Council Registration NO</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" name="Sno" placeholder="Enter Sno">
                            <input type="text" class="form-control" name="State" placeholder="State">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Any Other Information</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="others"
                                    placeholder="Enter Information">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telephone</label>
                            <div class="form-control-wrap">
                                <input type="phone" class="form-control" name="Telephone"
                                    placeholder="Enter Telephone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="City" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="State2" placeholder="Enter State">
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
                                <input type="phone" class="form-control" name="Email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Qualifications</label>
                            <div class="row">
                                <div class="col-md-1 pr-0 pt-1 text-center">
                                    <label class="form-label">BDS</label>
                                </div>
                                <div class="col-md-2 pr-0">
                                    <div class="form-control-wrap">
                                        <input type="phone" class="form-control" name="year1"
                                            placeholder="Enter year">
                                    </div>
                                </div>
                                <div class="col-md-8 pl-0">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="college1"
                                            placeholder="Enter College/University">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1 pr-0 pt-1 text-center">
                                    <label class="form-label">MDS</label>
                                </div>
                                <div class="col-md-2 pr-0">
                                    <div class="form-control-wrap">
                                        <input type="phone" class="form-control" name="year2"
                                            placeholder="Enter year">
                                    </div>
                                </div>
                                <div class="col-md-8 pl-0">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="college2"
                                            placeholder="Enter College/University">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Payment Method</label>
                            <div class="form-control-wrap">
                                <select name="payment_method" class="form-control">
                                    <option value="DD">DD</option>
                                    <option value="CHEQUE">CHEQUE</option>
                                    <option value="CASH">CASH</option>
                                    <option value="NEFT">NEFT (for Lucknow only)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Draft/Cheque No.</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="DraftChequeNo"
                                    placeholder="Enter Draft/Cheque No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Payment Date</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control" name="PaymentDate"
                                    placeholder="Enter Payment Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bank Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="BankName"
                                    placeholder="Enter Bank Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">City Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="CityName"
                                    placeholder="Enter City Name">
                            </div>
                            <p>In Favour of Academy of Oral Implantology</p>
                        </div>
                        <div class="form-group">
                            <h2 class="text-dark text-center">Academy of Oral Implantology</h2>
                            <h4 class="text-dark text-center">Scan QR Code</h4>
                            <a href="upi://pay?pa=11487659@cbin&pn=ACADEMY%20OF%20ORAL%20IMPLAN&cu=INR&am=&mc=8021"
                                target="_blank">
                                <img src="{{ asset('images/Registration Form QR.png') }}" class="w-100 text-center">
                            </a>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Transaction Id</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="txn_id"
                                    placeholder="Enter Transaction Id">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Submit Form</button>
                        </div>
                        <input type="hidden" name="form_type" value="membership_form">
                </form>
            </div>
        </div>
    </div>
@endsection
