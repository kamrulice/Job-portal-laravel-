 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
                @foreach($jobs as $job)
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
        </div>
    <div class="text-center"><a href="{{route('all/jobs')}}">
            <button class="btn btn-secondary btn-block">Brose All Jobs</button>
        </a></div><br>
    <div><button class="btn btn-success btn-block">Features Companies</button></div>
    </div>
<div class="container">
    <div class="row">

        @foreach($companies as $company)
            <div class="col-lg-3">
                <div class="card" style="width:20rem; ">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{str_limit($company->description,30)}}</p>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Vist Company</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection



