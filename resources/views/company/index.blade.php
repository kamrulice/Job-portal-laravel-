@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="company-profile">
                 @if(empty(Auth()->user()->company->cover_photo))
                     <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="100" height="200">
                     @else
                     <img src="{{asset('uploads/cover')}}/{{Auth()->user()->company->cover_photo}}" width="1000px" height="300">
                     @endif
             </div>
            <div class="company-description"><br>
                @if(empty(Auth()->user()->company->logo))
                    <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="100" height="200"/>
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth()->user()->company->logo}}" width="100" height="200">
                @endif
                <h1>{{$company->cname}}</h1>
                <p>{{$company->description}}</p>

                    <p><b>Slogan:</b>&nbsp;{{$company->slogan}}</p>
                <p><b>Address:</b>&nbsp;{{$company->address}}</p>
                <p><b>Phone:</b>&nbsp;{{$company->phone}}</p>
                <p><b>Website:</b>&nbsp;{{$company->website}}</p>

            </div>
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
                @foreach($company->jobs as $job)
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
