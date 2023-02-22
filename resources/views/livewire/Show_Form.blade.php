

<button class="btn btn-danger btn-sm btn-lg pull-right" wire:click="showTable" type="button">رجوع</button><br><br>
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col-3">
                        <label for="classes_id">نوع العينة</label>
                        <select class="form-control my-1 mr-sm-2 p-0 border" wire:model="classes_id">
                            <option selected>أخترصنف العينة..</option>
                            @foreach($Classes as $Class)
                                <option value="{{$Class->id}}">{{$Class->Name}}</option>
                            @endforeach
                        </select>
                        @error('classes_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="cartNumber">رقم العربة</label>
                        <input type="number" wire:model="cartNumber" class="form-control border">
                        @error('cartNumber')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="informants_id">المحلل</label>
                        <select class="form-control my-1 mr-sm-2 p-0 border" wire:model="informants_id" wire:change="Date0">
                            <option selected>أخترمحلل..</option>
                            @foreach($Informants as $Informant)
                                <option value="{{$Informant->id}}">{{$Informant->Name}}</option>
                            @endforeach
                        </select>
                        @error('informants_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="Password">كود المحلل</label>
                        <input type="password" wire:model="Password" class="form-control border" required autocomplete="off">
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                      </div>

                <div class="form-row">
                    <div class="col-6">
                        <label for="dateReceipt">تاريخ الأستلام</label>
                        <input type="data" wire:model="dateReceipt" class="form-control border" disabled="disabled">
                        @error('dateReceipt')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="hisReceipt">وقت الاستلام</label>
                        <input type="text" wire:model="hisReceipt" class="form-control border" disabled="disabled">
                        @error('hisReceipt')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="moisture">الرطوبة</label>
                        <input  type="number" wire:model="moisture" class="form-control border" Wire:Keyup="Date1">
                        @error('moisture')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="dateMoisture" >وقت الرطوبة</label>
                        <input  disabled="disabled" type="text" wire:model="dateMoisture" class="form-control border">
                        @error('dateMoisture')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-6">
                        <label for="Effectiveness">الفعالية</label>
                        <input type="number" wire:model="Effectiveness" class="form-control border" Wire:Keyup="Date2">
                        @error('Effectiveness')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="dateEffectiveness">وقت الفعالية</label>
                        <input  disabled="disabled" type="text" wire:model="dateEffectiveness" class="form-control
                         border">
                        @error('dateEffectiveness')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="alkaline">القلوية</label>
                        <input type="number" wire:model="alkaline" class="form-control border" Wire:Keyup="Date3">
                        @error('alkaline')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="dateAlkaline">وقت القلوية</label>
                        <input  disabled="disabled" type="text" wire:model="dateAlkaline"
                               class="form-control border">
                        @error('dateAlkaline')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="roughness">الخشانة</label>
                        <input type="number" wire:model="roughness" class="form-control border">
                        @error('roughness')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="softness">النعومة</label>
                        <input type="number" wire:model="softness" class="form-control border">
                        @error('softness')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="treboli">التربولي</label>
                        <input type="number" wire:model="treboli" class="form-control border">
                        @error('treboli')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="rehydration">الأماهة</label>
                        <input type="number" wire:model="rehydration" class="form-control border">
                        @error('rehydration')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="Notes">الملاحظات</label>
                        <input type="text" wire:model="Notes" class="form-control border">

                        <input type="hidden" wire:model="sample_id" >
                        @error('Notes')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                @if($updateMode)
                    <button class="btn text-white nextBtn btn-lg pull-right col-12" type="button"
                            wire:click="Update" style="background-color: #071689">تعديل العينة</button>
                   @else
                    <button class="btn text-white nextBtn btn-lg pull-right col-12" type="button"
                            wire:click="Submit" style="background-color: #071689">أدخال العينة</button>
                @endif

            </div>
        </div>

