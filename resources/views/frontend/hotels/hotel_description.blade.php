@extends('layouts.app')
@section('title') {{$selectedHotel['hotelName']}} Hotel Information  @endsection
@section('activeHotel') active @endsection
@section('loadingOverlay')
    @include('partials.hotelSearchOverlay')
@endsection
@section('content')
{{--{{dd($selectedHotel)}}--}}

    <div class="container">

        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a>
            </li>
            <li><a>Hotels</a>
            </li>
            <li><a href="{{url('/available-hotels')}}">{{$hotelSearchParam['city']}} Hotels</a></li>
            <li class="active"><a>{{$selectedHotel['hotelName']}} Hotel</a></li>
        </ul>
        <div class="gap gap-small"></div>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-12">
                        <form class="booking-item-dates-change mb40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                        <label>Where</label>
                                        <input class="typeahead form-control destination_city" value="" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-daterange" data-date-format="MM d, D">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                    <label>Check in</label>
                                                    <input class="form-control checkin_date" name="start" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                    <label>Check out</label>
                                                    <input class="form-control checkout_date" name="end" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group- form-group-select-plus">
                                                <label>Guests</label>
                                                <select class="form-control guests">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-select-plus">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary search_hotel">Search Hotel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <h2 class="lh1em">{{$selectedHotel['hotelName']}}</h2>
                        <p class="lh1em text-small"><i class="fa fa-map-marker"></i> {{$selectedHotel['address']}} ({{$selectedHotel['locationDescription']}})</p>
                        <ul class="list list-inline text-small">
                            <li><a><i class="fa fa-fax"></i> {{$selectedHotel['fax']}}</a>
                            </li>
                            <li><a><i class="fa fa-phone"></i> {{$selectedHotel['phone']}}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <p class="booking-item-header-price">  @if($hotel['minimumPrice'] == 0) Not Available @elseif($hotel['minimumPrice'] != 0) <small>price from</small><span class="text-lg">&#x20A6;{{number_format($hotel['minimumPrice'])}}</span>/day @endif </p>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-8">
                    <div class="tabbable booking-details-tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            {{--<li><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>--}}
                            {{--</li>--}}
                            <li class="active"><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                            </li>
                            {{--<li><a href="#tab-3" data-toggle="tab"><i class="fa fa-signal"></i>Rating</a>--}}
                            {{--</li>--}}
                            <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-asterisk"></i>Facilities</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab-1">
                                <!-- START LIGHTBOX GALLERY -->
                                <div class="row row-no-gutter" id="popup-gallery">
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_rio_internacional_de_luxe_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_rio_internacional_de_luxe_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL de luxe" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_eden_mar_suite_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_eden_mar_suite_800x600.jpg" alt="Image Alternative text" title="hotel EDEN MAR suite" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_1_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_1_800x600.jpg" alt="Image Alternative text" title="hotel 1" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_2_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_2_800x600.jpg" alt="Image Alternative text" title="hotel 2" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/lhotel_porto_bay_sao_paulo_luxury_suite_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/lhotel_porto_bay_sao_paulo_luxury_suite_800x600.jpg" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO luxury suite" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_the_cliff_bay_spa_suite_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_the_cliff_bay_spa_suite_800x600.jpg" alt="Image Alternative text" title="hotel THE CLIFF BAY spa suite" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_liberdade_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_liberdade_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY LIBERDADE" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_serra_golf_living_room_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_serra_golf_living_room_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF living room" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_rio_internacional_rooftop_pool_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_rio_internacional_rooftop_pool_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL rooftop pool" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_serra_golf_library_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_serra_golf_library_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF library" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_serra_golf_suite_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_serra_golf_suite_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF suite" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/lhotel_porto_bay_sao_paulo_suite_lhotel_living_room_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/lhotel_porto_bay_sao_paulo_suite_lhotel_living_room_800x600.jpg" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO suite lhotel living room" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/the_pool_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/the_pool_800x600.jpg" alt="Image Alternative text" title="The pool" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/lhotel_porto_bay_sao_paulo_lobby_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/lhotel_porto_bay_sao_paulo_lobby_800x600.jpg" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO lobby" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_serra_golf_suite2_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_serra_golf_suite2_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF suite2" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="hover-img popup-gallery-image" href="img/hotel_porto_bay_serra_golf_suite2_800x600.jpg" data-effect="mfp-zoom-out">
                                            <img src="img/hotel_porto_bay_serra_golf_suite2_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF suite2" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- END LIGHTBOX GALLERY -->
                            </div>
                            <div class="tab-pane fade in active" id="google-map-tab">
                                <div id="map-canvas" style="width:100%; height:500px;"></div>
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                                <div class="mt20">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4 class="lhem">Traveler rating</h4>
                                            <ul class="list booking-item-raiting-list">
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Exellent</div>
                                                    <div class="booking-item-raiting-list-bar">
                                                        <div style="width:86%;"></div>
                                                    </div>
                                                    <div class="booking-item-raiting-list-number">1372</div>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Very Good</div>
                                                    <div class="booking-item-raiting-list-bar">
                                                        <div style="width:7%;"></div>
                                                    </div>
                                                    <div class="booking-item-raiting-list-number">62</div>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Average</div>
                                                    <div class="booking-item-raiting-list-bar">
                                                        <div style="width:3%;"></div>
                                                    </div>
                                                    <div class="booking-item-raiting-list-number">28</div>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Poor</div>
                                                    <div class="booking-item-raiting-list-bar">
                                                        <div style="width:2%;"></div>
                                                    </div>
                                                    <div class="booking-item-raiting-list-number">9</div>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Terrible</div>
                                                    <div class="booking-item-raiting-list-bar">
                                                        <div style="width:1%;"></div>
                                                    </div>
                                                    <div class="booking-item-raiting-list-number">9</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="lhem">Summary</h4>
                                            <ul class="list booking-item-raiting-summary-list">
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Sleep</div>
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Location</div>
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o text-gray"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Service</div>
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Clearness</div>
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="booking-item-raiting-list-title">Rooms</div>
                                                    <ul class="icon-group booking-item-rating-stars">
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                        <li><i class="fa fa-smile-o"></i>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><a class="btn btn-primary" href="#">Write a Review</a>
                            </div>
                            <div class="tab-pane fade" id="tab-4">
                                <div class="row mt20">

                                            @if(!is_null($hotel['hotelAmenity']))
                                                @php
                                                $amenities = explode(' ', $hotel['hotelAmenity']);
                                                @endphp
                                                   @foreach($amenities as $i => $amenity)
                                                       @if(!is_null($amenity))
                                                <div class="col-md-4">
                                                    <ul class="booking-item-features booking-item-features-expand mb30 clearfix">
                                                    <li><i class="fa fa-windows"></i><span class="booking-item-feature-title">{{$amenity}}</span></li>
                                                    </ul>
                                                </div>
                                                    @endif
                                                @endforeach
                                        @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ml20">
                        <div class="booking-item-meta">
                            <h2 class="lh1em mt40">Exeptional!</h2>
                            {{--<h3>97% <small >of guests recommend</small></h3>--}}
                            <div class="booking-item-rating">
                                <ul class="icon-list icon-group booking-item-rating-stars">
                                    @for($y = 0; $y < $hotel['starRating']; $y++)
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                    @endfor
                                    @for($z = 0; $z < (5 - $hotel['starRating']); $z++)
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    @endfor
                                </ul><span class="booking-item-rating-number"><b >{{$hotel['starRating']}}</b> of 5 <small class="text-smaller">star rating</small></span>
                                {{--<p><a class="text-default" href="#">based on 1535 reviews</a>--}}
                                </p>
                            </div>
                        </div>
                        <h3>About the Hotel</h3>
                        <p>{{$selectedHotel['hotelDescription']}}</p>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
            <h3>Available Rooms</h3>
            <div class="row">
                <div class="col-md-8">
                    <ul class="booking-list">
                           @if(!empty($selectedHotel['rooms']))
                               @foreach($selectedHotel['rooms'] as $r => $room)
                            <li>
                            <a  href="{{url('room-booking/'.$r)}}" class="booking-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{asset('img/hotel_porto_bay_rio_internacional_rooftop_pool_800x600.jpg')}}" alt="Image Alternative text" title="{{$room['roomDescription']}}" />
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="booking-item-title">{{$room['roomDescription']}}</h5>
                                        <p class="text-small">{{$room['roomAmenitySummary']}}</p>
                                        <ul class="booking-item-features booking-item-features-sign clearfix">
                                            <li rel="tooltip" data-placement="top" title="Guests Occupancy"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x {{session()->get('hotelSearchParam')['guests']}}</span>
                                            </li>
                                            <li rel="tooltip" data-placement="top" title="Stay Duration (Day)"><i class="fa fa-calendar"></i><span class="booking-item-feature-sign">x {{number_format($room['Duration'])}}</span>
                                            </li>
                                        </ul>
                                        <span class="text">
                                            <p class="text text-bigger">Check In :  {{date('D, M d',strtotime($selectedHotel['checkinDate']))}}  , {{date('g:i A',strtotime($selectedHotel['checkInTime']))}}</p>
                                            <p class="text text-bigger">Check Out :  {{date('D, M d',strtotime($selectedHotel['checkoutDate']))}} , {{date('g:i A',strtotime($selectedHotel['checkOutTime']))}} </p>
                                        </span>
                                    </div>
                                    <div class="col-md-4"><span class="booking-item-price">&#x20A6;{{number_format($room['baseAmountPerNightNaira'])}}</span><span>/day</span>
                                     <span class="btn btn-primary">Select Room</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                            @endforeach
                            @else
                            <li>
                                <a class="booking-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('img/sorry.jpg')}}" alt="Image Alternative text" title="No room available" />
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="booking-item-title">Sorry, No room Available</h5>
                                            <p class="text-small">
                                                No rooms was found for this hotel, kindly go back and select another hotel from the available hotels returned
                                            </p>

                                        </div>
                                        </div>
                                </a>
                                   </li>
                            @endif
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Hot Hotel Deals</h4>
                    <ul class="booking-list">
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/hotel_porto_bay_serra_golf_living_room_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY SERRA GOLF living room" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">Waldorf Astoria New York</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$388</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/hotel_2_800x600.jpg" alt="Image Alternative text" title="hotel 2" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">New York Hilton Midtown</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$296</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/the_pool_800x600.jpg" alt="Image Alternative text" title="The pool" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">Grand Hyatt New York</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$388</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/hotel_porto_bay_liberdade_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY LIBERDADE" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">Holiday Inn Express Kennedy Airport</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-half-empty"></i>
                                            </li>
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$241</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/hotel_porto_bay_rio_internacional_rooftop_pool_800x600.jpg" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL rooftop pool" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">Warwick New York Hotel</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star-half-empty"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$162</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="booking-item booking-item-small">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="img/hotel_the_cliff_bay_spa_suite_800x600.jpg" alt="Image Alternative text" title="hotel THE CLIFF BAY spa suite" />
                                    </div>
                                    <div class="col-xs-5">
                                        <h5 class="booking-item-title">Wellington Hotel</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3"><span class="booking-item-price-from">from</span><span class="booking-item-price">$373</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
           {{-- <h3 class="mb20">Hotel Reviews</h3>
            <div class="row row-wrap">
                <div class="col-md-8">
                    <ul class="booking-item-reviews list">
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/afro_70x70.jpg" alt="Image Alternative text" title="Afro" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">John Doe</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">146 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Felis non et class purus dignissim"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Eros id dignissim consectetur massa nam mattis habitant nisl gravida aliquam hendrerit orci vel non conubia duis congue netus condimentum lacinia aenean scelerisque est suspendisse lacus nisi bibendum non mi senectus mi et aptent senectus arcu varius dui laoreet parturient<span class="booking-item-review-more"> Donec proin ac risus dapibus sit id inceptos justo duis tristique viverra amet consequat ipsum massa parturient erat erat laoreet fermentum sodales etiam proin pellentesque nisi sit tempor purus purus proin sociis dictumst vulputate habitasse at auctor nec metus montes volutpat dolor nibh pulvinar amet blandit inceptos nullam semper velit euismod pellentesque ipsum aenean congue senectus justo ad dolor natoque urna</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Cum interdum tincidunt mollis cras auctor eget habitant dolor amet nascetur varius arcu pellentesque himenaeos ipsum urna quisque nostra hac molestie porttitor quisque tempor blandit felis rutrum mus felis velit cubilia magna lacus</p>
                                            <p>Ligula semper et curabitur dapibus est vulputate porta ut litora eros sagittis commodo tempus curae ornare malesuada luctus etiam viverra maecenas proin potenti aenean tortor nostra at maecenas bibendum netus justo neque tempus nostra iaculis aliquet orci dictum adipiscing auctor dolor eleifend venenatis inceptos ullamcorper eros etiam elementum non egestas nascetur felis orci netus urna</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 8</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/amaze_70x70.jpg" alt="Image Alternative text" title="AMaze" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Minnie Aviles</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">148 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Sociosqu suscipit feugiat vel"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Molestie netus turpis primis nostra placerat facilisi suscipit sed magna vestibulum lacinia fermentum sollicitudin tempus aliquam tempus condimentum mauris ridiculus posuere commodo sociosqu eleifend mauris dictum faucibus mauris metus dictumst turpis dui libero litora<span class="booking-item-review-more"> Commodo interdum metus suspendisse sollicitudin posuere leo potenti nunc dolor leo taciti interdum luctus elementum per parturient orci ante venenatis fringilla etiam nibh blandit ullamcorper luctus blandit torquent himenaeos sollicitudin enim praesent dapibus lobortis facilisis interdum etiam varius velit fames dapibus habitasse leo eros sed fames lorem non pellentesque tincidunt est dis porta porta montes himenaeos imperdiet senectus metus vitae posuere suspendisse</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Ultrices gravida consectetur tristique velit fringilla neque montes habitant etiam neque tempus felis aenean augue malesuada neque ultricies mollis massa hac sem ut maecenas himenaeos aenean pulvinar molestie sociis lacus ullamcorper elit lobortis habitant ut posuere maecenas nunc quisque metus nostra nullam tellus rutrum at diam egestas augue nascetur nostra</p>
                                            <p>Facilisi malesuada feugiat scelerisque aptent parturient augue at vestibulum nulla adipiscing eros a ac tincidunt pretium nullam torquent torquent fames semper tempor quam habitant aliquam aptent platea platea elit adipiscing lacinia phasellus urna tellus diam curae amet dis parturient lorem at blandit bibendum lobortis venenatis cras dictum luctus dis leo dapibus hac</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 18</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/me_with_the_uke_70x70.jpg" alt="Image Alternative text" title="Me with the Uke" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Cyndy Naquin</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">102 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Purus non rhoncus leo"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Auctor posuere dignissim neque cubilia habitant curae consequat laoreet nulla torquent tortor turpis consectetur condimentum erat amet ultricies ad amet sapien ornare habitasse nisl orci id<span class="booking-item-review-more"> Feugiat rutrum morbi potenti pellentesque ullamcorper viverra proin nascetur suscipit ullamcorper amet rhoncus ut semper pulvinar maecenas accumsan parturient integer lacus justo torquent cras sociis a massa molestie inceptos congue venenatis platea hac neque egestas dignissim lacinia quisque ridiculus cras semper magnis nascetur consequat enim conubia auctor eleifend vel magnis est auctor nunc vel nulla primis mauris fringilla blandit sapien fermentum volutpat curabitur himenaeos eros quis risus amet</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Arcu viverra laoreet ullamcorper ut mauris blandit nascetur non platea donec condimentum facilisi hac quisque consectetur posuere suspendisse duis platea augue</p>
                                            <p>Aliquet morbi lacus consectetur elementum egestas lacus amet fames donec et nec neque vitae at ut turpis maecenas in sodales nunc dui habitant mattis nisi conubia mi penatibus cum porta aenean mauris consequat tincidunt lectus sagittis tellus dapibus suspendisse porta eget mattis tempus vestibulum mus imperdiet nibh sem pharetra quis netus vel vehicula class vestibulum nisl donec hendrerit fermentum magna sed amet purus sit nec class sit fringilla tellus</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 14</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/gamer_chick_70x70.jpg" alt="Image Alternative text" title="Gamer Chick" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Carol Blevins</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">127 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Volutpat per eget"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Molestie platea suspendisse eget tortor pharetra magna nam senectus tristique cursus ut odio sollicitudin venenatis natoque dis maecenas magna dignissim sociosqu et sociis accumsan interdum dictum netus quis enim phasellus suscipit nunc donec purus dui himenaeos nulla sociosqu<span class="booking-item-review-more"> Rhoncus dictumst fusce ultricies congue sapien porttitor maecenas fringilla ipsum nam lorem aliquam rhoncus elit himenaeos facilisis auctor nostra cubilia pretium ante a enim interdum ullamcorper erat pharetra varius imperdiet praesent tempor justo placerat eleifend senectus laoreet mi cubilia volutpat augue</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Convallis facilisi gravida vehicula duis aliquam habitant cras accumsan dis vitae eleifend duis convallis porta gravida auctor phasellus luctus ante</p>
                                            <p>Et dignissim sagittis leo aptent malesuada nibh convallis cras velit himenaeos dis pretium interdum bibendum elementum morbi dignissim dis habitant senectus curabitur placerat consequat est nunc ad ornare commodo luctus curabitur mi aliquet aliquam nec sollicitudin fames cubilia elit donec nostra cum nullam porta dignissim tortor porta turpis quam pretium ultricies varius massa maecenas</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 15</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/chiara_70x70.jpg" alt="Image Alternative text" title="Chiara" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Cheryl Gustin</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">149 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Et id dictumst mattis donec fringilla"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Ac parturient posuere id phasellus erat elementum nullam lacus cursus rhoncus parturient vitae praesent quisque nascetur molestie quis dignissim vel sit odio metus tristique auctor dictumst primis ad viverra quisque etiam in rutrum donec cras non dis suscipit risus<span class="booking-item-review-more"> Ridiculus lacus mus cursus luctus donec pellentesque rhoncus sem quam vulputate mus hendrerit risus ultrices a elementum massa est at aenean parturient in egestas senectus lectus convallis lectus dui neque sit dignissim facilisis fames feugiat laoreet pharetra felis vitae ornare lacus sodales non sapien curae nisl nec habitant velit semper pretium et ipsum dolor in amet nunc vestibulum lacus nulla dis sollicitudin diam luctus dolor ante lobortis neque enim facilisis</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Penatibus integer lacinia semper nibh ullamcorper feugiat faucibus non nec amet ac mus hac diam nulla ridiculus proin sem iaculis condimentum</p>
                                            <p>Pharetra morbi volutpat torquent orci luctus pharetra volutpat nisl dis curae primis aliquet sapien pellentesque velit tristique taciti tincidunt adipiscing pharetra massa at quisque fermentum faucibus ultrices mi fames himenaeos pellentesque curabitur nisl etiam a volutpat phasellus convallis diam tempus malesuada mauris torquent dapibus montes mollis iaculis porta ridiculus rutrum fusce sed parturient habitant a gravida</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 9</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/bubbles_70x70.jpg" alt="Image Alternative text" title="Bubbles" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Joe Smith</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">109 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Curabitur senectus blandit parturient quam fames"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Sem nec interdum id torquent litora nibh curae morbi cum etiam duis malesuada viverra ultricies pellentesque vestibulum sed mattis augue<span class="booking-item-review-more"> Penatibus venenatis malesuada nam semper facilisis taciti posuere convallis curae auctor non sodales iaculis blandit taciti pellentesque faucibus id nam scelerisque sapien ultricies euismod viverra diam dictum curabitur laoreet facilisi conubia purus taciti malesuada eget cum malesuada nunc libero vestibulum aptent aliquam eros facilisi purus mus odio praesent facilisi</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Molestie amet fringilla ultricies sem leo pulvinar gravida pulvinar felis adipiscing risus curae nulla</p>
                                            <p>Rutrum vehicula interdum sit consectetur arcu fusce turpis nisl sollicitudin euismod fringilla habitant mi condimentum at vehicula sem conubia neque maecenas ultrices donec sodales nam nec phasellus fermentum et vulputate in viverra dolor tortor platea fames libero malesuada justo elit nostra metus ullamcorper etiam rutrum dictum aenean himenaeos morbi dolor commodo vulputate accumsan sapien vitae consectetur quisque placerat vulputate</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 19</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-review-person">
                                        <a class="booking-item-review-person-avatar round" href="#">
                                            <img src="img/good_job_70x70.jpg" alt="Image Alternative text" title="Good job" />
                                        </a>
                                        <p class="booking-item-review-person-name"><a href="#">Ava McDonald</a>
                                        </p>
                                        <p class="booking-item-review-person-loc">Palm Beach, FL</p><small><a href="#">86 Reviews</a></small>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="booking-item-review-content">
                                        <h5>"Dolor torquent blandit ac eget"</h5>
                                        <ul class="icon-group booking-item-rating-stars">
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <p>Vulputate pretium habitant parturient cursus sem tempor ligula a at ultrices commodo nibh potenti feugiat morbi molestie litora leo eu ullamcorper montes consectetur eros fringilla per placerat velit tincidunt aptent vulputate<span class="booking-item-review-more"> Gravida curae lacinia imperdiet tempus erat vulputate posuere mollis quisque magna facilisi sagittis ridiculus consequat a nisl tincidunt nisl dapibus leo dignissim dapibus odio eu eu mi quam nibh erat tortor habitasse fringilla porttitor a sapien vivamus</span>
                                        </p>
                                        <div class="booking-item-review-more-content">
                                            <p>Praesent arcu turpis malesuada tortor rutrum ante hac fringilla inceptos ante molestie nostra nulla est</p>
                                            <p>Maecenas sodales per mi dictum nisl eros dignissim commodo a nostra class dolor nulla ligula nec velit nam vulputate magna fringilla interdum velit diam sed eros mus luctus fusce praesent mattis proin inceptos tellus aliquet scelerisque velit fames tellus ac luctus consequat donec donec varius ullamcorper rutrum pulvinar sed ridiculus sed leo</p>
                                            <p class="text-small mt20">Stayed March 2014, traveled as a couple</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Location</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Service</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list booking-item-raiting-summary-list">
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o text-gray"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                                            <ul class="icon-group booking-item-rating-stars">
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                                <li><i class="fa fa-smile-o"></i>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-review-expand"><span class="booking-item-review-expand-more">More <i class="fa fa-angle-down"></i></span><span class="booking-item-review-expand-less">Less <i class="fa fa-angle-up"></i></span>
                                        </div>
                                        <p class="booking-item-review-rate">Was this review helpful?
                                            <a class="fa fa-thumbs-o-up box-icon-inline round" href="#"></a><b class="text-color"> 12</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="row wrap">
                        <div class="col-md-5">
                            <p><small>1467 reviews on this hotel. &nbsp;&nbsp;Showing 1 to 7</small>
                            </p>
                        </div>
                        <div class="col-md-7">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a>
                                </li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#">6</a>
                                </li>
                                <li><a href="#">7</a>
                                </li>
                                <li class="dots">...</li>
                                <li><a href="#">43</a>
                                </li>
                                <li class="next"><a href="#">Next Page</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="box bg-gray">
                        <h3>Write a Review</h3>
                        <form>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Review Title</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label>Review Text</label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list booking-item-raiting-summary-list stats-list-select">
                                        <li>
                                            <div class="booking-item-raiting-list-title">Sleep</div>
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="booking-item-raiting-list-title">Location</div>
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="booking-item-raiting-list-title">Service</div>
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="booking-item-raiting-list-title">Clearness</div>
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="booking-item-raiting-list-title">Rooms</div>
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                                <li><i class="fa fa-smile-o"></i>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <input class="btn btn-primary" type="submit" value="Leave a Review" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>--}}
        </div>
        <div class="gap gap-small"></div>
    </div>

    <script>
        var customLatitude = '{{ $hotel['latitude']  }}';
        var customLongitude = '{{$hotel['longitude'] }}';
    </script>
@endsection