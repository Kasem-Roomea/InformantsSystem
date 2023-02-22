<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class classesController extends Controller
{

    // Security Link With Permission
    function __construct()
    {
        $this->middleware('permission:مشاهدة الأصناف', ['only' => ['index']]);
        $this->middleware('permission:أضافة الأصناف', ['only' => ['store']]);
        $this->middleware('permission:تعديل الأصناف', ['only' => ['update']]);
        $this->middleware('permission:حذف الأصناف', ['only' => ['destroy']]);
    }

    //Get Classes
    public function index()
    {
        $classes = Classes::all();
        return view('Pages.Classes' , compact('classes'));
    }


    public function create()
    {
        //
    }

    //Store Classes
    public function store(Request $request)
    {
        $messages = [
            'Name.required' => 'أسم الصنف مطلوب',
            'Name.unique' => 'أسم الصنف مسجل مسبقا',
        ];
        $rule =[
            'Name'=>'required|unique:classes,Name',
        ];
        $validated = $request->validate($rule , $messages);


        Classes::create([
            'Name'=> $request->Name,
        ]);
        toastr()->info('تم أضافة الصنف بنجاح');
        return redirect('Classes');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    //Update Class
    public function update(Request $request)
    {
        $messages = [
            'Name.required' => 'أسم الصنف مطلوب',
            'Name.unique' => 'أسم الصنف مسجل مسبقا',
        ];
        $rule =[
            'Name'=>'required|unique:classes,Name,'.$request->id
        ];
        $validated = $request->validate($rule , $messages);
        $classUpdate = Classes::findOrFail($request->id);

        $classUpdate->update([
            'Name'=> $request->Name,
        ]);
        toastr()->info('تم تعديل الصنف بنجاح');
        return redirect('Classes');
    }

    //Delete Class
    public function destroy(Request $request)
    {
        $class = Classes::findOrFail($request->id);
        $class->delete();
        toastr()->error('تم حذف الصنف بنجاح');
        return redirect('Classes');
    }
}
