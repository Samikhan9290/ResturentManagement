@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Reservation</h4>

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>name </th>
                            <th> email </th>
                            <th> phone </th>
                            <th> Guest </th>
                            <th> date </th>
                            <th> time </th>
                            <th> message </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $reservation)
                            <tr>
                                <td> {{$reservation->id}} </td>
                                <td> {{$reservation->name}} </td>
                                <td> {{$reservation->email}} </td>
                                <td> {{$reservation->phone}} </td>
                                <td> {{$reservation->number}} </td>
                                <td> {{$reservation->date}} </td>
                                <td> {{$reservation->time}} </td>
                                <td> {{$reservation->message}} </td>
                                <td> <a href="{{url('/deleteReservation',$reservation->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
