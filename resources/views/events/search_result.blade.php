@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Events')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-md-fluid">

    <form class="d-inline-block form-inline mr-auto mw-100 navbar-search" method="get" action="{{ route('event.search')}}">
        @csrf
        <div class="input-group">
        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for Events..." aria-label="Search" aria-describedby="basic-addon2" name="event_name" required>
        <div class="input-group-append">
           <button class="btn bg-success" type="submit">
           <i class="fas fa-search fa-sm text-white"></i>
           </button>
        </div>
        </div>
  </form>

     <!--PAGE HEADING AND FILTER RESET--->
     <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Search Result for <span class="text-danger">'{{ $name }}'</span></h1>
        {{-- <i href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Reset Filters <i class="fas fa-times fa-sm text-white-50"></i></i> --}}
    </div>
    <!--PAGE HEADING AND FILTER RESET END--->

     <!-- Content Row -->
     <div class="row">
        <!--MAIN CONTENT START---->
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                @if(count($events) >  0)
                @foreach($events as $event)
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card e-card shadow border-0">
                       <a href="{{ route('event.view', ['slug' => $event->slug]) }}">
                          <div class="m-card-cover">
                             <img src="{{ asset('storage/events/'.$event->picture) }}" class="card-img-top" alt="{{ $event->title }}">
                          </div>
                          <div class="card-body p-0">
                             <div class="row no-gutters align-items-center">
                                <div class="col-md-2 col-12 auto py-md-3 pl-md-3 pt-2 pl-2">
                                   <div class="bg-white rounded text-center d-md-block d-flex">
                                      <h6 class="text-danger mb-0 font-weight-bold">{{ Carbon\Carbon::parse($event->start_date_time)->format('d') }}</h6>
                                      <small class="text-muted ml-md-0 ml-2 mt-1 mt-md-0">{{ Carbon\Carbon::parse($event->start_date_time)->format('M') }}</small>
                                   </div>
                                </div>
                                <div class="col-md-10 col-12 pb-3 p-md-3 pl-md-0 pl-2">
                                   <p class="card-title card-text text-gray-900 mb-1">{{ $event->title }}</p>
                                   <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> {{ $event->city->name }}</small></p>
                                </div>
                             </div>
                          </div>
                       </a>
                    </div>
                 </div>
               @endforeach
               @else
               <h5>No Events Found</h5>
               @endif
               {{-- <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e2.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">10</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Vancouver Fashion Week</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Vancouver, Canada</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e3.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">15</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">DC Environmental Film Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Washington DC, USA</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e4.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">22</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Cape Town International Jazz Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Cape Town, South Africa</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e1.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">07</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Glasgow International Comedy Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Glasgow, Scotland</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e2.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">10</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Vancouver Fashion Week</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Vancouver, Canada</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e3.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">15</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">DC Environmental Film Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Washington DC, USA</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e4.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">22</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Cape Town International Jazz Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Cape Town, South Africa</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card e-card shadow border-0">
                     <a href="events-detail.html">
                        <div class="m-card-cover">
                           <img src="{{ asset('getThrills/img/e1.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body p-0">
                           <div class="row no-gutters align-items-center">
                              <div class="col-2 auto py-3 pl-3">
                                 <div class="bg-white rounded text-center">
                                    <h6 class="text-danger mb-0 font-weight-bold">07</h6>
                                    <small class="text-muted">OCT</small>
                                 </div>
                              </div>
                              <div class="col-10 p-3">
                                 <p class="card-text text-gray-900 mb-1">Glasgow International Comedy Festival</p>
                                 <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Glasgow, Scotland</small></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div> --}}
            </div>
            {{-- <div class="text-center mt-1 mb-4 col-12">
               <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
               </div>
            </div>
         </div> --}}
         <!--MAIN CONTENT END---->

    </div> <!---CONTENT ROW END--->

</div>  <!-- /.container-fluid END -->
@endsection
