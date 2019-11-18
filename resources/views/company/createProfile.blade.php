@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-dark text-center text-light mb-2" style="height:50px; padding:10px;  ">Company Profile</div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    @if(empty(Auth::User()->company->logo))
                        <img src="{{asset('avatar/logo.png')}}" width="100"  height="200" style="width:100%;"/>
                    @else
                        <img src="{{asset('uploads/avatar')}}/{{Auth::User()->company->logo}}" width="100"  height="200" style="width:100%;"/>
                    @endif
                    <form action="{{route('company/logo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">
                            Change Your Company Logo
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="logo" class="form-control-file">
                            <br>
                            @if($errors->has('logo'))
                                <div class="error text-danger">{{$errors->first('logo')}}</div>
                            @endif
                            <button class="btn btn-dark btn-block" type="submit" name="btn">Update</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <form action="{{route('company/register')}}" method="post">
                        @csrf
                        <div class="card-header text-center">
                            Update Your Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" rows="4">{{Auth::User()->company->address}}</textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error text-danger">{{$errors->first('address')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{Auth::User()->company->phone}}"/>
                            </div>
                            @if($errors->has('phone'))
                                <div class="error text-danger">{{$errors->first('phone')}}</div>
                            @endif
                            <div class="form-group">
                                <label>website</label>
                                <input type="text" name="website" class="form-control" value="{{Auth::User()->company->website}}"/>
                            </div>
                            @if($errors->has('website'))
                                <div class="error text-danger">{{$errors->first('website')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Slogan</label>
                                <input type="text" name="slogan" class="form-control" value="{{Auth::User()->company->slogan}}"/>
                            </div>
                            @if($errors->has('slogan'))
                                <div class="error text-danger">{{$errors->first('slogan')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{Auth::User()->company->description}}</textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error text-danger">{{$errors->first('description')}}</div>
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
                       Company Description
                    </div>
                    <div class="card-body">
                        <p><b>Company Name:</b>&nbsp;{{Auth::User()->company->cname}}</p>
                        <p><b>Address:</b>&nbsp;{{Auth::User()->company->address}}</p>
                        <p><b>Company Page:</b>&nbsp;<a href="company/{{Auth::user()->company->slug}}">View</a></p>
                        <p><b>Email Address:</b>&nbsp;{{Auth::User()->email}}</p>
                        <p><b>Phone Number:</b>&nbsp;{{Auth::User()->company->phone}}</p>
                        <p><b>Website:</b>&nbsp;{{Auth::User()->company->website}}</p>
                        <p><b>Slogan:</b>&nbsp;{{Auth::User()->company->slogan}}</p>
                        <p><b>Description:</b>&nbsp;{{Auth::User()->company->description}}</p>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('company/coverPhoto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">
                           Company Cover Photo
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo">
                            <br>
                            @if($errors->has('cover_photo'))
                                <div class="error text-danger">{{$errors->first('cover_photo')}}</div>
                            @endif
                            <button class="btn btn-dark btn-block" type="submit" name="btn">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
