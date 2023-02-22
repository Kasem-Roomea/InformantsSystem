<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{url('/home')}}">
                            <div class="pull-left"><i class="ti-home "></i><span class="right-nav-text ">مخابرمدار</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">العناصر الرئيسية  </li>
                    <!-- menu item Elements-->
                    @can('مشاهدة العينات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                        class="right-nav-text">العينات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{url('Samples')}}">قائمة العينات</a></li>
                            </ul>
                        </li>
                    @endcan


                    @can('المستخدمين والصلاحيات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements1">
                                <div class="pull-left"><i class="fa fa-user"></i><span
                                        class="right-nav-text">المستخدين والصلاحيات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements1" class="collapse" data-parent="#sidebarnav">
                                @can('المستخدمين')
                                    <li><a href="{{url('users')}}">المستخدمين</a></li>
                                @endcan
                                @can(' الصلاحيات')
                                    <li><a href="{{url('roles')}}">الصلاحيات</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('مشاهدة المحللين')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements2">
                            <div class="pull-left"><i class="fa fa-user-circle"></i><span
                                    class="right-nav-text">محللين المخبر</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements2" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{url('Informants')}}">قائمة محللين المخبر</a></li>
                        </ul>
                    </li>
                    @endcan


                    @can('تقاريرالعينات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements10">
                                <div class="pull-left"><i class="fa fa-book"></i><span
                                        class="right-nav-text">تقارير العينات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="elements10" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{url('ExportReport')}}"> العينات</a></li>
                            </ul>
                        </li>
                    @endcan


                    @can('الأعدادات')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements3">
                                <div class="pull-left"><i class="fa fa-gear"></i><span
                                        class="right-nav-text">الأعدادات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @can('مشاهدة الأصناف')
                            <ul id="elements3" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{url('Classes')}}">الأصناف</a></li>
                            </ul>
                            @endcan
                        </li>
                     @endcan


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
