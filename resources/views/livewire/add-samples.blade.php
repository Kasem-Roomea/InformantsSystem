 <div >

     <!-- Alert Warning-->
        @if (!empty($successMessage))
            <div class="alert alert-info" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $successMessage }}
            </div>
        @endif

        @if ($catchError)
            <div class="alert alert-danger" id="success-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $catchError }}
            </div>
        @endif

        @if (!empty($DeleteMessage))
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $DeleteMessage }}
        </div>
    @endif
    <!-- Alert Warning-->



     <!-- Check ShowTable  -->
@if($show_table)

    @include('livewire.Sample_Table')

    @else


    @include('livewire.Show_Form')

@endif



</div>

