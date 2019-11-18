<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;

class companyController extends Controller
{
    public function __construct()
    {
        //$this->middleware('employer',['except'=>array('index')]);
    }

    public function index($id){
        $company = Company::find($id);

        return view('company.index',compact('company'));
    }
    public function createProfile(){
        return view('company.createProfile');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required',
            'website'=>'required',
            'slogan'=>'required',
            'description'=>'required',
        ]);
        $user_id = Auth::User()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);
        return redirect()->back()->with('message','profile update successfully');
    }
    public function coverPhoto(Request $request){
        $this->validate($request,[
            'cover_photo'=>'required|mimes:jpg,png,jpeg|max:6000'
        ]);
        $user_id = Auth::User()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/cover',$fileName);
        Company::where('user_id',$user_id)->update([
        'cover_photo' =>  $fileName,
        ]);}
        return redirect()->back()->with('message','profile update successfully');
    }
    public function CompanyLogo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:jpg,png,jpeg|max:6000'
        ]);
        $user_id = Auth::user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
            Company::where('user_id',$user_id)->update([
                'logo'=>  $fileName
            ]);
        }
        return redirect()->back()->with('message','profile update successfully');
    }
}
