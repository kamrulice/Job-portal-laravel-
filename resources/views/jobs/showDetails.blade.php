 @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success text-center">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header text-center">{{$jobs->title}}</div>

                <div class="card-body">
                    <p>
                    <h3>Description</h3>
                    {{$jobs->description}}
                </p>
                    <p>
                         <h3>Responsibilities</h3>
                        {{$jobs->roles}}
                </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Short Info</div>
                <div class="card-body">
                    <p>Company: <a href="{{route('company.index',[$jobs->company->id,$jobs->company->slug])}}">{{$jobs->company->cname}}</a></p>
                    <p>Address: {{$jobs->address}}</p>
                    <p>Position: {{$jobs->position}}</p>
                    <p>Type: {{$jobs->type}}</p>
                    <p>Date: {{$jobs->last_date}}</p>
                </div>
                @if(Auth::check() && Auth::user()->user_type=='seeker')
                @if(!$jobs->checkApplication())
                    <form action="{{route('job/apply',[$jobs->id])}}" method="post">
                        @csrf
                        <button class="btn btn-success btn-block">Apply Now</button>
                    </form>
                    @else
                    <button class="btn btn-danger btn-block">Already applied</button>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
