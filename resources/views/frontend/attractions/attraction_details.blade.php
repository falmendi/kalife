@extends('layouts.app')
@section('title') {{$name}} Details @endsection
@section('activeAttraction')  active @endsection
@section('content')
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a>
            </li>
            <li><a href="{{url('/attractions')}}">Attractions</a>
            </li>
            <li><a href="#">{{\App\PackageCategory::find($attraction_info->category_id)->category}}</a>
            </li>
            <li class="active"><a>{{$name}}</a>
            </li>
        </ul>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="lh1em">{{$name}} <small>{{$attraction->name}}</small></h2>

                        <p class="lh1em text-small"><i class="fa fa-map-marker"></i> {{\App\Attraction::getByPackageId($attraction_info->id)->city}}</p>
                        <ul class="list list-inline text-small">
                            <li><i class="fa fa-phone"></i> {{$attraction_info->phone_number}}</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <p class="booking-item-header-price"><small>price from</small>  <span class="text-lg"> &#x20A6;{{number_format($attraction_info->adult_price)}}</span>
                        </p>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-7">
                    <div class="tabbable booking-details-tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                            </li>
                            <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                                @if(isset($images[0]))
                                     @foreach($images as $image)
                                            <img src="{{asset($image['image_path'])}}" alt="{{"Why"}}" style="width:100%; height: 100%" title="{{$name}}"/>
                                        @endforeach
                                    @else
                                        <img src="{{asset('images/gallery/packages/no-image.jpg')}}"  alt="No image available for this attraction" title="No image available for this attraction" />
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="google-map-tab">
                                <div id="map-canvas" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="booking-item-meta">
                        <h2 class="lh1em mt40">{{\App\PackageCategory::find($attraction_info->category_id)->category}}</h2>
                        <h3>Kalife <small > recommends</small></h3>
                        <div class="booking-item-rating">
                            <ul class="icon-list icon-group booking-item-rating-stars">
                                <li><i class="fa fa-star-half-o"></i>
                                </li>
                                <li><i class="fa fa-star-half-o"></i>
                                </li>
                                <li><i class="fa fa-star-half-o"></i>
                                </li>
                                <li><i class="fa fa-star-half-o"></i>
                                </li>
                                <li><i class="fa fa-star-half-o"></i>
                                </li>
                            </ul><span class="booking-item-rating-number"><b > 0 </b> of 0 <small class="text-smaller"></small></span>
                            <p><a class="text-default" href="#">No rating available</a>
                            </p>
                        </div>
                    </div>
                    <div class="gap gap-small">
                        <h4>Package Information</h4>
                        <p>{{substr($attraction_info->information, 325)}}</p>
                    </div>
                    <a href="{{url('/book-package/'.$id.'/'.$name)}}" class="btn btn-primary btn-lg">Book Attraction</a>
                </div>
            </div>
        </div>
        <div class="row row-wrap">
            <div class="col-md-12">
                <h4>Attraction Details</h4>
                <p>{{$attraction->information}}</p>
            </div>

        </div>
        <div class="gap"></div>


            <div class="row row-wrap">
                @if(isset($sight_seeings[0]))
                <div class="col-md-8">
                    <h3 class="mb20">Sight Seeings</h3>
                    <ul class="booking-item-reviews list">
                        @foreach($sight_seeings as $sight_seeing)
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="booking-item-review-content">
                                            <h5>"{{$sight_seeing->title}}"</h5>
                                            {{--<ul class="icon-group booking-item-rating-stars">--}}
                                                {{--<li><i class="fa fa-star"></i>--}}
                                                {{--</li>--}}
                                                {{--<li><i class="fa fa-star"></i>--}}
                                                {{--</li>--}}
                                                {{--<li><i class="fa fa-star"></i>--}}
                                                {{--</li>--}}
                                                {{--<li><i class="fa fa-star"></i>--}}
                                                {{--</li>--}}
                                                {{--<li><i class="fa fa-star"></i>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                            <p>{{$sight_seeing->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                    </ul>
                </div>
                @endif


                {{--<div class="col-md-4">--}}
                    {{--<h4>Activities Near</h4>--}}
                    {{--<ul class="booking-list">--}}
                        {{--<li>--}}
                            {{--<div class="booking-item booking-item-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<img src="img/upper_lake_in_new_york_central_park_800x600.jpg" alt="Image Alternative text" title="Upper Lake in New York Central Park" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-5">--}}
                                        {{--<h5 class="booking-item-title">Central Park Trip</h5>--}}
                                        {{--<ul class="icon-group booking-item-rating-stars">--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-3"><span class="booking-item-price">Free</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="booking-item booking-item-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<img src="img/new_york_at_an_angle_800x600.jpg" alt="Image Alternative text" title="new york at an angle" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-5">--}}
                                        {{--<h5 class="booking-item-title">Manhattan Skyline</h5>--}}
                                        {{--<ul class="icon-group booking-item-rating-stars">--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star-o"></i>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-3"><span class="booking-item-price">Free</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="booking-item booking-item-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<img src="img/department_of_theatre_arts_800x600.jpg" alt="Image Alternative text" title="Department of Theatre Arts" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-5">--}}
                                        {{--<h5 class="booking-item-title">Beautiful - The Carole King Musical</h5>--}}
                                        {{--<ul class="icon-group booking-item-rating-stars">--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star-half-empty"></i>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-3"><span class="booking-item-price">$100</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="booking-item booking-item-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<img src="img/food_is_pride_800x600.jpg" alt="Image Alternative text" title="Food is Pride" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-5">--}}
                                        {{--<h5 class="booking-item-title">Food is Prime</h5>--}}
                                        {{--<ul class="icon-group booking-item-rating-stars">--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-3"><span class="booking-item-price">$100</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="booking-item booking-item-small">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4">--}}
                                        {{--<img src="img/me_with_the_uke_800x600.jpg" alt="Image Alternative text" title="Me with the Uke" />--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-5">--}}
                                        {{--<h5 class="booking-item-title">Ukle Master Class</h5>--}}
                                        {{--<ul class="icon-group booking-item-rating-stars">--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star"></i>--}}
                                            {{--</li>--}}
                                            {{--<li><i class="fa fa-star-half-empty"></i>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-3"><span class="booking-item-price">Free</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
            <div class="gap gap-small"></div>

    </div>
    <script>
        var customLatitude = '6.45407';
        var customLongitude = '3.39467';
    </script>
@endsection