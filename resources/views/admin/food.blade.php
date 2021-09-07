@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add food menu</h4>

                <form class="forms-sample" action="{{url('uploadFood')}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Add title">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Add price">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="description">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Food</h4>

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Title </th>
                            <th> price </th>
                            <th> image </th>
                            <th> description </th>
                            <th> delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $food)
                            <tr>
                                <td> {{$food->id}} </td>
                                <td> {{$food->title}} </td>
                                <td> {{$food->price}} </td>
                                <td><img src="/foodImage/{{$food->image}}"></td>
                                <td> {{$food->description}} </td>
                                <td> <a href="{{url('/foodDelete',$food->id)}}" class="btn btn-danger">Delete</a></td>
                                <td> <a href="{{url('/EditFood',$food->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
