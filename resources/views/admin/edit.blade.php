@extends('admin.layout')
@section('mainContent')
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit food menu</h4>

                <form class="forms-sample" action="{{url('UpdateMenu',$data->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">title</label>
                        <input type="text" class="form-control" value="{{$data->title}}"  id="title" name="title" placeholder="Add title">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" value="{{$data->price}}" class="form-control" id="price" name="price" placeholder="Add price">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input value="{{$data->description}}" type="text" name="description" class="form-control" id="description" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="image">old image</label>
                        <img width="200px" height="200px" src="/foodImage/{{$data->image}}">
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
