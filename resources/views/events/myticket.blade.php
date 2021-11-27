@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'getThrills.com | My Tickets')

@section('CSS')
    <style>
        .tickets{
           position: relative;
           font-size: 0.8rem;
        }
        .download-ticket{
            position: absolute;
            right: 0;
            top: calc(100% - 1.8em);
            /* margin-top: -0.8rem; */
            margin-right: 0.8rem;
        }
        .qr-box{
            border-left: dashed #787878 1px;
        }
        .pagination{
            justify-content: center;
        }
        @media only screen and (max-width: 800px){
            .qr-box{
                border-left: none;
            }
        }
    </style>
@endsection

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
<h3 class="text-center text-uppercase font-weight-bold">My Tickets</h3>

<div class="p-lg-5">
    @if(count($bookings) > 0)
    @foreach($bookings as $booking)
    <div class="p-3 tickets mb-5" style="width: 100%; background-color: #fff; color: #000; border: dashed #868282 0.5px; border-radius: 5px;">
        <div class="row">
            <div class="col-2 text-center d-none d-md-none d-lg-block">
                <img src="{{ asset('storage/events/'.$booking->eventDetail->picture) }}" alt="{{ $booking->eventDetail->title }}" style="width:100%;">
            </div>
            <div class="col-md-12 col-lg-7">
                <h6 class="text-uppercase">{{ $booking->eventDetail->title }}</h6>
                <p class="text-primary mb-0">{{ $booking->date }} | {{ Carbon\Carbon::parse($booking->eventDetail->start_date_time)->format('h:i a') }}</p>
                <p class="mb-0">Location : {{ $booking->eventDetail->location }}, Hatigaon </p>
                <p >City : {{ $booking->eventDetail->city->name }}</p>
                <p class="mb-0">Packages Selected:</p>
                @foreach($booking->packages as $pac)
                    <p class="mb-0 text-success"><span class="float-left">{{ $pac->packageDetails->title }} </span> -- <span class="ml-3"> {{ $pac->quantity }} Tickets</span></p>
                @endforeach
                <p class="mt-2 mb-1 font-weight-bold">Name : <span class="text-capitalize"> {{ $booking->name }}</span></p>
                {{-- <p class="mb-0"><span class="float-right">Convenience fees : Rs {{ $booking->transaction->convenience_fee }}</span></p><br> --}}
                <hr class="mb-1">
                <p><span class="text-uppercase d-lg-inline d-block text-center">Total Amount Paid</span><span class="float-lg-right font-weight-bold d-lg-inline d-block text-center" style="font-size: 1.8em;">Rs {{ number_format($booking->transaction->total_amount, 2) }}</span></p>
            </div>
            <div class="qr-box col-12 col-lg-3 order-first order-lg-last">
                <div class="text-center">
                    <span class="d-xl-block d-md-none d-none">{!! QrCode::size(200)->generate($booking->booking_id); !!}</span>
                    <span class="d-xl-none d-md-block">{!! QrCode::size(150)->generate($booking->booking_id); !!}</span>
                </div>
                <hr>
                <div class="text-center">
                    <p class="mb-0 text-dark">BOOKING ID</p>
                    <h5 class="text-uppercase font-weight-bold" style="color: #000;">{{ $booking->booking_id }}</h5>
                </div>
                <hr class="d-lg-none d-md-block">
            </div>
        </div>
        <a class="float-right download-ticket" href="{{ asset('storage/tickets/'. $booking->ticket) }}">Download</a>
    </div>
    @endforeach
    <div class="text-center">
        {{ $bookings->links() }}
    </div>
    @else
    <div class="text-center p-5">
        <h3 class="text-center">No Ticket Available</h3>
    </div>

    @endif
</div>
</div>  <!-- /.container-fluid END -->
@endsection
