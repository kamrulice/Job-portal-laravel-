@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if(Session::has('message'))
                            <div class="alert alert-success text-center">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" action="{{route('job/update')}}" method="post" enctype="multipart/form-data" name="editFormById">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" value="{{ $editJobById->title}}"/>
                                    <input type="hidden" name="id" class="form-control" value="{{ $editJobById->id}}"/>
                                    <span class="text-danger font-bold">{{$errors->has('title')? $errors->first('title'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Roles</label>
                                <div class="col-sm-10">
                                    <input type="text" name="roles" class="form-control"  value="{{ $editJobById->roles}}"/>
                                    <span class="text-danger font-bold">{{$errors->has('roles')? $errors->first('roles'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="5">{{ $editJobById->description}}</textarea>
                                    <span class="text-danger font-bold">{{$errors->has('description')? $errors->first('description'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Category Name</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control">
                                        <option>--Select Category--</option>
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
                                    <input type="text" name="position" class="form-control" value="{{ $editJobById->position}}"/>
                                    <span class="text-danger font-bold">{{$errors->has('position')? $errors->first('position'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control">{{ $editJobById->address}}</textarea>
                                    <span class="text-danger font-bold">{{$errors->has('address')? $errors->first('address'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Job Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option value="fulltime">--Select job type--</option>
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
                                        <option value="live">--Select job status--</option>
                                        <option value="live">live</option>
                                        <option value="draft">draft</option>
                                    </select>
                                    <span class="text-danger font-bold">{{$errors->has('type')? $errors->first('type'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Apply Deadline</label>
                                <div class="col-sm-10">
                                    <input type="date" name="last_date" class="form-control" value="{{ $editJobById->last_date}}"/>
                                    <span class="text-danger font-bold">{{$errors->has('last_date')? $errors->first('last_date'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-dark btn-block" type="submit" name="btn">Update Job Info</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editFormById'].elements['category'].value = '{{ $editJobById->category}}';
        document.forms['editFormById'].elements['status'].value = '{{ $editJobById->status}}';
        document.forms['editFormById'].elements['type'].value = '{{ $editJobById->type}}';
    </script>
@endsection
