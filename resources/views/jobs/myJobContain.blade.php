@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header text-center bg-secondary text-white">Job List</div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th width="5%">ID</th>
                            <th width="10%">Logo</th>
                            <th width="20%">Position</th>
                            <th width="10%">Job Type</th>
                            <th width="15%">Address</th>
                            <th width="10%">Date</th>
                            <th width="20%">Action</th>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{$job->id}}</td>
                                    <td><img src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" width="80" /></td>
                                    <td>{{$job->position}}</td>>
                                    <td><li class="fa fa-clock"></li>&nbsp{{$job->type}} </td>
                                    <td><li class="fa fa-map-marker"></li>&nbsp{{$job->address}}</td>
                                    <td><li class="fa fa-calendar-check"></li>&nbsp{{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('jobs.showDetails',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success">Apply</button>
                                        </a>
                                        <a href="{{route('jobs/edit',[$job->id,$job->slug])}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                        <a href="{{route('jobs/delete',[$job->id,$job->slug])}}" onclick="return confirm('Are sure want to delete post ?')">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
