<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Informants;
use Illuminate\Http\Request;

class informantsController extends Controller
{

    // Security Link With Permission
    function __construct()
    {
        $this->middleware('permission:مشاهدة المحللين', ['only' => ['index']]);
        $this->middleware('permission:أضافة محللين', ['only' => ['store']]);
        $this->middleware('permission:تعديل المحللين', ['only' => ['update']]);
        $this->middleware('permission:حذف المحللين', ['only' => ['destroy']]);
    }


    //Get Informants
    public function index()
    {
        $informants = Informants::all();
        return view('Pages.Informants' , compact('informants'));
    }


    public function create()
    {
        //
    }

    //Store Informants
    public function store(Request $request)
    {
        $messages = [
            'Name.required' => 'أسم المحلل مطلوب',
            'Name.unique' => 'أسم المحلل مسجل مسبقا',
        ];
        $rule =[
            'Name'=>'required|unique:informants,Name',
        ];
        $validated = $request->validate($rule , $messages);


        Informants::create([
            'Name'=> $request->Name,
            'Password'=> $request->Password,
        ]);
        toastr()->info('تم أضافة المحلل بنجاح');
        return redirect('Informants');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    //Update Informants
    public function update(Request $request, $id)
    {
        $messages = [
            'Name.required' => 'أسم المحلل مطلوب',
            'Name.unique' => 'أسم المحلل مسجل مسبقا',
        ];
        $rule =[
            'Name'=>'required|unique:informants,Name,'.$request->id
        ];
        $validated = $request->validate($rule , $messages);
        $InformantsUpdate = Informants::findOrFail($request->id);

        $InformantsUpdate->update([
            'Name'=> $request->Name,
            'Password'=> $request->Password,
        ]);
        toastr()->info('تم تعديل معلومات المحلل بنجاح');
        return redirect('Informants');
    }


    //Delete Informants
    public function destroy(Request $request)
    {
        $Informant = Informants::findOrFail($request->id);
        $Informant->delete();
        toastr()->error('تم حذف المحلل بنجاح');
        return redirect('Informants');
    }
}
