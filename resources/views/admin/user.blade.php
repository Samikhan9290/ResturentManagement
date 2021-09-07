@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All users</h4>

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                        <tr>
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            @if($user->userType=="0")
                            <td><a class="btn btn-danger" href="{{url('/deleteUSer',$user->id)}}">Delete</a></td>
                            @else
                            <td>Not Allowed</td>
                            @endif
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
