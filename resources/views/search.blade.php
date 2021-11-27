@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Events, Movies, Sports')

@section('content')

<!--Begin Page Content -->
<div class="container-md-fluid">

    

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                  <h1 class="h5 mb-0 text-gray-900">Search Results for "{{$name}}"</h1>
    </div>
    

  

    <!--------------------EVENTS START-------------------------->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mt-1 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Events</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="row">
    @if(count($events)>=1)
        @foreach($events as $event)
        <div class="col-xl-3 col-md-6 col-6 mb-4">
        <div class="card e-card shadow border-0">
            <a href="{{ route('event.view', ['slug' => $event->slug]) }}">
                <div class="m-card-cover">
                    <img src="{{ asset('storage/events/'.$event->picture) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters align-items-center">
                    <div class="col-2 auto py-3 pl-3">
                        <div class="bg-white rounded text-center">
                            <h6 class="text-danger mb-0 font-weight-bold">{{ Carbon\Carbon::parse($event->start_date_time)->format('d') }}</h6>
                            <small class="text-muted">{{ Carbon\Carbon::parse($event->start_date_time)->format('M') }}</small>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <p class="card-text text-gray-900 mb-1">{{ $event->title }}</p>
                        <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt fa-sm ml-1"></i> {{ $event->city->name }}</small></p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
        </div>
        @endforeach
        @else
                        <div class="col-xl-12 col-md-6 mb-4"><span>There are no events that matched your query.</span></div>
        @endif
    </div>
    </div>
    </div>

    <!-- Page Heading -->
    <!-------------------------EVENTS END-------------------------------->


  
   
</div>
<!-- /.container-fluid -->

@endsection
