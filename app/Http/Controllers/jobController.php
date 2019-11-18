<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobPostRequest;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\User;
use DB;
//use Illuminate\Support\Facades\Auth;

class jobController extends Controller
{
    public function __construct()
    {
       // $this->middleware('employer',['except'=>array('index')]);
    }

    public function index(){
        $jobs =  Job::all()->take(10);
        $companies = Company::paginate(12);
        return view('welcome',['jobs'=>$jobs,'companies'=>$companies]);
    }
    public function allJobs(Request $request){
        $keyword = request('title');
        $type = request('type');
        $category_id = request('category_id');
        $address = request('address');
        if($keyword || $type || $category_id || $address){
            $allJobs = Job::where('title','LIKE','%'.$keyword.'%')
                        ->orwhere('type',$type)
                        ->orwhere('category_id',$category_id)
                        ->orwhere('address',$address)
                        ->paginate(10);
            return view('jobs.allJobsContain',compact('allJobs'));
        }else{
            $allJobs = Job::paginate(10);
            return view('jobs.allJobsContain',compact('allJobs'));
        }
    }

    public function showDetails($id){
        $jobs = Job::find($id);
        return view('jobs.showDetails',compact('jobs'));
    }
//    public function showDetails($id){
//     $showDetails = DB::table('jobs')
//               ->join('companies','jobs.company_id','=','companies.id')
//               ->select('jobs.*','companies.cname')
//               ->where('jobs.id',$id)
//               ->first();
//       return view('jobs.showDetails',['showDetails'=> $showDetails]);
//    }
public function jobCreate(){
        return view('jobs.jobcontain');
}
public function jobStore(Request $request){
        $user_id = Auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' =>  $user_id,
            'company_id' =>  $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
        ]);
        return redirect()->back()->with('message','job posted successfully');
}

public function myJobs(){
       $jobs =  Job::where('user_id',auth()->user()->id)->get();
       return view('jobs.myJobContain',compact('jobs'));

        }
        public function editJob($id){
            $editJobById = Job::find($id);
            return view('jobs.editJobContain',compact('editJobById'));
        }
        public function updateJob(Request $request){
            $user_id = Auth()->user()->id;
            $company = Company::where('user_id',$user_id)->first();
            $company_id = $company->id;
                $jobById = Job::where('id',$request->id)->first();
                $jobById->title = $request->title;
            $jobById->user_id = $user_id;
            $jobById->company_id = $company_id;
            $jobById->title = $request->title;
            $jobById->slug = str_slug($request->title);
            $jobById->roles = $request->roles;
            $jobById->description = $request->description;
            $jobById->position = $request->position;
            $jobById->address = $request->address;
            $jobById->type = $request->type;
            $jobById->status = $request->status;
            $jobById->last_date = $request->last_date;
            $jobById->save();
            return redirect('my/job')->with('message','job post update successfully');
        }
        public function deleteJob($id){
            $jobDeleteById = Job::find($id);
            $jobDeleteById->delete();
            return redirect('my/job')->with('message','job post delete successfully');
        }
        public function applyJob(Request $request, $id){
            $jobsById = Job::find($id);
            $jobsById->users()->attach(Auth()->user()->id);
            return redirect()->back()->with('message','job applied successfully');

        }
        public function jobApplicant(){
            $jobApplicants = Job::has('users')
                ->where('user_id',auth()->user()->id)->get();
            return view('jobs.applicantContain',compact('jobApplicants'));
        }
}
