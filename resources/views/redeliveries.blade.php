<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--  Title -->
        <title>配送管理システム</title>
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
        <link  id="themeColors"  rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link  id="themeColors"  rel="stylesheet" href="{{ asset('css/bootstrap-switch.min.css') }}" />
    </head>
    <body>    
        @csrf
        <input type="hidden" class="list-redeliveries-url custom-border" value="{{ route('redeliveries.list') }}" />                                                      
        <!-- Preloader -->
        <div class="preloader">
            <img src="{{ asset('images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <!-- Preloader -->
        <div class="preloader">
            <img src="{{ asset('images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <!-- Sidebar Start -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div>
                    <div class="brand-logo d-flex align-items-center justify-content-between">
                        <a href="./index.html" class="text-nowrap logo-img">
                            <img src="{{ asset('images/logos/dark-logo.svg') }}" class="dark-logo" width="180" alt="" />
                            <img src="{{ asset('images/logos/light-logo.svg') }}" class="light-logo"  width="180" alt="" />
                        </a>
                        <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                            <i class="ti ti-x fs-8"></i>
                        </div>
                    </div>
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                        <ul id="sidebarnav">
                        <!-- ============================= -->
                        <!-- Home -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- =================== -->
                        <!-- Dashboard -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-aperture"></i>
                            </span>
                            <span class="hide-menu">配送案件</span>
                            </a>
                        </li>                         
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            </aside>
            <!--  Sidebar End -->
            <!--  Main wrapper -->
            <div class="body-wrapper">
                <!--  Header Start -->
                <header class="app-header"> 
                    <nav class="navbar navbar-expand-lg navbar-light">    
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">                                    
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="{{ asset('images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ asset('images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                                        <span class="mb-1 d-block text-dark">Designer</span>
                                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> info@modernize.com
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="btn btn-outline-primary w-100 py-8 mb-4 rounded-2" href="{{ route('logout') }}" @click.prevent="$root.submit();">ログアウト</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <!--  Header End -->
                <div class="container-fluid">
                    <!--  Owl carousel -->
                    <div class="owl-carousel counter-carousel owl-theme">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-primary shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-user-male.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-primary mb-1"> 集荷 </p>
                                        <h5 class="fw-semibold text-primary mb-0">96</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-warning shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-briefcase.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-warning mb-1">お客様</p>
                                        <h5 class="fw-semibold text-warning mb-0">3,650</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-info shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-mailbox.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-info mb-1">配達済</p>
                                        <h5 class="fw-semibold text-info mb-0">356</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-favorites.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-danger mb-1">不在</p>
                                        <h5 class="fw-semibold text-danger mb-0">696</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-success shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-speech-bubble.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-success mb-1">保管</p>
                                        <h5 class="fw-semibold text-success mb-0">$96k</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-info shadow-none">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/svgs/icon-connect.svg') }}" width="50" height="50" class="mb-3" alt="" />
                                        <p class="fw-semibold fs-3 text-info mb-1">受付</p>
                                        <h5 class="fw-semibold text-info mb-0">59</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Row 2 -->
                    <div class="row">
                        <!-- Top Performers -->
                        <div class="col-lg-3">
                            <label class="control-label">合計</label>  
                            <div class="mb-3 w-100 d-flex align-items-strech">                                                                                     
                                <input type="text" id="total" name="total" value="123,456円" class="form-control form-control-danger custom-border" disabled readonly  style="text-align: center;font-weight: bolder;font-size: large;"/> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="control-label">未入金</label>  
                            <div class="mb-3 w-100 d-flex align-items-strech">                                                                                     
                                <input type="text" id="not_payment" name="not_payment" value="123,456円" class="form-control form-control-danger custom-border" disabled readonly  style="text-align: center;font-weight: bolder;font-size: large;"/> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="control-label">未入金</label>  
                            <div class="mb-3 w-100 d-flex align-items-strech">                                                                                     
                                <input type="text" id="not_payment" name="not_payment" value="123,456円" class="form-control form-control-danger custom-border" disabled readonly  style="text-align: center;font-weight: bolder;font-size: large;"/> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="control-label">着金</label>  
                            <div class="mb-3 w-100 d-flex align-items-strech">                                                                                     
                                <input type="text" id="payment" name="payment" value="123,456円" class="form-control form-control-danger custom-border" disabled readonly  style="text-align: center;font-weight: bolder;font-size: large;"/> 
                            </div>
                        </div>
                    </div>
                    <!--  Row 3 -->
                    <div class="row">
                        <!-- Top Performers -->
                        <div class="col-lg-12 d-flex align-items-strech">
                            <div class="card w-100 custom-border">
                                <div class="card-body">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                        <div class="mb-3 mb-sm-0">
                                            <h5 class="card-title fw-semibold">配送案件一覧</h5>
                                            <p class="card-subtitle mb-0">
                                                <button type="button" class="btn btn-primary btn-redeliveries-add" style="background-color: white!important; border-color: black!important; color: black!important;">追加</button>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">                                        
                                                    <select class="form-control form-select">
                                                        <option value="">ドライバーフィルター</option>
                                                        <option value="">EEEE</option>
                                                        <option value="">FFFF</option>
                                                        <option value="">GGGG</option>
                                                        <option value="">HHHH</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">                                         
                                                    <select class="form-control form-select">
                                                        <option value="">ステータスフィルター</option>
                                                        <option value="1">集荷</option>
                                                        <option value="2">受付</option>
                                                        <option value="3">保管</option>
                                                        <option value="4">不在</option>
                                                        <option value="9">配達済み</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">                                          
                                                    <select class="form-control form-select">
                                                        <option value="">配達月フィルター</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                        <option value="">6</option>
                                                        <option value="">7</option>
                                                        <option value="">8</option>
                                                        <option value="">9</option>
                                                        <option value="">10</option>
                                                        <option value="">11</option>
                                                        <option value="">12</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="table-responsive" style="overflow-x:auto!important;margin-top: -20px;">
                                        <table class="table align-middle text-nowrap mb-0 table-redeliveries">
                                            <thead class="custom-border">
                                                <tr class="text-muted fw-semibold">
                                                    <th scope="col" rowspan="2" style="vertical-align: top;">No</th>
                                                    <th scope="col" style="vertical-align: middle;border-bottom: none;">依頼者名</th>
                                                    <th scope="col" style="width: 83px;vertical-align: middle;border-bottom: none;">配送元(〒・住所)</th>
                                                    <th scope="col" style="width: 68px;text-align: right;vertical-align: middle;border-bottom: none;">個数</th>
                                                    <th scope="col" style="text-align: center;vertical-align: middle;border-bottom: none;">荷物種類</th>
                                                    <th scope="col" style="vertical-align: middle;border-bottom: none;">配送予定日</th>
                                                    <th scope="col" style="width: 137px;vertical-align: middle;border-bottom: none;">再配達希望日</th>
                                                    <th scope="col" style="vertical-align: middle;border-bottom: none;">時間帯</th>
                                                    <th scope="col" rowspan="2" style="vertical-align: middle;"></th>
                                                </tr>
                                                <tr class="text-muted fw-semibold">
                                                    <th scope="col" style="vertical-align: middle;">お名前</th>
                                                    <th scope="col" style="vertical-align: middle;">配送先(〒・住所)</th>
                                                    <th scope="col" style="text-align: right;vertical-align: middle;">運賃</th>
                                                    <th scope="col" style="text-align: center;vertical-align: middle;">ステータス</th>
                                                    <th scope="col" style="vertical-align: middle;">ドライバー</th>
                                                    <th scope="col" colspan="2" style="vertical-align: middle;">備考</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border-top custom-border">
                                                <tr class="template-data-row1" style="display:none;">
                                                    <td rowspan="2" class="search_item_no"></td>
                                                    <td class="search_requester_name" style="border-bottom: none;"></td>
                                                    <td class="search_pickup_zipcode" style="border-bottom: none;"></td>
                                                    <td class="search_quantity" style="text-align: right;border-bottom: none;"></td>
                                                    <td class="search_package_type_name" style="text-align: center;border-bottom: none;"></td>
                                                    <td class="search_delivery_date" style="border-bottom: none;"></td> 
                                                    <td class="search_redelivery_date" style="border-bottom: none;"></td> 
                                                    <td class="search_redelivery_time_name" style="border-bottom: none;"></td>
                                                    <td class="action" rowspan="2" style="vertical-align: middle;">
                                                        @csrf
                                                        <input type="hidden" class="edit-redeliveries-url custom-border" value="{{url()->current()}}/" />
                                                        <input type="hidden" class="get-redeliveries-url custom-border" value="{{ route('redeliveries.get') }}" />
                                                        <input type="hidden" class="id custom-border"/>
                                                        <button class="btn btn-primary text-white btn-redeliveries-notification" style="background-color: white!important; border-color: black!important; color: black!important;margin-bottom: 2px;">通知</button></br>
                                                        <button class="btn btn-primary text-white btn-redeliveries-detail" style="border-color: black!important; background-color: black!important;margin-top: 2px;">詳細</button>
                                                    </td>
                                                </tr>
                                                <tr class="template-data-row2" style="display:none;">
                                                    <td class="search_delivery_name"></td>
                                                    <td class="search_delivery_zipcode"></td> 
                                                    <td class="search_fare_amount" style="text-align: right;"></td>
                                                    <td class="search_status_name" style="text-align: center;"></td>
                                                    <td class="search_delivery_driver"></td> 
                                                    <td colspan="2"  class="search_note"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
        <!-- QR Modal -->
        <div id="qrModal" class="modal fade" tabindex="-1" aria-labelledby="qrModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content" style="max-width:425px!important;">
                    <div class="modal-header d-flex align-items-center" >
                        <h4 class="modal-title" id="myModalLabel">配送案件通知</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる" ></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr><td colspan="7" style="text-align:center!important;font-weight: bolder;">＊追跡番号(お問い合わせ番号)＊</td></tr>
                            <tr><td colspan="7" style="text-align:center!important;"><label style="text-align: center;" id="package_code">XXX-XXXXXXX-XXXXX</label></td></tr>
                            <tr><td colspan="7" style="text-align:center!important;">※これは電話番号ではありません。</td></tr>
                            <tr>
                                <td colspan="7" >&nbsp;</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td style="text-align:right!important;font-weight: bolder;">配達日</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="delivery_date_name">XXX-XXXXXXX-XXXXX</label></td>
                                <td>&nbsp;</td>
                                <td style="text-align:right!important;font-weight: bolder;">保管期限</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="storage_period_name">YY/MM/DD</label></td>
                            </tr>
                            <tr>
                                <td colspan="7" >&nbsp;</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td colspan="3" rowspan="3" style="text-align:left!important;">
                                    配達のお申し込みは</br>
                                    以下のQRコードから</br>
                                    アクセスしてください。
                                </td>
                                <td>&nbsp;</td>
                                <td colspan="3" rowspan="3" style="text-align:left!important;">
                                    <div id="qrcodeCanvas"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td style="text-align:right!important;font-weight: bolder;">配達担当者</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="delivery_driver_name">宮前克弥</label></td>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr><td colspan="7" style="text-align:center!important;">--------------------------------------------------------------</td></tr>
                            <tr><td colspan="7" style="text-align:center!important;font-weight: bolder;">再配達の依頼</td></tr>                            
                            <tr class="redelivery_date_display" style="text-align:center;display:none;">
                                <td style="text-align:right!important;font-weight: bolder;">&lt;希望日&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="redelivery_date_name">YY/MM/DD</label></td>
                                <td>&nbsp;</td>
                                <td style="text-align:right!important;font-weight: bolder;">&lt;時間帯&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="redelivery_time_name">9:00-12:00</label></td>
                            </tr>                        
                            <tr style="text-align:center;">
                                <td style="text-align:right!important;font-weight: bolder;">&lt;配送元&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="pickup_zipcode">9:00-12:00</label></td>
                                <td>&nbsp;</td>
                                <td style="text-align:right!important;font-weight: bolder;">&lt;配送先&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="delivery_zipcode">9:00-12:00</label></td>
                            </tr>                        
                            <tr style="text-align:center;">
                                <td style="text-align:right!important;font-weight: bolder;">&lt;荷物種類&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="package_type_name">9:00-12:00</label></td>
                                <td>&nbsp;</td>
                                <td style="text-align:right!important;font-weight: bolder;">&lt;個数&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="quantity">9:00-12:00</label></td>
                            </tr>                        
                            <!-- <tr style="text-align:center;">
                                <td colspan="4">&nbsp;</td>
                                <td style="text-align:right!important;font-weight: bolder;">&lt;ステータス&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;"><label style="text-align: center;" id="status_name">9:00-12:00</label></td>
                            </tr>            
                            -->
                        <form id="qr-redeliveries-edit-form" method="POST" action="{{ route('redeliveries.updateQR') }}">
                            @csrf
                            <tr style="text-align:center;">
                                <td style="text-align:right!important;font-weight: bolder;">&lt;ステータス&gt;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:left!important;">
                                    <select class="form-control form-select custom-border" id="status_id" name="status_id">
                                        <option value=""></option>
                                        <option value="1">集荷</option>
                                        <option value="2">受付</option>
                                        <option value="3">保管</option>
                                        <option value="4">不在</option>
                                        <option value="9">配達済み</option>
                                    </select>
                                    <input type="hidden" id="id" name="id" class="form-control custom-border"/>
                                    <input type="hidden" id="status_name" name="status_name" class="form-control custom-border" />
                                    <input type="hidden" id="updated_at" name="updated_at" class="form-control form-control-danger custom-border"/>
                                </td>
                            </tr>                        
                        </form>
                            <tr><td colspan="7" style="text-align:center!important;">--------------------------------------------------------------</td></tr>                        
                        </table>
                        <!-- <canvas id="qrcode_canvas"></canvas> -->
                        <!-- <label id="update_redeliveries_url"></label> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary btn-qr-redeliveries-edit-action">保存</button>
                        <!-- <button type="button" class="btn btn-primary">保存</button> -->
                    </div>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Detail Modal -->        
        <div id="redeliveriesDetailModal" class="modal fade" tabindex="-1" aria-labelledby="redeliveriesDetailModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center" >
                        <h4 class="modal-title" id="myModalLabel">配送案件詳細</h4>
                        <!-- <div class="bt-switch">
                        <input
                                type="checkbox"
                                checked
                                data-on-color="primary"
                                data-off-color="info"
                            />
                        </div> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる" ></button>
                    </div>
                    <div class="modal-body">
                        <div class = "redeliveries-detail-info" style="display:none;">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">案件名</label>                                            
                                            <input type="text" id="project_title" name="project_title" class="form-control custom-border" placeholder="" disabled readonly/>
                                            <input type="hidden" id="id"/>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">依頼者名</label>                                            
                                            <input type="text" id="requester_name" name="requester_name" class="form-control custom-border" placeholder="" disabled readonly/>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送元</label></br>  
                                            <div class="row">                                       
                                                <div class="col-md-4">
                                                    <input type="text" id="pickup_zipcode" name="pickup_zipcode" class="form-control custom-border" placeholder="" disabled readonly/>                                                                                
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="pickup_add1" name="pickup_add1" class="form-control custom-border" placeholder="" disabled readonly/>
                                                    <input type="text" id="pickup_add2" name="pickup_add2" class="form-control custom-border" placeholder="" disabled readonly/>
                                                </div>
                                            </div>  
                                            <div class="row">                                            
                                                <div class="col-md-4">
                                                    <input type="text" id="pickup_tel" name="pickup_tel" class="form-control custom-border" placeholder="" disabled readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送先</label></br>
                                            <div class="row">                                                
                                                <div class="col-md-4">
                                                    <input type="text" id="delivery_zipcode" name="delivery_zipcode" class="form-control custom-border custom-border" placeholder="" disabled readonly/>                                        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="delivery_add1" name="delivery_add1" class="form-control custom-border custom-border" placeholder="" disabled readonly/>
                                                    <input type="text" id="delivery_add2" name="delivery_add2" class="form-control custom-border custom-border" placeholder="" disabled readonly/>
                                                </div>
                                            </div>
                                            <div class="row">                                             
                                                <div class="col-md-4">
                                                    <input type="text" id="delivery_tel" name="delivery_tel" class="form-control custom-border custom-border" placeholder="" disabled readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">お名前</label> 
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input type="text" id="delivery_name" name="delivery_name" class="form-control custom-border" disabled readonly />
                                                </div>                                                    
                                                <div class="col-md-1">
                                                    <label>様</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送予定日</label>                                             
                                            <input type="text" id="delivery_date" name="delivery_date" class="form-control custom-border" disabled readonly />
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">荷物種類</label>                                            
                                            <input type="text" id="package_type_name" name="package_type_name" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">個数</label>                                            
                                            <input type="text" id="quantity" name="quantity" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">運賃</label>                                            
                                            <input type="text" id="fare_amount" name="fare_amount" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">ドライバー</label>                                            
                                            <input type="text" id="delivery_driver" name="delivery_driver" class="form-control form-control-danger custom-border" placeholder="" disabled readonly /> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">ステータス</label>                                              
                                            <input type="text" id="status_name" name="status_name" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">荷物コード</label>                                            
                                            <input type="text" id="package_code" name="package_code" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">保管期限</label>                                                                                        
                                            <input type="text" id="storage_period" name="storage_period" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">再配達希望日</label>                                                                                        
                                            <input type="text" id="redelivery_date" name="redelivery_date" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">再配達時間帯</label>                                            
                                            <input type="text" id="redelivery_time_name" name="redelivery_time_name" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">備考</label>                                            
                                            <textarea class="form-control custom-border" rows="5" placeholder="" id="note" name="note" disabled readonly></textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">更新日時</label>                                            
                                            <input type="text" id="updated_at" name="updated_at" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form id="redeliveries-edit-form" method="POST" action="">
                        @csrf
                        <div class = "redeliveries-edit-info" style="display:none;">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">案件名</label>
                                            <input type="text" id="project_title" name="project_title" class="form-control custom-border" placeholder=""/>
                                            <input type="hidden" id="id" name="id"/>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">依頼者名</label>
                                            <input type="text" id="requester_name" name="requester_name" class="form-control custom-border" placeholder=""/>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送元</label></br>
                                            <div class="row">
                                                <div class="col-md-1" style="margin-top: 7px;">
                                                    <label>〒</label>
                                                </div>                                                    
                                                <div class="col-md-4" style="margin-left: -43px;">
                                                    <input type="text" id="pickup_zipcode" name="pickup_zipcode" class="form-control custom-border" placeholder=""/>
                                                            <input type="text" name="edit_pickup_zipcode_1" size="4" maxlength="3" style="display:none;">
                                                            <input type="text" name="edit_pickup_zipcode_2" size="5" style="display:none;">
                                                            <input type="text" name="edit_pickup_zipcode_pref" size="40" style="display:none;">
                                                            <input type="text" name="edit_pickup_zipcode_address_1" size="40" style="display:none;">
                                                            <input type="text" name="edit_pickup_zipcode_address_2" size="40" style="display:none;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="pickup_add1" name="pickup_add1" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    <input type="text" id="pickup_add2" name="pickup_add2" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1" style="margin-top: 7px;">
                                                    <label>Tel</label>
                                                </div>                                                  
                                                <div class="col-md-4" style="margin-left: -43px;">
                                                    <input type="text" id="pickup_tel" name="pickup_tel" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送先</label></br>
                                            <div class="row">
                                                <div class="col-md-1" style="margin-top: 7px;">
                                                    <label>〒</label>
                                                </div>                                                    
                                                <div class="col-md-4" style="margin-left: -43px;">
                                                    <input type="text" id="delivery_zipcode" name="delivery_zipcode" class="form-control custom-border" placeholder=""/>
                                                    <input type="text" name="edit_delivery_zipcode_1" size="4" maxlength="3" style="display:none;">
                                                    <input type="text" name="edit_delivery_zipcode_2" size="5" style="display:none;">
                                                    <input type="text" name="edit_delivery_zipcode_pref" size="40" style="display:none;">
                                                    <input type="text" name="edit_delivery_zipcode_address_1" size="40" style="display:none;">
                                                    <input type="text" name="edit_delivery_zipcode_address_2" size="40" style="display:none;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="delivery_add1" name="delivery_add1" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    <input type="text" id="delivery_add2" name="delivery_add2" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                </div>
                                            </div>
                                            <div class="row">          
                                                <div class="col-md-1" style="margin-top: 7px;">
                                                    <label>Tel</label>
                                                </div>                                                  
                                                <div class="col-md-4" style="margin-left: -43px;">
                                                    <input type="text" id="delivery_tel" name="delivery_tel" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">お名前</label> 
                                            <div class="row">
                                                <div class="col-md-11">
                                                <input type="text" id="delivery_name" name="delivery_name" class="form-control custom-border" placeholder=""/>
                                                </div>                                                    
                                                <div class="col-md-1">
                                                    <label>様</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">配送予定日</label>
                                            <input type="date" id="delivery_date" name="delivery_date" class="form-control custom-border" />
                                            <input type="hidden" id="delivery_date_display" name="delivery_date_display" class="form-control custom-border" />
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">荷物種類</label>
                                            <select class="form-control form-select custom-border" id="package_type" name="package_type">
                                                <option value=""></option>
                                                <option value="1">常温</option>
                                                <option value="2">冷蔵</option>
                                                <option value="3">冷凍</option>
                                            </select>
                                            <input type="hidden" id="package_type_name" name="package_type_name" class="form-control custom-border" />
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">個数</label>
                                            <input type="text" id="quantity" name="quantity" class="form-control form-control-danger custom-border" placeholder=""/> 
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">運賃</label>
                                            <input type="text" id="fare_amount" name="fare_amount" class="form-control form-control-danger custom-border" placeholder=""/> 
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">ドライバー</label>
                                            <input type="text" id="delivery_driver" name="delivery_driver" class="form-control form-control-danger custom-border" placeholder=""/> 
                                            <!-- <input type="hidden" id="delivery_driver_display" name="delivery_driver_display" class="form-control form-control-danger" placeholder=""/>  -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">ステータス</label>                                            
                                            <select class="form-control form-select custom-border" id="status_id" name="status_id">
                                                <option value=""></option>
                                                <option value="1">集荷</option>
                                                <option value="2">受付</option>
                                                <option value="3">保管</option>
                                                <option value="4">不在</option>
                                                <option value="9">配達済み</option>
                                            </select>
                                            <input type="hidden" id="status_name" name="status_name" class="form-control custom-border" />
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row pt-3">
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">荷物コード</label>
                                            <input type="text" id="package_code" name="package_code" class="form-control form-control-danger custom-border" placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">保管期限</label>                                            
                                            <input type="text" id="storage_period" name="storage_period" class="form-control form-control-danger custom-border" placeholder=""/> 
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">備考</label>                                            
                                            <textarea class="form-control custom-border" rows="5" placeholder="" id="note" name="note"></textarea>
                                            <input type="hidden" id="updated_at" name="updated_at" class="form-control form-control-danger custom-border"/>
                                            <!-- <input type="hidden" id="delete_at" name="delete_at"  class="form-control form-control-danger custom-border"/> -->
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="control-label">更新日時</label>                                            
                                            <fieldset disabled="">
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="" disabled>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> -->
                            </div>                            
                            <input type="hidden" id="editAction"/>
                            <input type="hidden" id="updateAction" value="{{ route('redeliveries.update') }}"/>
                            <input type="hidden" id="deleteAction" value="{{ route('redeliveries.delete') }}"/>
                        </div>
                    </form>
                    </div>
                    <!-- </div> -->
                    <div class="modal-footer">                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="editMode"/>
                            <label class="form-check-label" for="editMode">編集</label>
                        </div>
                        <button type="button" class="btn btn-primary btn-redeliveries-update-action" style="display:none;">保存</button>
                        <button type="button" class="btn btn-danger btn-redeliveries-delete-action" style="display:none;">削除</button>
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">閉じる</button>
                    </div>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!-- Add Modal -->        
        <div id="redeliveriesAddModal" class="modal fade" tabindex="-1" aria-labelledby="redeliveriesAddModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center" >
                        <h4 class="modal-title" id="myModalLabel">配送案件追加</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる" ></button>
                    </div>
                    <div class="modal-body">
                        <form id="redeliveries-add-form" method="POST" action="{{ route('redeliveries.post') }}">
                            @csrf
                            <div class="redeliveries-add-info">
                                <div class="card-body">
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">案件名</label>
                                                <input type="text" id="project_title" name="project_title" class="form-control custom-border" placeholder=""/>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">依頼者名</label>
                                                <input type="text" id="requester_name" name="requester_name" class="form-control custom-border" placeholder=""/>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">配送元</label></br>
                                                <div class="row">
                                                    <div class="col-md-1" style="margin-top: 7px;">
                                                        <label>〒</label>
                                                    </div>                                                    
                                                    <div class="col-md-4" style="margin-left: -43px;">
                                                        <input type="text" id="pickup_zipcode" name="pickup_zipcode" class="form-control custom-border" size="8" maxlength="8" placeholder=""/>
                                                        <input type="text" name="add_pickup_zipcode_1" size="4" maxlength="3" style="display:none;">
                                                        <input type="text" name="add_pickup_zipcode_2" size="5" style="display:none;">
                                                        <input type="text" name="add_pickup_zipcode_pref" size="40" style="display:none;">
                                                        <input type="text" name="add_pickup_zipcode_address_1" size="40" style="display:none;">
                                                        <input type="text" name="add_pickup_zipcode_address_2" size="40" style="display:none;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" id="pickup_add1" name="pickup_add1" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                        <input type="text" id="pickup_add2" name="pickup_add2" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1" style="margin-top: 7px;">
                                                        <label>Tel</label>
                                                    </div>                                                  
                                                    <div class="col-md-4" style="margin-left: -43px;">
                                                        <input type="text" id="pickup_tel" name="pickup_tel" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">配送先</label></br>
                                                <div class="row">
                                                    <div class="col-md-1" style="margin-top: 7px;">
                                                        <label>〒</label>
                                                    </div>                                                    
                                                    <div class="col-md-4" style="margin-left: -43px;">
                                                        <input type="text" id="delivery_zipcode" name="delivery_zipcode" class="form-control custom-border" size="8" maxlength="8" placeholder=""/>
                                                        <input type="text" name="add_delivery_zipcode_1" size="4" maxlength="3" style="display:none;">
                                                        <input type="text" name="add_delivery_zipcode_2" size="5" style="display:none;">
                                                        <input type="text" name="add_delivery_zipcode_pref" size="40" style="display:none;">
                                                        <input type="text" name="add_delivery_zipcode_address_1" size="40" style="display:none;">
                                                        <input type="text" name="add_delivery_zipcode_address_2" size="40" style="display:none;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" id="delivery_add1" name="delivery_add1" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                        <input type="text" id="delivery_add2" name="delivery_add2" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1" style="margin-top: 7px;">
                                                        <label>Tel</label>
                                                    </div>                                                  
                                                    <div class="col-md-4" style="margin-left: -43px;">
                                                        <input type="text" id="delivery_tel" name="delivery_tel" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">お名前</label> 
                                                <div class="row">
                                                    <div class="col-md-11">
                                                    <input type="text" id="delivery_name" name="delivery_name" class="form-control custom-border" placeholder=""/>
                                                    </div>                                                    
                                                    <div class="col-md-1">
                                                        <label>様</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">配送予定日</label>
                                                <input type="date" id="delivery_date" name="delivery_date" class="form-control custom-border" />
                                                <input type="hidden" id="delivery_date_display" name="delivery_date_display" class="form-control custom-border" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">荷物種類</label>
                                                <select class="form-control form-select custom-border" id="package_type" name="package_type">
                                                    <option value=""></option>
                                                    <option value="1">常温</option>
                                                    <option value="2">冷蔵</option>
                                                    <option value="3">冷凍</option>
                                                </select>
                                                <input type="hidden" id="package_type_name" name="package_type_name" class="form-control custom-border" />
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">個数</label>
                                                <input type="text" id="quantity" name="quantity" class="form-control form-control-danger custom-border" placeholder=""/> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">運賃</label>
                                                <input type="text" id="fare_amount" name="fare_amount" class="form-control form-control-danger custom-border" placeholder=""/> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">ドライバー</label>
                                                <input type="text" id="delivery_driver" name="delivery_driver" class="form-control form-control-danger custom-border" placeholder=""/> 
                                                <!-- <input type="hidden" id="delivery_driver_display" name="delivery_driver_display" class="form-control form-control-danger" placeholder=""/>  -->
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">ステータス</label>                                            
                                                <select class="form-control form-select custom-border" id="status_id" name="status_id">
                                                    <option value=""></option>
                                                    <option value="1">集荷</option>
                                                    <option value="2">受付</option>
                                                    <option value="3">保管</option>
                                                    <option value="4">不在</option>
                                                    <option value="9">配達済み</option>
                                                </select>
                                                <input type="hidden" id="status_name" name="status_name" class="form-control custom-border" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row pt-3">
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">荷物コード</label>
                                                <input type="text" id="package_code" name="package_code" class="form-control form-control-danger custom-border" placeholder=""/> 
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">保管期限</label>                                            
                                                <input type="text" id="storage_period" name="storage_period" class="form-control form-control-danger custom-border" placeholder=""/> 
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="control-label">備考</label>                                            
                                                <textarea class="form-control custom-border" rows="5" placeholder="" id="note" name="note"></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary btn-redeliveries-add-action">保存</button>
                    </div>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Add Modal -->        
        <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="redeliveriesAddModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-sm">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center" >
                        <h4 class="modal-title" id="myModalLabel">削除確認</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる" ></button>
                    </div>
                    <div class="modal-body">
                        <p>削除してもよろしいですか。</p>
                    </div>
                    <!-- </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">いいえ</button>
                        <button type="button" class="btn btn-primary btn-delete-ok">保存</button>
                    </div>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="loader" style="display:none;">
            <div class="loading"></div>
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
        <script src="{{ asset('js/redeliveries.js') }}"></script>
        <script src="{{ asset('js/jquery-qrcode.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-switch.js') }}"></script> 
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script> 
    </body>
</html>
