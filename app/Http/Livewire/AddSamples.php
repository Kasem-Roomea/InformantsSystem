<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Informants;
use App\Models\Samples;
use Livewire\Component;
use PhpParser\Node\Expr\New_;

class AddSamples extends Component
{
    public $show_table = true , $successMessage = '',$catchError = '' , $updateMode = false , $DeleteMessage ='';

    public $classes_id,$informants_id, $Password,$cartNumber ,$dateReceipt ,$hisReceipt, $moisture ,
        $dateMoisture, $Effectiveness, $dateEffectiveness,
        $alkaline, $dateAlkaline, $roughness, $softness, $treboli, $rehydration, $Notes , $sample_id;

    public $search = '';


    //Real Time Validate Samples
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName, [
            'classes_id' => 'required',
            'informants_id' => 'required',
            'Password' => 'required',
            'cartNumber' => 'required',
            'dateReceipt' => 'required',
            'hisReceipt' => 'required',
            'moisture' => 'required',
            'dateMoisture' => 'required',
            'Effectiveness' => 'required',
            'dateEffectiveness' => 'required',
            'alkaline' => 'required',
            'dateAlkaline' => 'required',
        ]);
    }



    //Set Date In Input When Write
    public function Date0()
    {
        if(!$this->updateMode)
        {
            $this->dateReceipt =date_format(now(), 'Y/m/d');
            $this->hisReceipt =date_format(now(), 'H:i:s');
        }
    }
    public function Date1()
    {
        if(!$this->updateMode) {
            $this->dateMoisture = date_format(now(), 'H:i:s');
        }
    }
    public function Date2()
    {
        if(!$this->updateMode){
            $this->dateEffectiveness =date_format(now(), 'H:i:s');
        }

    }
    public function Date3()
    {
        if(!$this->updateMode) {
            $this->dateAlkaline = date_format(now(), 'H:i:s');
        }
    }



    //Store Samples
    public function Submit()
    {
        try{
            $this->validate([
                'classes_id' => 'required',
                'informants_id' => 'required',
                'Password' => 'required',
                'cartNumber' => 'required',
                'dateReceipt' => 'required',
                'hisReceipt' => 'required',
                'moisture' => 'required',
                'dateMoisture' => 'required',
                'Effectiveness' => 'required',
                'dateEffectiveness' => 'required',
                'alkaline' => 'required',
                'dateAlkaline' => 'required',
            ]);

            $informant = Informants::findOrFail($this->informants_id);

            if($informant->Password != $this->Password)
            {
                $this->catchError = 'الكود غير متطابق مع المحلل المدخل للعينة!' ;
                $this->successMessage = '';
            }

            else
                {
                    $MySamples = new Samples();
                    $MySamples->classes_id = $this->classes_id;
                    $MySamples->informants_id = $this->informants_id;
                    $MySamples->cartNumber = $this->cartNumber;
                    $MySamples->dateReceipt = $this->dateReceipt;
                    $MySamples->hisReceipt = $this->hisReceipt;
                    $MySamples->moisture = $this->moisture;
                    $MySamples->dateMoisture = $this->dateMoisture;
                    $MySamples->Effectiveness = $this->Effectiveness;
                    $MySamples->dateEffectiveness = $this->dateEffectiveness;
                    $MySamples->alkaline = $this->alkaline;
                    $MySamples->dateAlkaline = $this->dateAlkaline;
                    $MySamples->roughness = $this->roughness;
                    $MySamples->softness = $this->softness;
                    $MySamples->treboli = $this->treboli;
                    $MySamples->rehydration = $this->rehydration;
                    $MySamples->Notes = $this->Notes;
                    $MySamples->save();
                    $this->successMessage = "تمت أضافة العينة بنجاح";
                    $this->catchError = "";
                    $this->show_table = true;
                    $this->clearForm();
                }

         }
            catch (\Exception $e)
            {
                $this->catchError = $e->getMessage();
                $this->successMessage = '';
             };

    }



    //Update Samples
    public function Update()
    {
        try{
            $this->validate([
                'classes_id' => 'required',
                'informants_id' => 'required',
                'cartNumber' => 'required',
                'dateReceipt' => 'required',
                'hisReceipt' => 'required',
                'moisture' => 'required',
                'dateMoisture' => 'required',
                'Effectiveness' => 'required',
                'dateEffectiveness' => 'required',
                'alkaline' => 'required',
                'dateAlkaline' => 'required',
            ]);

            $MySamples = Samples::where('id',$this->sample_id)->first();
            $MySamples->update([
            'classes_id' => $this->classes_id,
            'informants_id' => $this->informants_id,
            'cartNumber' => $this->cartNumber,
            'dateReceipt' => $this->dateReceipt,
            'hisReceipt' => $this->hisReceipt,
            'moisture' => $this->moisture,
            'dateMoisture' => $this->dateMoisture,
            'Effectiveness' => $this->Effectiveness,
            'dateEffectiveness' => $this->dateEffectiveness,
            'alkaline' => $this->alkaline,
            'dateAlkaline' => $this->dateAlkaline,
            'roughness' => $this->roughness,
            'softness' => $this->softness,
            'treboli' => $this->treboli,
            'rehydration' => $this->rehydration,
            'Notes' => $this->Notes
            ]);
            $this->successMessage = "تمت تعديل العينة بنجاح";
            $this->catchError = "";
            $this->show_table = true;
            $this->updateMode = false;
            $this->clearForm();
         }
            catch (\Exception $e)
            {
                $this->catchError = $e->getMessage();
                $this->successMessage = '';
             };

    }



    //Show Info Samples For Update
    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = Samples::where('id',$id)->first();
        $this->sample_id = $id;
        $this->classes_id = $My_Parent->classes_id;
        $this->informants_id = $My_Parent->informants_id;
        $this->cartNumber = $My_Parent->cartNumber;
        $this->dateReceipt = $My_Parent->dateReceipt;
        $this->hisReceipt = $My_Parent->hisReceipt;;
        $this->moisture = $My_Parent->moisture;
        $this->dateMoisture =$My_Parent->dateMoisture;
        $this->Effectiveness = $My_Parent->Effectiveness;
        $this->dateEffectiveness = $My_Parent->dateEffectiveness;
        $this->alkaline = $My_Parent->alkaline;
        $this->dateAlkaline = $My_Parent->dateAlkaline;
        $this->roughness =$My_Parent->roughness;
        $this->softness =$My_Parent->softness;
        $this->treboli = $My_Parent->treboli;
        $this->rehydration = $My_Parent->rehydration;
        $this->Notes = $My_Parent->Notes;

    }



    //Delete Samples
    public function delete($id){

        Samples::findOrFail($id)->delete();
        $this->DeleteMessage = "تمت حذف العينة بنجاح";
        $this->catchError = "";
        $this->show_table = false;
        $this->show_table = true;

    }





    //Show Form Input For Store Or Update
    public function showForm()
    {
        $this->show_table = false;
        $this->DeleteMessage = '';
        $this->successMessage = '';
        $this->catchError = '';
    }


    //Show Table Samples
    public function showTable()
    {
        $this->show_table = true;
        $this->successMessage = '';
        $this->DeleteMessage = '';
        $this->catchError = '';
        $this->clearForm();
    }


    //Clear Input Date
    public function clearForm()
    {
        $this->classes_id = '';
        $this->informants_id = '';
        $this->cartNumber = '';
        $this->dateReceipt = '';
        $this->hisReceipt = '';
        $this->moisture = '';
        $this->dateMoisture ='';
        $this->Effectiveness = '';
        $this->dateEffectiveness = '';
        $this->alkaline = '';
        $this->dateAlkaline= '';
        $this->roughness ='';
        $this->softness ='';
        $this->treboli = '';
        $this->rehydration = '';
        $this->Notes = '';

    }








    public function render()
    {
        if($this->search ==="")
        {
            $Samples = Samples::orderByDesc('id')->get();
        }
        else
            {
                $Samples = Samples::where('id' , $this->search)->orderByDesc('id')->get();
                if(!$Samples)
                {
                    $Samples = Samples::orderByDesc('id')->get();
                }
            }
        return view('livewire.add-samples' , [
            'Samples' => $Samples ,
            'Informants' => Informants::all(),
            'Classes' => Classes::all(),
        ]);
    }
}
