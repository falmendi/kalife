<div class="col-md-3">
    <aside class="user-profile-sidebar">
        <div class="user-profile-avatar text-center">
            @if(is_null(auth()->user()->profile_photo))
                @if(auth()->user()->gender == 1)
                    <img src="{{asset('/img/male.png')}}" alt="Image Alternative text" title="{{auth()->user()->first_name}}" />
                @elseif(auth()->user()->gender == 2)
                    <img src="{{asset('/img/female.png')}}" alt="Image Alternative text" title="{{auth()->user()->first_name}}" />
                @endif
            @else
                <img src="{{asset(auth()->user()->profile_photo)}}" alt="Image Alternative text" title="{{auth()->user()->first_name}}" />
            @endif
            <h5>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
            <p>Member Since {{date('M Y',strtotime(auth()->user()->created_at))}}</p>
        </div>
        <ul class="list user-profile-nav">
            <li class="@yield('user')"><a href="{{url('/manage-user')}}"><i class="fa fa-user"></i>Manage Info</a></li>
            <li class="@yield('booking')"><a href="{{url('/bookings')}}"><i class="fa fa-dashboard"></i> Bookings</a></li>
            <li class="@yield('flightBooking')"><a href="{{url('/flight-bookings')}}"><i class="fa fa-plane"></i> Flight Bookings</a></li>
            <li class="@yield('hotelBooking')"><a href="#"><i class="fa fa-building-o"></i> Hotel Bookings</a></li>
            <li class="@yield('carBooking')"><a href="#"><i class="fa fa-car"></i> Car Bookings</a></li>
            <li class="@yield('packageBooking')"><a href="#"><i class="fa fa-suitcase"></i> Travel Packages</a></li>
            <li class="@yield('onlinePayment')"><a href="{{url('/my-online-payments')}}"><i class="fa fa-money"></i>Online Payments</a></li>
            <li class="@yield('bankPayment')"><a href="#"><i class="fa fa-bank"></i>Bank Payments</a></li>
        </ul>
    </aside>
</div>