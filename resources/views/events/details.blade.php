@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Events')

@section('CSS')
<style>

    .decript p{
        margin-bottom: 2px;
    }
</style>
@endsection
@section('content')


<!-- Begin Page Content -->
<div class="container-md-fluid">
    <div class="row">
       <div class="col-xl-12 col-lg-12">
          <div class=" px-4 px-md-0 cover-pic pt-2 pt-md-0">
             <img style="min-width:100% !important;" src="{{ asset('storage/events/'.$event->cover) }}" class="img-fluid" alt="{{ $event->title }}">
          </div>
       </div>
       <div class="col-xl-12 col-lg-12">
          <div class="bg-white info-header shadow rounded mb-2 mb-md-4 event-detail">
             <div class="d-block d-md-flex align-items-center justify-content-between py-3 px-4 border-bottom">
                <div>
                   <h3 class="text-gray-900 mb-0 mt-0 font-weight-bold">{{ $event->title }}</h3>
                   <p class="mb-0"><small class="text-muted"><i class="fas fa-map-marker-alt fa-fw fa-sm mr-1"></i>{{$event->city->name}}</small></p>
                </div>
                <div>
                   {{-- <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-share-alt"></i></a> --}}
                   @if($event->social != "")
                   <a href="{{ $event->social }}" class="mt-2 mt-md-0 d-md-inline-block d-block btn btn-danger shadow-sm social-btn"> Visit Social Site </a>
                   @endif
                </div>
             </div>
             <div class="d-flex align-items-center justify-content-between py-3 px-4 event-dates">
                <div>
                   {{-- <p class="mb-0 text-gray-900"><i class="fas fa-calendar-alt fa-sm fa-fw mr-1"></i> Sun 15 Dec at 4:00 PM</p> --}}
                   <p class="mb-0 text-gray-900"><i class="fas fa-calendar-alt fa-sm fa-fw mr-1"></i> {{Carbon\Carbon::parse($event->start_date_time)->format('D d M, Y')}} &nbsp; to &nbsp; {{Carbon\Carbon::parse($event->end_date_time)->format('D d M, Y')}}</p>
                </div>
                <div>
                   <p class="mb-0 text-gray-600"><i class="fab fa-elementor"></i> {{ $event->category->name }}</p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="row">
       <div class="col-xl-8 col-lg-8">
          <div class="bg-white p-3 widget shadow rounded mb-4">
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                   <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Summary</a>
                </li>
                {{-- <li class="nav-item">
                   <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Date And Time
                   </a>
                </li> --}}
                {{-- <li class="nav-item">
                   <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">FAQ</a>
                </li> --}}
             </ul>
             <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active event-des" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <h5 class="mt-0 mb-3">{{ $event->title }}t</h5>
                   {!! $event->description !!}
                </div>
                {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   <h5 class="mt-0 mb-3">Mon, Dec 31, 2018, 11:59 PM –</h5>
                   <h5 class="mt-0 mb-3"></h5>
                   <p>Boston Harbor Now in partnership with the Friends of Christopher Columbus Park, the Wharf District Council and the City of Boston is proud to announce the New Year's Eve Midnight Harbor Fireworks! This beloved nearly 40-year old tradition is made possible by the generous support of local waterfront organizations and businesses and the support of the City of Boston and the Office of Mayor Marty Walsh.</p>
                   <h5 class="mt-0 mb-3">Tue, Jan 1, 2019, 12:19 AM EST
                   </h5>
                   <p>Boston Harbor Now in partnership with the Friends of Christopher Columbus Park, the Wharf District Council and the City of Boston is proud to announce the New Year's Eve Midnight Harbor Fireworks! This beloved nearly 40-year old tradition is made possible by the generous support of local waterfront organizations and businesses and the support of the City of Boston and the Office of Mayor Marty Walsh.</p>
                </div> --}}
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                   <div class="accordion" id="accordionExample">
                      <div class="card">
                         <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               Collapsible Group Item #1
                               </button>
                            </h2>
                         </div>
                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                         </div>
                      </div>
                      <div class="card">
                         <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                               <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               Collapsible Group Item #2
                               </button>
                            </h2>
                         </div>
                         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                         </div>
                      </div>
                      <div class="card">
                         <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                               <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                               Collapsible Group Item #3
                               </button>
                            </h2>
                         </div>
                         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-xl-4 col-lg-4">
          <div class="bg-white p-3 widget shadow rounded mb-4">
             <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Location</h1>
             <p class="text-gray-900">{{ $event->location }}<br>{{ $event->city->name }}</p>
          </div>

          @if($event->end_date_time < Carbon\Carbon::now())
            <div class="bg-white p-3 widget shadow rounded mb-4 text-center py-3">
              <p class="font-weight-bold text-danger mb-0">This event has ended.</p>
            </div>
          @else
            @if($event->status != 1)
                <div class="bg-white p-3 widget shadow rounded mb-4 text-center py-3">
                    <p class="font-weight-bold  text-info mb-0">Due to some inconvinience, ticket booking for this event has been temporarily disabled. Please visit soon.</p>
                </div>
            @else
            <form method="POST" action="{{ route('event.book') }}">
                @csrf
            <div class="bg-white p-3 widget shadow rounded mb-4 booking-op-container">
                @if(count($eventpacs) > 0)
                <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Select Date</h1>
                @php
                    $date = Carbon\Carbon::parse($event->start_date_time)->toDateString();
                    $end_date = Carbon\Carbon::parse($event->end_date_time)->toDateString();

                    $date1 = new Carbon\Carbon($date);
                    $date2 = new Carbon\Carbon($end_date);
                    $days = $date1->diffInDays($date2);
                @endphp

                @for($i=0; $i<=$days; $i++)
                    <input class="checkbox-tools" type="radio" name="date" id="date{{ $i }}" value="{{ Carbon\Carbon::parse($date1)->format('d-m-Y') }}" {{ $i == 0 ? 'checked': '' }}>
                    <label class="for-checkbox-tools" for="date{{ $i }}">
                            {{-- <i class='uil uil-line-alt'></i> --}}
                        {{ Carbon\Carbon::parse($date1)->format('d-m-Y') }}
                    </label>
                    @php
                        $date1 = $date1->addDays(1);
                    @endphp
                @endfor

                {{-- <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Select Time</h1>
                <input class="checkbox-tools" type="radio" name="time" id="time1" value=" {{ Carbon\Carbon::parse($event->start_date_time)->format('h:m a') }}" checked>
                <label class="for-checkbox-tools" for="time1">
                    {{ Carbon\Carbon::parse($event->start_date_time)->format('h:m a') }}
                </label> --}}


                <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Available Packages</h1>
                @foreach($eventpacs as $key => $pac)
                <div class="artist-list mb-3">
                    <div class="d-flex align-items-center">
                    {{-- <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/s1.png" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div> --}}
                    <div class="font-weight-bold">
                        <div class="text-truncate">{{ $pac->title }}</div>
                        <div class="small text-gray-500">Rs {{ number_format($pac->amount, 2) }}</div>
                        {{-- <div class="small text-gray-500 decript">{!! $pac->description !!}</div> --}}
                        @if($pac->available_tickets <= 10 && $pac->available_tickets != 0)
                        <div class="small text-danger">Hurry up only {{ $pac->available_tickets  }} tickets available</div>
                        @elseif($pac->available_tickets == 0)
                        <div class="small text-danger">Tickets sold out</div>
                        @endif
                    </div>
                    <div class="add-container{{ $key }} ml-auto text-right" id="{{ $key }}">
                        <button type="button" class="event-add-btn btn btn-success px-4 py-1" {{ $pac->available_tickets == 0 ? 'disabled' : '' }}>Add</button>
                            <div class="calc-box row d-none">
                                <div class="col-4 text-left">
                                    <div class="minus-box">-</div>
                                </div>
                                <div class="col-4">
                                    <div class="number-display text-center">0</div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="plus-box">+</div>
                                </div>
                                <div class="available d-none">{{ $pac->available_tickets  }}</div>
                            </div>
                    </div>
                    </div>
                </div>
                @endforeach
                @else
                    @if($event->end_date_time > Carbon\Carbon::now())
                        <p class="font-weight-bold text-info mb-0 text-center">Tickets for this event will be sold soon. Please keep visting our website for the updates.</p>
                    @else
                        <p class="font-weight-bold  text-danger mb-0 text-center">No available package.</p>
                    @endif
                @endif
            </div>
                <div class="bg-light-blue p-3 widget shadow rounded mb-4 d-none" id="book-box">
                    <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Ticket(s) Summary</h1>
                    @foreach($eventpacs as $key => $pac)
                    <div class="ticket-info-box{{ $key }} row d-none ticket-info-box">
                        <div class="col-5 ticket-type">{{ $pac->title }}</div>
                        <div class="col-4 ticket-count">Rs <span class="ticket-amount">{{ $pac->amount }}</span> X <span class="multiply">2</span></div>
                        <input class="form-quantity" type="hidden" name="quantity[]" value="0">
                        <input type="hidden" name="package[]" value="{{ $pac->id }}">
                        <div class="col-3">Rs <span class="ticket-total"></span></div>
                    </div>
                    @endforeach
                    <div class="total-amount d-none">0</div>
                    <input type="hidden" name="e_id" value={{ \encrypt($event->id) }}>
                    <button type="submit" class="btn btn-danger btn-lg btn-block mt-3">Book</button>
                </div>
            </form>
            @endif
        @endif
       </div>
    </div>
 </div>
 <!-- /.container-fluid -->


@endsection
