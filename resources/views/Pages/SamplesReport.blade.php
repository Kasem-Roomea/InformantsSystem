@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@section('title')
    تقارير العينات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> تقارير العينات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">التقارير والتصدير</a></li>
                <li class="breadcrumb-item active">تقارير العينات</li>
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

                    <form action="{{route('ReportDate')}}" method="POST" role="search" autocomplete="off">
                        @csrf
                        {{ csrf_field() }}


                        <div class="row">



                            <div class="col-3" id="start_at">
                              <input class="form-control border" value="{{ $start_at ?? '' }}" name="start_at"
                                     placeholder="من تاريخ" type="date" required>
                                </div><!-- input-group -->


                            <div class="col-3" id="end_at">
                              <input class="form-control border" value="{{ $end_at ?? '' }}" name="end_at"
                                     placeholder="الى تاريخ" type="date" required>
                            </div><!-- input-group -->

                            <div class="col-2">
                                <button type="submit" class="btn btn-block" style="height:
                                50px;background-color:#6c757d;color: white ">بحث</button>
                            </div>

                        </div>
                    </form>

                <br>



                @if (isset($details))
                    @php
                         $samples = $details;
                    @endphp
                    @else
                    @php
                        $samples = $all_samples;
                    @endphp

                @endif
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>نوع العينة</th>
                        <th>رقم العربة</th>
                        <th>أسم الحلل</th>
                        <th>تاريخ الاستلام </th>
                        <th>وقت الاستلام</th>
                        <th>الرطوبة</th>
                        <th>الوقت1</th>
                        <th>الفعالية</th>
                        <th>الوقت2</th>
                        <th>القلوية</th>
                        <th>الوقت3</th>
                        <th>الخشانة</th>
                        <th>النعومة</th>
                        <th>تربولي</th>
                        <th>الأماهة</th>
                        <th>الملاحظات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach ($samples as $Sample)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $Sample->id }}</td>
                                <td>{{ $Sample->Classes->Name}}</td>
                                <td>{{ $Sample->cartNumber}}</td>
                                <td>{{ $Sample->Informants->Name}}</td>
                                <td>{{ date('d-m-Y', strtotime($Sample->dateReceipt))}}</td>
                                <td>{{ date('h:i:m', strtotime($Sample->hisReceipt))}}</td>
                                <td>{{ $Sample->moisture }}</td>
                                <td>{{ date('h:i:m', strtotime($Sample->dateMoisture))}}</td>
                                <td>{{ $Sample->Effectiveness }}</td>
                                <td>{{ date('h:i:m', strtotime($Sample->dateEffectiveness))}}</td>
                                <td>{{ $Sample->alkaline }}</td>
                                <td>{{ date('h:i:m', strtotime($Sample->dateAlkaline))}}</td>
                                <td>{{ $Sample->roughness }}</td>
                                <td>{{ $Sample->softness }}</td>
                                <td>{{ $Sample->treboli }}</td>
                                <td>{{ $Sample->rehydration }}</td>
                                <td>{{ $Sample->Notes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script>

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );

            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
    </script>



    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

@endsection
