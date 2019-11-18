@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-secondary text-light text-center col-lg-12" style=" height:50px; padding: 10px;  ">Applicant List</div>
            <div class="col-md-12">
                @foreach($jobApplicants as $jobApplicant)
                <div class="card">
                    <div class="card-header text-center">{{$jobApplicant->title}}</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Cover letter</th>
                                <th>Resume</th>
                            </thead>
                            <tbody>
                            @foreach($jobApplicant->users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->address}}</td>
                                <td>{{$user->profile->phone_number}}</td>
                                <td>
                                    <a href="{{Storage::url($user->profile->resume)}}">
                                        Resume
                                    </a>
                                </td>
                                <td>
                                    <a href="{{Storage::url($user->profile->cover_letter)}}">
                                        Cover letter
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
