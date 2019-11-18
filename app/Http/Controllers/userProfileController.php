<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class userProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('seeker');
    }

    public function index(){
        return view('profile.userContain');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone_number'=>'required|min:11|numeric',
            'experience'=>'required|min:20',
            'bio'=>'required|min:20',
        ]);
        $user_id = Auth()->User()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=> request('address'),
            'phone_number'=> request('phone_number'),
            'experience'=> request('experience'),
            'bio'=> request('bio'),

        ]);
        return redirect()->back()->with('message','Profile Update Successfully');
    }
    public function coverLetter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,doc,pptx,docx|max:2000'
        ]);
        $user_id = Auth()->User()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=> $cover
        ]);
        return redirect()->back()->with('message','Cover Letter Upload Successfully');
    }
    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,pptx,docx|max:2000'
        ]);
        $user_id = Auth()->User()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->with('message','Resume Upload Successfully');
    }
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:jpg,png,jpeg|max:2000'
        ]);
        $user_id = Auth()->User()->id;
     if($request->hasFile('avatar')){
         $file = $request->file('avatar');
         $text = $file->getClientOriginalExtension();
         $fileName = time().'.'.$text;
         $file->move('uploads/avatar',$fileName);
         Profile::where('user_id',$user_id)->update([
             'avatar' => $fileName
         ]);
     }
    return redirect()->back()->with('message','Avatar upload successfully');
    }
}
