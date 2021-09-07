@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add chefs</h4>

                <form class="forms-sample" action="{{url('uploadChef')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Chef name">
                    </div>
                    <div class="form-group">
                        <label for="price">Expert</label>
                        <input type="text" class="form-control" id="expert" name="expert" placeholder="Expert">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Chefs</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> Sno </th>
                            <th> name </th>
                            <th> expert </th>
                            <th> image </th>/
                            <th> delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $chef)
                            <tr>
                                <td> {{$chef->id}} </td>
                                <td> {{$chef->name}} </td>
                                <td> {{$chef->expert}} </td>
                                <td><img src="/chefsImage/{{$chef->image}}"></td>

                                <td> <a href="{{url('/chefsDelete',$chef->id)}}" class="btn btn-danger">Delete</a></td>
                                <td> <a href="{{url('/EditChef',$chef->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
