<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--  Title -->
        <title>情報収集(PRTIMES)システム</title>
        <!--  Required Meta Tag -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="handheldfriendly" content="true" />
        <meta name="MobileOptimized" content="width" />
        <meta name="description" content="Mordenize" />
        <meta name="author" content="" />
        <meta name="keywords" content="Mordenize" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--  Favicon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        
        <!-- Core Css -->
        <link  id="themeColors"  rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
    </head>
    <body>
        <!-- Preloader -->
        <div class="preloader">
            <img src="{{ asset('images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <!-- Preloader -->
        <div class="preloader">
            <img src="{{ asset('images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <div class="position-relative overflow-hidden radial-gradient min-vh-100">
                <div class="position-relative z-index-5">
                    <div class="row">
                        <div class="col-xl-7 col-xxl-8">
                        <a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{ asset('images/logos/dark-logo.svg') }}" width="180" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                            <img src="{{ asset('images/backgrounds/login-security.svg') }}" alt="" class="img-fluid" width="500">
                        </div>
                        </div>
                        <div class="col-xl-5 col-xxl-4">
                            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                                <div class="col-sm-8 col-md-6 col-xl-9">
                                    <h2 class="mb-3 fs-7 fw-bolder">情報収集(PRTIMES)システムへようこそ</h2>
                                    <!-- <p class=" mb-9">Your Admin Dashboard</p>
                                    <div class="row">
                                        <div class="col-6 mb-2 mb-sm-0">
                                        <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                            <img src="{{ asset('images/svgs/google-icon.svg') }}" alt="" class="img-fluid me-2" width="18" height="18">
                                            <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                                        </a>
                                        </div>
                                        <div class="col-6">
                                        <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                            <img src="{{ asset('images/svgs/facebook-icon.svg') }}" alt="" class="img-fluid me-2" width="18" height="18">
                                            <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                                        </a>
                                        </div>
                                    </div>
                                    <div class="position-relative text-center my-4">
                                        <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
                                        <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                    </div> -->
                                    <div class="position-relative my-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- <div>
                                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                            </div> -->

                                            <div class="mb-3">
                                                <label for="email" class="form-label">ユーザー名</label>
                                                <input id="email" type="email" name="email" required="required" autofocus="autofocus" class="form-control custom-border" aria-describedby="emailHelp">
                                                
                                            </div>

                                            <!-- <div class="mt-4">
                                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                            </div> -->

                                            <div class="mb-4">
                                                <label for="password" class="form-label">パスワード</label>
                                                <input id="password" type="password" name="password" required="required" autocomplete="current-password" class="form-control custom-border">
                                            </div>

                                            <!-- <div class="block mt-4">
                                                <label for="remember_me" class="flex items-center">
                                                    <x-jet-checkbox id="remember_me" name="remember" />
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-jet-button class="ml-4">
                                                    {{ __('Log in') }}
                                                </x-jet-button>
                                            </div> -->
                                            <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                                    <label class="form-check-label text-dark" for="flexCheckChecked">私を覚えてますか</label>
                                                </div>
                                                <a class="text-primary fw-medium" href="user-forgot-password"> パスワードをお忘れですか ?</a>
                                            </div> -->
                                            <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">ログイン</button>
                                            <!-- <div class="d-flex align-items-center justify-content-center">
                                                <p class="fs-4 mb-0 fw-medium">&nbsp;</p>
                                                <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">アカウントを作成する</a>
                                            </div> -->
                                        </form>
                                        <!-- <form method="POST" action="{{ route('login') }}">
                                            <div class="mb-3">
                                                <label for="loginEmail" class="form-label">ユーザー名</label>
                                                <input id="email" name="email" required="required" autofocus="autofocus" class="form-control" aria-describedby="emailHelp">
                                                
                                            </div>
                                            <div class="mb-4">
                                                <label for="loginPassword" class="form-label">パスワード</label>
                                                <input id="password" type="password" name="password" required="required" autocomplete="current-password" class="form-control">
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                                    <label class="form-check-label text-dark" for="flexCheckChecked">私を覚えてますか</label>
                                                </div>
                                                <a class="text-primary fw-medium" href="user-forgot-password"> パスワードをお忘れですか ?</a>
                                            </div>                                            
                                            <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">ログイン</button>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <p class="fs-4 mb-0 fw-medium">&nbsp;</p>
                                                <a class="text-primary fw-medium ms-2" href="user-register">アカウントを作成する</a>
                                            </div>
                                        </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <!--  Import Js Files -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/simplebar.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!--  core files -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/app.init.js') }}"></script>
        <script src="{{ asset('js/app-style-switcher.js') }}"></script>
        <script src="{{ asset('js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <!--  current page js files -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>
