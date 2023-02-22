@extends('layouts.master')
@section('css')

@section('title')
    المحللين
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
                <li class="breadcrumb-item"><a href="#" class="default-color">المحللين</a></li>
                <li class="breadcrumb-item active">قائمة المحللين</li>
            </ol>
        </div>
    </div>
</div>

<!--style="background-color: #6c757d;border:#6c757d"-->
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @can('أضافة محللين')
                 <button type="button" class="btn text-white x-small mb-4" style="background-color: #071689"
                         data-toggle="modal"
                         data-target="#exampleModal">
                    أضافة محلل
                    </button>
                @endcan
                <div class="table-responsive">

                    @if(count($informants) != 0)
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr class="table-primary">
                                    <th>#</th>
                                    <th>أسم المحلل</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($informants as $informant)
                                    <tr class="font-bold">
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $informant->Name }}</td>
                                        <td>
                                            @can('تعديل المحللين')
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $informant->id }}"
                                                    title="تعديل"><i class="fa fa-edit"></i></button>
                                            @endcan

                                            @can('حذف المحللين')
                                                 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $informant->id }}"
                                                    title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                                @endcan
                                        </td>
                                    </tr>

                                    <!-- edit_modal_informant -->
                                    <div class="modal fade" id="edit{{ $informant->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        تعديل المحلل
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('Informants.update', 'test') }}"
                                                          method="post">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="Name"
                                                                       class="mr-sm-2">أسم المحلل :</label>
                                                                <input id="Name" type="text" name="Name"
                                                                       class="form-control border"
                                                                       value="{{ $informant->Name }}"
                                                                       required>
                                                                <input id="id" type="hidden" name="id" class="form-control"
                                                                       value="{{ $informant->id }}">
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="Password"
                                                                       class="mr-sm-2">كود المحلل:</label>
                                                                <input id="Password" type="number" name="Password"
                                                                       class="form-control border"
                                                                       value="{{ $informant->Password }}"
                                                                       required>
                                                            </div>

                                                        </div>
                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">أغلاق</button>
                                                            <button type="submit"
                                                                    class="btn text-white" style="background-color: #071689">تعديل</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_informant -->
                                    <div class="modal fade" id="delete{{ $informant->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="{{ route('Informants.destroy', 'test') }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        سيتم حذف الصنف نهائيا
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $informant->id }}">
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
                                لايوجد محللين و للأضافة أول محلل أنقر عللى زر أضافة في أعلى الشاشة
                            </div>
                    @endif
                </div>




<!-- Add Informants-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        أضافة محلل جديد
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Informants.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="Name" class="mr-sm-2">أسم المحلل
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control border">
                            </div>
                            <div class="col-6">
                                <label for="Password" class="mr-sm-2">كود المحلل
                                    :</label>
                                <input type="number" class="form-control border" name="Password">
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
  <!-- End Add Informants-->

        </div>
    </div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
