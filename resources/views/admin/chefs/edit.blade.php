@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update chefs</h4>

                <form class="forms-sample" action="{{url('updateChef',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control"  value="{{$data->name}}" id="name" name="name" placeholder="Enter Chef name">
                    </div>
                    <div class="form-group">
                        <label for="price">Expert</label>
                        <input type="text" class="form-control" id="expert" value="{{$data->expert}}" name="expert" placeholder="Expert">
                    </div>

                    <div class="form-group">
                        <label for="image">old image</label>
                        <img width="100px" height="100px" src="/chefsImage/{{$data->image}}">
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



@endsection
