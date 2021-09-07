<div class="row">
    @foreach($chefs as $chef)
        <div class="col-lg-4">
            <div class="chef-item">
                <div class="thumb">
                    <div class="overlay"></div>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <img src="{{'/chefsImage/'.$chef->image}}" alt="Chef #1">
                </div>
                <div class="down-content">
                    <h4>{{$chef->name}}</h4>
                    <span>{{$chef->expert}}</span>
                </div>
            </div>
        </div>
    @endforeach

</div>
