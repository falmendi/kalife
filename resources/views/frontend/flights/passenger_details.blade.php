@extends('layouts.app')
@section('title') Flying Passengers Details @endsection
@section('activeFlight')  active @endsection
@section('content')
<div class="gap gap-small"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($itinerary[0]['itineraryPriceAddition'] > 0)
                    <div class="alert alert-info">
                        <p><strong><i class="fa fa-warning"></i> Important Notice !!!</strong>
                            @if($itinerary[0]['itineraryPriceAddition'] < 0)
                                The price of this this Itinerary has decreased by &#x20A6; {{number_format($itinerary[0]['itineraryPriceAddition'])}}
                            @elseif($itinerary[0]['itineraryPriceAddition'] > 0)
                                The price of this this Itinerary has increased by &#x20A6; {{number_format($itinerary[0]['itineraryPriceAddition'])}}
                            @endif
                        </p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i>
                        {{session()->get('message')}}
                    </div>
                @endif
                    @if(session()->has('errorMessage'))
                        <div class="alert alert-warning">
                            <i class="fa fa-warning"></i>
                            {{session()->get('errorMessage')}}
                        </div>
                    @endif
            </div>
            <div class="col-md-8">
                <h4>Passenger Details  <small>Customer Details validation</small></h4>
                       @if(auth()->guest())
                    <p class="well">Existing customers, kindly <button class="btn btn-default btn-sm login-button">login <i class="fa fa-sign-in"></i></button> to continue </p>
                    <form method="post" action="{{url('/login')}}" class="login-form hidden">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                                        <label> Email</label>
                                        <input class="form-control" name="email" required type="email" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                        <label> Password</label>
                                        <input class="form-control" name="password" required type="password" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary"> Login <i class="fa fa-sign-in"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                Can't remember password ? <a href="{{url('/password/reset')}}">Recover Here</a>
                            </label>
                        </div>
                    </form>

                  <p class="well">  New Customers, kindly provide us with this few information</p>
                    <form method="post" class="panel" enctype="multipart/form-data" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group form-group-icon-left"><i class="fa fa-user-secret input-icon input-icon-show"></i>
                                    <label>Title *</label>
                                    <select name="title" required class="form-control">
                                        <option value="1">Mr.</option>
                                        <option value="2">Mrs.</option>
                                        <option value="3">MISS</option>
                                        <option value="4">MASTER</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                    <label>First Name *</label>
                                    <input class="form-control" name="first_name" required placeholder="e.g. John" type="text" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                    <label>Last Name *</label>
                                    <input class="form-control" name="last_name" required placeholder="e.g. Doe" type="text" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                    <label>Other Name</label>
                                    <input class="form-control" name="other_name" placeholder="e.g. Smith" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-icon-left">
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <label>Email *</label>
                                    <input class="form-control" name="email" required placeholder="e.g. johndoe@gmail.com" type="email" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-icon-left">
                                    <i class="fa fa-phone input-icon input-icon-show"></i>
                                    <label>Phone Number *</label>
                                    <input class="form-control" name="phone_number" required placeholder="e.g. 08012345678" type="number" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                    <label>Password *</label>
                                    <input class="form-control" type="password" name="password" required placeholder="my secret password" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                    <label>Confirm Password *</label>
                                    <input class="form-control" type="password" name="password_confirmation" required placeholder="my secret password confirmation" />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"> Join Us <i class="fa fa-user-plus"></i></button>
                    </form>

                    <div class="gap gap-small"></div>
                            {{--<div class="alert alert-info">--}}
                                {{--<i class="fa fa-info-circle"></i>--}}
                                {{--Kindly login to your account if you are an existing customer or register with us before you continue your booking process--}}
                            {{--</div>--}}
                               @endif
                              @if(!auth()->guest())
                            <form method="post" action="{{url('passengerDetailsRQ')}}">
                        {{csrf_field()}}
                        <ul class="list booking-item-passengers">
                            @for($i = 0; $i < session()->get('flightSearchParam')['adult_passengers']; $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-bigger">ADULT ({{$i+1}}) <small>above 12 years old</small></p>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sex</label>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="adult_sex[{{$i}}]" value="M" />Male</label>
                                            </div>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="adult_sex[{{$i}}]" value="F"/>Female</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Surname</label>
                                                    <input class="form-control" name="adult_surname[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Given name</label>
                                                    <input class="form-control" name="adult_given_name[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-show"></i>
                                                    <label>Date of Birth</label>
                                                    <input class="date-pick-adult form-control" name="adult_date_of_birth[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                            @for($i = 0; $i < session()->get('flightSearchParam')['child_passengers']; $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-bigger">CHILD ({{$i+1}}) <small>2 - 11 years old</small></p>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sex</label>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="child_sex[{{$i}}]" value="M"/>Male</label>
                                            </div>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="child_sex[{{$i}}]" value="F" />Female</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Surname</label>
                                                    <input class="form-control" name="child_surname[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Given name</label>
                                                    <input class="form-control" name="child_given_name[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-show"></i>
                                                    <label>Date of Birth</label>
                                                    <input class="date-pick-infant form-control" name="child_date_of_birth[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                            @for($i = 0; $i < session()->get('flightSearchParam')['infant_passengers']; $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-bigger">INFANT ({{$i+1}}) <small>below 2 years old</small></p>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Sex</label>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="infant_sex[{{$i}}]" value="M" />Male</label>
                                            </div>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" required name="infant_sex[{{$i}}]" value="F" />Female</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Surname</label>
                                                    <input class="form-control" name="infant_surname[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                                    <label>Given name</label>
                                                    <input class="form-control" name="infant_given_name[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-show"></i>
                                                    <label>Date of Birth</label>
                                                    <input class="date-pick-infant form-control" name="infant_date_of_birth[]" required type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endfor

                        </ul>
                        <div class="gap gap-small"></div>
                        <div class="row">
                            <div class="col-md-6 alert alert-info">

                                <p><i class="fa fa-smile-o fa-2x"></i> You are almost done with your booking. We just need you to make payment after this.</p>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Proceed Payment <i class="fa fa-money"></i></button>
                            </div>
                        </div>
                    </form>
                          @endif



            </div>
            <div class="col-md-4">
                <div class="booking-item-payment">
                    <header class="clearfix">
                        <h5 class="mb0" style="color: #1751cd;"><i class="fa fa-plane"></i> {{\App\Services\SabreConfig::iataCode(session()->get('flightSearchParam')['departure_airport'])}} - <i class="fa fa-plane fa-flip-vertical"></i> {{\App\Services\SabreConfig::iataCode(session()->get('flightSearchParam')['arrival_airport'])}}</h5>
                    </header>
                    <ul class="booking-item-payment-details">
                        <li>
                            <h5>Flight Details</h5>
                            <div class="booking-item-payment-flight">
                                @foreach($itinerary[1] as $i => $originDestination)
                                    <p>FROM {{$originDestination[0]['departureAirportName']}}</p>
                                    @foreach($originDestination as $j => $segment)
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="booking-item-flight-details">
                                            <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                <h5>{{date('g:i A',strtotime($segment['departureDateTime']))}}</h5>
                                                <p class="booking-item-date">{{date('D, M d',strtotime($segment['departureDateTime']))}}</p>
                                                <p class="booking-item-destination">{{$segment['departureAirportName']}}</p>
                                            </div>
                                            <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                <h5>{{date('g:i A',strtotime($segment['arrivalDateTime']))}}</h5>
                                                <p class="booking-item-date">{{date('D, M d',strtotime($segment['arrivalDateTime']))}}</p>
                                                <p class="booking-item-destination">{{$segment['arrivalAirportName']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="booking-item-flight-duration">
                                            <p>Duration</p>
                                            <h5>{{$segment['timeDuration']}}</h5>
                                        </div>
                                    </div>
                                </div>
                                        @endforeach
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <h5>Price Break Down</h5>
                            <ul class="booking-item-payment-price">
                                @foreach($itinerary[2] as $i => $priceInfo)
                                <li>
                                    <p class="booking-item-payment-price-title">{{$priceInfo['passengerType']}} <small>(x{{$priceInfo['quantity']}})</small></p>
                                    <p class="booking-item-payment-price-amount">&#x20A6; {{number_format(($priceInfo['totalPrice'] * $priceInfo['quantity']),2)}}
                                    </p>
                                </li>
                                @endforeach()

                                   <li>
                                        <p class="booking-item-payment-price-title">Taxes and Fees</p>
                                        <p class="booking-item-payment-price-amount">&#x20A6; {{number_format($itinerary[0]['adminToUserMarkup'] + $itinerary[0]['vat'],2)}}</p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Discount</p>
                                        <p class="booking-item-payment-price-amount">&#x20A6; {{number_format($itinerary[0]['airlineMarkdown'],2)}}
                                        </p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Price Change</p>
                                        <p class="booking-item-payment-price-amount">&#x20A6; {{number_format($itinerary[0]['itineraryPriceAddition'])}}
                                        </p>
                                    </li>

                            </ul>
                        </li>
                    </ul>
                    <p class="booking-item-payment-total">Total Amount: <span>&#x20A6; {{number_format($itinerary[0]['adminToUserSumTotal'],2)}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection
