@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('all/jobs')}}" method="get">

            <div class="form-inline">
                <div class="form-group">
                    <label>Keyword</label>&nbsp;&nbsp;
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">&nbsp;&nbsp;
                    <label>Employement type</label>&nbsp;&nbsp;
                    <select name="type" class="form-control">
                        <option>Select Job type</option>
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">part Time</option>
                        <option value="casual">Casual</option>
                    </select>
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <label>Category</label>&nbsp;&nbsp;
                    <select name="category_id" class="form-control">
                        <option>Select category Name</option>
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <label>Adress</label>&nbsp;&nbsp;
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                <th width="5%">ID</th>
                <th width="10%">Logo</th>
                <th width="20%">Position</th>
                <th width="10%">Job Type</th>
                <th width="25%">Address</th>
                <th width="10%">Date</th>
                <th width="10%">Action</th>
                </thead>
                <tbody>
                @foreach($allJobs as $job)
                    <tr>
                        <td>{{$job->id}}</td>
                        <td><img src="{{asset('avatar/logo.png')}}" width="80" /></td>
                        <td>{{$job->position}}</td>>
                        <td><li class="fa fa-clock"></li>&nbsp{{$job->type}} </td>
                        <td><li class="fa fa-map-marker"></li>&nbsp{{$job->address}}</td>
                        <td><li class="fa fa-calendar-check"></li>&nbsp{{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('jobs.showDetails',[$job->id,$job->slug])}}">
                                <button class="btn btn-success">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center"> {{$allJobs->links()}} </div>
        </div>
    </div>
        @endsection
