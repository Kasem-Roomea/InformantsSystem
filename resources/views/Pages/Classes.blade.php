@extends('layouts.master')
@section('css')

@section('title')
    الأصناف
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">

        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> الأصناف</a></li>
                <li class="breadcrumb-item active">قائمة الأصناف </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @can('أضافة الأصناف')
                <button type="button" class="btn text-white x-small mb-4" style="background-color: #071689" data-toggle="modal"
                        data-target="#exampleModal">
                    أضافة صنف
                </button>
                @endcan
                <div class="table-responsive">

                    @if(count($classes) != 0)
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>أسم الصنف</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($classes as $class)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $class->Name }}</td>
                                    <td>

                                        @can('تعديل الأصناف')
                                             <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $class->id }}" title="تعديل"><i class="fa fa-edit"></i></button>
                                        @endcan
                                        @can('حذف الأصناف')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $class->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                        @endcan
                                    </td>
                                </tr>

                                <!-- edit_modal_Classes -->
                                <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تعديل الصنف
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Classes.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2">أسم الصنف :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control border"
                                                                   value="{{ $class->Name }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $class->id }}">
                                                        </div>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">أغلاق</button>
                                                        <button type="submit"
                                                                class="btn text-white" style="background-color: #071689" >تعديل</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Classes -->
                                <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف الصنف
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classes.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    سيتم حذف الصنف نهائيا
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">أغلاق</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">حذف</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </table>
                    @else
                        <div class="alert alert-success text-center col-12" role="alert">
                            لايوجد أصناف و للأضافة أول صنف أنقر عللى زر أضافة في أعلى الشاشة
                        </div>
                    @endif
                </div>



                <!-- Add Classes-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                    أضافة صنف جديد
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('Classes.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="Name" class="mr-sm-2">أسم الصنف
                                                :</label>
                                            <input id="Name" type="text" name="Name" class="form-control border">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">أغلاق</button>
                                        <button type="submit" class="btn text-white" style="background-color: #071689">أضافة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add Classes-->


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
