@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All orders</h4>

                <form action="{{'/search'}}" method="get">
                    @csrf
                    <input type="text" name="search" style="color: black">
                    <input type="submit" value="search" class="btn btn-success">
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> Sno </th>
                            <th> Food Name </th>
                            <th> Price </th>
                            <th> Quantity </th>/
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Address </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $order)
                            <tr>
                                <td> {{$order->id}} </td>
                                <td> {{$order->foodName}} </td>
                                <td>RS:  {{$order->price * $order->quantity}} </td>
                                <td> {{$order->quantity}} </td>
                                <td> {{$order->name}} </td>
                                <td> {{$order->phone}} </td>
                                <td> {{$order->address}} </td>


                                <td> <a href="{{url('/chefsDelete',$order->id)}}" class="btn btn-danger">Delete</a></td>
{{--                                <td> <a href="{{url('/EditChef',$chef->id)}}" class="btn btn-success">Edit</a></td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
