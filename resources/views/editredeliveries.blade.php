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
            <!--  Main wrapper -->
            <div class="body-wrapper">                
                <div class="container-fluid">
                    <!--  Row 3 -->
                    <div class="row">
                        <!-- Top Performers -->
                        <div class="col-lg-12 d-flex align-items-strech"> 
                            <div id="redeliveriesEditModal" class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static" aria-labelledby="redeliveriesDetailModal" aria-hidden="false">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-center" >
                                            <h4 class="modal-title" id="myModalLabel">再配達の依頼</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる" ></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="redeliveries-edit-form" method="POST" action="{{ route('redeliveries.updateQR') }}">
                                                @csrf
                                                <div class = "redeliveries-edit-info">
                                                    <div class="card-body">
                                                    @foreach($redeliveries as $redeliverie)
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="control-label">希望日</label>
                                                                    <input type="date" id="redelivery_date" name="redelivery_date" class="form-control custom-border" value="{{ $redeliverie->redelivery_date }}" />
                                                                    <input type="hidden" id="id" name="id" class="form-control custom-border" value="{{ $redeliverie->id }}" /> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row pt-3">
                                                            <!--/span-->
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="control-label">時間帯</label>
                                                                    <select class="form-control form-select custom-border" id="redelivery_time_id" name="redelivery_time_id" value="{{ $redeliverie->redelivery_time_id }}">
                                                                        <option value="" {{ $redeliverie->redelivery_time_id == '' ? 'selected' : '' }}></option>
                                                                        <option value="1" {{ $redeliverie->redelivery_time_id == '1' ? 'selected' : '' }}>09:00-12:00</option>
                                                                        <option value="2" {{ $redeliverie->redelivery_time_id == '2' ? 'selected' : '' }}>13:00-15:00</option>
                                                                        <option value="3" {{ $redeliverie->redelivery_time_id == '3' ? 'selected' : '' }}>16:00-18:00</option>
                                                                        <option value="4" {{ $redeliverie->redelivery_time_id == '4' ? 'selected' : '' }}>19:00-21:00</option>
                                                                    </select>
                                                                    <input type="hidden" id="redelivery_time_name" name="redelivery_time_name" value="{{ $redeliverie->redelivery_time_name }}"  class="form-control custom-border" />
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
                                                                        <input type="text" id="pickup_zipcode" name="pickup_zipcode" value="〒{{ $redeliverie->pickup_zipcode }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="pickup_add1" name="pickup_add1" value="{{ $redeliverie->pickup_add1 }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                            <input type="text" id="pickup_add2" name="pickup_add2" value="{{ $redeliverie->pickup_add2 }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" id="pickup_tel" name="pickup_tel" value="Tel {{ $redeliverie->pickup_tel }}" class="form-control custom-border" placeholder="" disabled readonly/>
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
                                                                        <input type="text" id="delivery_zipcode" name="delivery_zipcode" value="〒{{ $redeliverie->delivery_zipcode }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="delivery_add1" name="delivery_add1" value="{{ $redeliverie->delivery_add1 }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                            <input type="text" id="delivery_add2" name="delivery_add2" value="{{ $redeliverie->delivery_add2 }}" class="form-control custom-border" placeholder="" disabled readonly/>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" id="delivery_tel" name="delivery_tel" value="Tel {{ $redeliverie->delivery_tel }}" class="form-control custom-border" placeholder="" disabled readonly/>
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
                                                                    <label class="control-label">荷物種類</label>                                            
                                                                    <input type="text" id="package_type_name" name="package_type_name" value="{{ $redeliverie->package_type_name }}" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="control-label">個数</label>                                            
                                                                    <input type="text" id="quantity" name="quantity" value="{{ $redeliverie->quantity }}" class="form-control form-control-danger custom-border" placeholder="" disabled readonly/> 
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="control-label">ステータス</label>                                              
                                                                    <input type="text" id="status_name" name="status_name" value="{{ $redeliverie->status_name }}" class="form-control form-control-danger custom-border" disabled readonly placeholder=""/> 
                                                                    <input type="hidden" id="updated_at" name="updated_at" value="{{ $redeliverie->updated_at }}" class="form-control form-control-danger custom-border"/> 
                                                                    <!-- <label class="control-label">ステータス</label>                                            
                                                                    <select class="form-control form-select custom-border" id="status_id" name="status_id">
                                                                        <option value="" {{ $redeliverie->status_id == '' ? 'selected' : '' }}></option>
                                                                        <option value="1" {{ $redeliverie->status_id == '1' ? 'selected' : '' }}>集荷</option>
                                                                        <option value="2" {{ $redeliverie->status_id == '2' ? 'selected' : '' }}>受付</option>
                                                                        <option value="3" {{ $redeliverie->status_id == '3' ? 'selected' : '' }}>保管</option>
                                                                        <option value="4" {{ $redeliverie->status_id == '4' ? 'selected' : '' }}>不在</option>
                                                                        <option value="9" {{ $redeliverie->status_id == '9' ? 'selected' : '' }}>配達済み</option>
                                                                    </select>
                                                                    <input type="hidden" id="status_name" name="status_name" class="form-control custom-border" />
                                                                    <input type="hidden" id="updated_at" name="updated_at" value="{{ $redeliverie->updated_at }}" class="form-control form-control-danger custom-border"/> -->
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div> 
                                            </form>
                                        </div>
                                        <!-- </div> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">閉じる</button>
                                            <button type="button" class="btn btn-primary btn-redeliveries-edit-action">保存</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                <!-- /.modal-dialog -->
                                </div>                       
                            </div>  
                            
                            <div class="loader" style="display:none;">
                                <div class="loading"></div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        
        <!--  Customizer -->        
        <!-- <div class="col-md-3">
            <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title">With Auto Close Timer</h4>
                <h6 class="card-subtitle">(Click on image)</h6>
            </div>
            <div class="card-body p-3">
                <img src="../../dist/images/alert/alert5.png" alt="alert" class="img-fluid model_img"
                id="sa-autoclose" />
            </div>
            </div>
        </div> -->   
        
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
        <script src="{{ asset('js/editredeliveries.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    </body>
</html>
