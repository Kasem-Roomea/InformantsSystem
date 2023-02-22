<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        @can('الأحصائيات')
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">الأحصائيات</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">

                @can('أحصائيات العينات')
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">العينات</p>
                                    <h4>{{$data['Samples']}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i><a href="{{url('Samples')
                                }}">مشاهدة العينات</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endcan
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-user-secret highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">المحللين</p>
                                    <h4>{{$data['Informants']}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i><a href="{{url('Informants')
                                }}">تفاصيل المحللين</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-try highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">الأصناف</p>
                                    <h4>{{$data['Classes']}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i><a href="{{url('Classes')
                                }}">تفاصيل ألأصناف</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">المستخدمين</p>
                                    <h4>{{$data['User']-1}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i><a href="{{url('users')
                                }}">تفاصيل المستخدمين</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title">Best Sellers</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="months-tab" data-toggle="tab"
                                                    href="#months" role="tab" aria-controls="months"
                                                    aria-selected="true"> Months</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="year-tab" data-toggle="tab" href="#year"
                                                    role="tab" aria-controls="year" aria-selected="false">Year
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="months" role="tabpanel"
                                        aria-labelledby="months-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/05.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Supercharge your motivation</h6>
                                                <p class="sm-mb-5 d-block">I truly believe Augustine’s words are
                                                    true. </p>
                                                <span class="mb-0">by - <b class="text-info">PotenzaUser</b></span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-primary mb-0"><b>45,436</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-secondary mb-0"><b>$05,236</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/02.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Helen keller a teller seller</h6>
                                                <p class="sm-mb-5 d-block">We also know those epic stories,
                                                    those modern.</p>
                                                <span class="mb-0">by - <b class="text-warning">WebminUser</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>23,462</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-danger mb-0"><b>$166</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/03.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">The other virtues practice</h6>
                                                <p class="sm-mb-5 d-block">One of the most difficult aspects of
                                                    achieving. </p>
                                                <span class="mb-0">by - <b class="text-danger">TheCorps</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-warning mb-0"><b>5,566</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-info mb-0"><b>$4,126</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/04.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">You will begin to realise</h6>
                                                <p class="sm-mb-5 d-block">Remind yourself you have nowhere to
                                                    go except. </p>
                                                <span class="mb-0">by - <b class="text-success">PGSinfotech</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-dark mb-0"><b>5,446</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>$436</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/09.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Walk out 10 years into</h6>
                                                <p class="sm-mb-5 d-block">Understanding the price and having
                                                    the willingness to pay. </p>
                                                <span class="mb-0">by - <b class="text-danger">TheZayka</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-dark mb-0"><b>12,549</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="theme-color mb-0"><b>$1,656</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/06.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Step out on to the path</h6>
                                                <p class="sm-mb-5 d-block">Success to you and then pull it out
                                                    when you are.</p>
                                                <span class="mb-0">by - <b class="text-info">CarDealer</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-primary mb-0"><b>1,366</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-secondary mb-0"><b>$4,536</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/07.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">Briefly imagine that you</h6>
                                                <p class="sm-mb-5 d-block">Motivators for your personality and
                                                    your personal goals. </p>
                                                <span class="mb-0">by - <b class="text-success">SamMartin</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-success mb-0"><b>465</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-danger mb-0"><b>$499</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/08.jpg" alt="">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h6 class="mb-0 sm-mt-5">You continue doing what</h6>
                                                <p class="sm-mb-5 d-block">The first thing to remember about
                                                    success is that. </p>
                                                <span class="mb-0">by - <b class="text-warning">Cosntro</b>
                                                </span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-warning mb-0"><b>4,456</b></h5>
                                                <span>Sales</span>
                                            </div>
                                            <div class="col-md-2 col-sm-6 col-6 sm-mt-20">
                                                <h5 class="text-info mb-0"><b>$6,485</b></h5>
                                                <span>Revenue</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
            @endcan
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
