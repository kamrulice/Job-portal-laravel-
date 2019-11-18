@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-dark text-center text-light mb-2" style="height:50px; padding:10px;  ">User Profile</div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    @if(empty(Auth::User()->profile->avatar))
                <img src="{{asset('avatar/logo.png')}}" width="100"  height="200" style="width:100%;"/>
                    @else
                        <img src="{{asset('uploads/avatar')}}\{{Auth::User()->profile->avatar}}" width="100"  height="200" style="width:100%;"/>
                    @endif
                <form action="{{route('profile/avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center">
                       Change Your Avatar
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar" class="form-control-file">
                        <br>
                        @if($errors->has('avatar'))
                            <div class="error text-danger">{{$errors->first('avatar')}}</div>
                        @endif
                        <button class="btn btn-dark btn-block" type="submit" name="btn">Update</button>
                    </div>

                </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <form action="{{route('profile/store')}}" method="post">
                        @csrf
                    <div class="card-header text-center">
                        Update Your Information
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="4">{{Auth::User()->profile->address}}</textarea>
                        </div>
                        @if($errors->has('address'))
                            <div class="error text-danger">{{$errors->first('address')}}</div>
                        @endif
                        <div class="form-group">
                            <label>Phone Number</label>
                           <input type="text" name="phone_number" class="form-control" value="{{Auth::User()->profile->phone_number}}"/>
                        </div>
                        @if($errors->has('phone_number'))
                            <div class="error text-danger">{{$errors->first('phone_number')}}</div>
                        @endif
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea class="form-control" name="experience" rows="4">{{Auth::User()->profile->experience}}</textarea>
                    </div>
                        @if($errors->has('experience'))
                            <div class="error text-danger">{{$errors->first('experience')}}</div>
                        @endif
                    <div class="form-group">
                        <label>BOIData</label>
                        <textarea class="form-control" name="bio" rows="4">{{Auth::User()->profile->bio}}</textarea>
                    </div>
                        @if($errors->has('bio'))
                            <div class="error text-danger">{{$errors->first('bio')}}</div>
                        @endif
                    <div class="form-group">
                        <label></label>
                         <button name="btn" type="submit" class="btn btn-dark btn-block">Submit</button>
                    </div>
                    </div>
                    </form>
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">{{Session::get('message')}}</div>
                        @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        User Description
                    </div>
                    <div class="card-body">
                        <p><b>Name: </b>{{Auth::User()->name}}</p>
                        <p><b>Email: </b>{{Auth::User()->email}}</p>
                        <p><b>Address: </b>{{Auth::User()->profile->address}}</p>
                        <p><b>Phone Number: </b>{{Auth::User()->profile->phone_number}}</p>
                        <p><b>Experience: </b>{{Auth::User()->profile->experience}}</p>
                        <p><b>BIO: </b>{{Auth::User()->profile->bio}}</p>
                        <p><b>Member Since: </b>{{Auth::User()->created_at->diffForHumans()}}</p>

                    <p>
                        @if(!empty(Auth::User()->profile->cover_letter))
                            <a href="{{Storage::url(Auth::User()->profile->cover_letter)}}" class="text-center">
                                Cover Letter   <i class="fa fa-file-download fa-1x"></i>
                            </a>
                            @else
                            Please upload your cover letter  <i class="fa fa-upload fa-1x"></i>
                        @endif
                    </p>
                    <p>
                        @if(!empty(Auth::User()->profile->resume))
                            <a href="{{Storage::url(Auth::User()->profile->resume)}}">
                                Resume letter<i class="fa fa-file-download fa-1x"></i>
                            </a>
                            @else
                            Please upload your resume letter <i class="fa fa-file-upload fa-1x"></i>
                        @endif
                    </p>
                </div>
                </div>
                <div class="card">
                    <form action="{{route('profile/coverletter')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header text-center">
                        Cover Letter
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_letter">
                        <br>
                        @if($errors->has('cover_letter'))
                            <div class="error text-danger">{{$errors->first('cover_letter')}}</div>
                        @endif
                        <button class="btn btn-dark btn-block" type="submit" name="btn">Update</button>
                    </div>

                    </form>
                </div>
                <div class="card">
                    <form action="{{route('profile/resume')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header text-center">
                         Resume
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume" class="form-control-file">
                        <br>
                        @if($errors->has('resume'))
                            <div class="error text-danger">{{$errors->first('resume')}}</div>
                        @endif
                        <button class="btn btn-dark btn-block" type="submit" name="btn">Update</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
