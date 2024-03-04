@section('title', 'Dashboard')
@extends('main')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="nk-block-head-content d-flex justify-item-center">
                            <h3 class="nk-block-title page-title">Registration Form</h3>
                        </div>
                    </div>
                </div>
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        @csrf
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group"><label class="form-label" for="full-name">Name Prof./Dr./Mr./Ms</label>
                                <div class="form-control-wrap"><input type="text" class="form-control" id="full-name">
                                </div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">Address</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">Name of the
                                    Institution/Hospital</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">City/State</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">Mobile</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">E-mail</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">AOI Membership No</label>
                                <div class="form-control-wrap"><input type="text" class="form-control"
                                        id="email-address"></div>
                            </div>
                            <div class="form-group"><label class="form-label" for="email-address">Accompanying
                                    Persons</label>
                                <div class="form-control-wrap"><label for="first">1:</label><input type="text"
                                        class="form-control" id="email-address"></div>
                                <div class="form-control-wrap"><label for="second">2:</label><input type="text"
                                        class="form-control" id="email-address"></div>
                            </div>
                            <label class="form-label" for="email-address">Passport Size
                                Photograph</label>
                            <div class="upload-zone dropzone dz-clickable" data-accepted-files="">
                                <div class="dz-message" data-dz-message=""><span class="dz-message-text">Passport Size
                                        Photograph</span><span class="dz-message-or">or</span><button
                                        class="btn btn-primary">SELECT</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
