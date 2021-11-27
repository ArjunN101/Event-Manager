@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Events, Movies, Sports')

@section('CSS')
<style>
     @media only screen and (max-width: 500px){
         footer{
             margin-bottom: 3.5rem;
         }
         .bottom-nav{
            display: block;
        }
    }
</style>
@endsection

<!--Bottom Nav-->
@section('bottom_nav')
<div class="bottom-nav">
    <div class="bottom-box d-flex pl-4">
         <a class="active" href="{{ route('index') }}">
              <i class="ml-1 fas fa-fw fa-home"></i>
            <span class="d-block">Home</span>
        </a>
        
         <a class="mr-5" href="{{ route('event.all') }}">
            <i class="ml-1 fas fa-fw fa-glass-cheers"></i>
            <span class="d-block">Events</span>
        </a>
    </div>
</div>
@endsection

@section('content')

<!--Begin Page Content -->
<div class="container-md-fluid">

    <!-------SLIDER------->
    <div class="osahan-slider">
        @foreach($carousels as $carousel)
        <div class="osahan-slider-item"><img src="{{ asset('storage/carousel/'.$carousel->picture) }}" class="img-fluid rounded" alt="..."></div>
        @endforeach
    </div>
    <!-------SLIDEREND------->


    <!--------------------EVENTS START-------------------------->
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mt-2 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Events</h1>
        @if(count($events) > 0)
        <a href="{{ route('event.all') }}" class="d-inline-block mt-2 mt-md-0 text-xs">View All <i class="fas fa-eye fa-sm"></i></a>
        @endif
    </div>
    <!-- Content Row -->
    <div class="mobile-width">
    <div class="row mobile-width-box">
        @if(count($events) > 0)
        @foreach($events as $event)
        <div class="col-3 mb-2">
            <div class="card e-card shadow border-0">
               <a href="{{ route('event.view', ['slug' => $event->slug]) }}">
                  <div class="m-card-cover">
                     <img src="{{ asset('storage/events/'.$event->picture) }}" class="img-fluid rounded-top card-img-top"  alt="{{ $event->title }}">
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
        <div class="col-12 text-center p-3">
            <h3 class="text-center">No Event Available</h3>
        </div>
        @endif
    </div>
    </div>
    <!-- Page Heading -->
    <!-------------------------EVENTS END-------------------------------->


    {{-- <div class="d-sm-flex align-items-center justify-content-between mt-1 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Sports</h1>
        <a href="sports.html" class="d-none d-sm-inline-block text-xs">View All <i class="fas fa-eye fa-sm"></i></a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card e-card shadow border-0">
            <a href="sports-detail.html">
                <div class="m-card-cover">
                    <img src="{{ asset('getThrills/img/s1.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters align-items-center">
                    <div class="col-2 auto py-3 pl-3">
                        <div class="bg-white rounded text-center">
                            <h6 class="text-danger mb-0 font-weight-bold">25</h6>
                            <small class="text-muted">OCT</small>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <p class="card-text text-gray-900 mb-1">The FIFA World Cup</p>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> Glasgow, Scotland</small></p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card e-card shadow border-0">
            <a href="sports-detail.html">
                <div class="m-card-cover">
                    <img src="{{ asset('getThrills/img/s2.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters align-items-center">
                    <div class="col-2 auto py-3 pl-3">
                        <div class="bg-white rounded text-center">
                            <h6 class="text-danger mb-0 font-weight-bold">28</h6>
                            <small class="text-muted">OCT</small>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <p class="card-text text-gray-900 mb-1">The Olympic Games</p>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> United States</small></p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card e-card shadow border-0">
            <a href="sports-detail.html">
                <div class="m-card-cover">
                    <img src="{{ asset('getThrills/img/s3.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters align-items-center">
                    <div class="col-2 auto py-3 pl-3">
                        <div class="bg-white rounded text-center">
                            <h6 class="text-danger mb-0 font-weight-bold">12</h6>
                            <small class="text-muted">NOV</small>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <p class="card-text text-gray-900 mb-1">The 24 Hours of Le Mans</p>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> France</small></p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card e-card shadow border-0">
            <a href="sports-detail.html">
                <div class="m-card-cover">
                    <img src="{{ asset('getThrills/img/s4.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters align-items-center">
                    <div class="col-2 auto py-3 pl-3">
                        <div class="bg-white rounded text-center">
                            <h6 class="text-danger mb-0 font-weight-bold">21</h6>
                            <small class="text-muted">NOV</small>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <p class="card-text text-gray-900 mb-1">The Super Bowl</p>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> United States</small></p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
        </div>
    </div>
    <div class="text-center mt-1 mb-4">
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
</div>
<!-- /.container-fluid -->

@endsection
