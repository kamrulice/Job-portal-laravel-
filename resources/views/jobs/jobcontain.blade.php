@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-secondary text-center text-light" style="height: 43px; padding: 10px;">Job Post Form</div>
                <div class="card">
                    <div class="card-header">
                        @if(Session::has('message'))
                            <div class="alert alert-success text-center">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" action="{{route('job/save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control"/>
                                    <span class="text-danger font-bold">{{$errors->has('title')? $errors->first('title'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Roles</label>
                                <div class="col-sm-10">
                                    <input type="text" name="roles" class="form-control"/>
                                    <span class="text-danger font-bold">{{$errors->has('roles')? $errors->first('roles'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                    <span class="text-danger font-bold">{{$errors->has('description')? $errors->first('description'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Category Name</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control">
                                        <option>Select category Name</option>
                                        @foreach(App\Category::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger font-bold">{{$errors->has('description')? $errors->first('description'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" name="position" class="form-control"/>
                                    <span class="text-danger font-bold">{{$errors->has('position')? $errors->first('position'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" rows="5"></textarea>
                                    <span class="text-danger font-bold">{{$errors->has('address')? $errors->first('address'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option>Select Job type</option>
                                         <option value="fulltime">Full Time</option>
                                         <option value="parttime">part Time</option>
                                         <option value="casual">Casual</option>
                                    </select>
                                    <span class="text-danger font-bold">{{$errors->has('type')? $errors->first('type'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option>Select Job Status</option>
                                        <option value="live">live</option>
                                        <option value="draft">draft</option>
                                    </select>
                                    <span class="text-danger font-bold">{{$errors->has('type')? $errors->first('type'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Apply Deadline</label>
                                <div class="col-sm-10">
                                    <input type="date" name="last_date" class="form-control"/>
                                    <span class="text-danger font-bold">{{$errors->has('last_date')? $errors->first('last_date'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-dark btn-block" type="submit" name="btn">Post Job Info</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
