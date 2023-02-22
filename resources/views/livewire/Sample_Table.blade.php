@can('أضافة عينات')
<button class="btn text-white btn-lg pull-right col-12 mb-2" wire:click="showForm" type="button" style="background-color:
#071689">أضافة
    عينة</button><br><br>
@endcan


<div class="table-responsive" wire:poll ="render">
    <input type="text" class="form-control border col-1" wire:model="search"
           style="font-size: 20px;box-shadow: 12px 12px 2px 1px rgba(0, 0, 20, .2);border: 5px solid #000000;">
    <br>
    <table id="datatable" class="table table-hover table-sm table-bordered p-0 " data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-primary" style="font-size: 20px">
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
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($Samples as $Sample)
            <tr style="font-size: 15px;" class="font-bold">
                <?php $i++; ?>
                <td >{{ $Sample->id }}</td>
                <td>{{ $Sample->Classes->Name}}</td>
                <td>{{ $Sample->cartNumber}}</td>
                <td>{{ $Sample->Informants->Name}}</td>
                <td>{{ date('d-m-Y', strtotime($Sample->dateReceipt))}}</td>
                <td>{{ date('h:i:m a', strtotime($Sample->hisReceipt))}}</td>
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
                <td>
                    @can('تعديل عينات')
                        <button wire:click="edit({{ $Sample->id }})" title="تعديل" class="btn btn-info btn-sm"><i
                                class="fa fa-edit"></i></button>
                    @endcan
                    @can('حذف عينات')
                         <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $Sample->id }})"
                                 title="حذف"><i class="fa fa-trash"></i></button>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
</div>
