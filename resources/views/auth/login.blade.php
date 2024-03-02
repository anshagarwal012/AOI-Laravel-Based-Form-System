<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <title>Login Page</title>
    {{-- {{ HTML::style('css/woodevz.min.css') }} --}}
    <link href="{{ asset('/css/webly.min.css') }}" rel="stylesheet">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">

                        {{-- <div class="brand-logo pb-4 text-center">
                            <a href="/login.php" class="logo-link">
                                <img class="logo-dark logo-img" src="./docx/img/logo.jpg" alt="logo">
                            </a>
                        </div> --}}
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        @if (!empty($errors) && gettype($errors) != 'object')
                                            <div class="alert alert-fill alert-danger alert-icon"><em
                                                    class="icon ni ni-cross-circle"></em>
                                                <strong>{{ $errors }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input required type="text" name="username"
                                                class="form-control form-control-lg" value="{{ old('username') }}"
                                                placeholder="Enter your username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label"
                                                for="password">Password</label></div>
                                        <div class="form-control-wrap">
                                            <input required type="password" name="password"
                                                class="form-control form-control-lg" id="password"
                                                placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submi"
                                            class="btn btn-lg btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
