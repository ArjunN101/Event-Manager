@extends('layouts.user_layouts.master')
<!--DESCRIPTION META TAG HERE-->
@section('description')

@endsection
<!--DESCRIPTION META TAG END HERE-->

@section('title', 'Events | Booking')

@section('CSS')
<style>
    input[type="checkbox"].is-invalid{
        outline: solid red 0.5px !important;
    }
</style>
@endsection

@section('content')
<section class="container order-summary-box" style="color: #000;">
    <h4 class="mb-2">Event Details</h4>
        <div class="row">
            <div class="d-none d-md-block col-12 col-sm-2 text-center">
               <img src="{{ asset('storage/events/'.$event->picture) }}" alt="{{ $event->title }}" style="max-height: 10rem;">
            </div>
            <div class="d-block d-md-none col-12 text-center pb-3">
               <img class="img-fluid" src="{{ asset('storage/events/'.$event->cover) }}" alt="{{ $event->title }}" style="max-height: 10rem;">
            </div>
            <div class="col-12 col-sm-10">
                <h6>{{ $event->title }}</h6>
                <p class="text-danger mb-1">{{ $date }} | {{ Carbon\Carbon::parse($event->start_date_time)->format('h:i a') }}</p>
                <p class="text-primary  mb-0">{{ $event->location }}</p>
                <p class="text-primary">{{ $event->city->name }}</p>
            </div>
        </div>
    <h4 class="mt-3">Order Summary</h4>

    <div class="pl-1 pl-md-3 pt-2 pt-md-3">
        <table class="order-summary-table" width="100%">
            <thead>
                <tr class="text-uppercase bg-success text-light">
                    <th width="50%" class="text-left p-1">Item</th>
                    <th class="text-left p-1">Qty</th>
                    <th class="text-right p-1">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkout_data as $data)
                @if($data['qty'] != 0)
                <tr >
                    <td class="p-2">
                        <span class="text-capitalize">{{ $data['title'] }}</span> <br>
                        <span class="text-primary">{!! $data['description'] !!}</span>
                    </td>
                    <td class="text-left p-2">
                        {{ $data['qty'] }}
                    </td>
                    <td class="text-right p-2">
                        {{ number_format($data['sub_total'], 2) }}
                    </td>
                </tr>
                @endif
                @endforeach
                <tr style="border-top: 0.5px solid #a2a2a2; border-bottom: 0.5px solid #a2a2a2;">
                    <td colspan="3" class="text-right py-3" >
                        <span>+Convenience Fee  &nbsp; &nbsp; Rs {{ number_format($total_tax, 2) }}</span><br>
                        <span>Total &nbsp; Rs {{ number_format($total_amount, 2) }}</span>
                    </td>
                </tr>
                <form method="POST" action="{{ route('book.checkout') }}">
                    @csrf
                <tr>
                    <td colspan="3" class="py-3" >
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-5">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Name" value="{{ old('name') }}">

                                @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-7 mt-1">
                                This name will be show up on your ticket. Please carry a valid photo ID.
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="py-1" >
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-5">
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="Mobile Number" value="{{  old('phone') }}">

                                @error('phone')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-7 mt-1">
                                This mobile number will receive the confirmation SMS.
                            </div>
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom: 0.5px solid #a2a2a2;">
                    <td colspan="3" class="py-1" >
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-5">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email Address" value="{{  old('email') }}">

                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-7 mt-1">
                                This email address will receive the e-ticket.
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" class="pt-2">
                        <div>
                            <input class="mr-2 @error('terms') is-invalid @enderror" type="checkbox" id="terms" name="terms" value="1" {{ old('terms') == 1 ? 'checked' : '' }}>
                            <label for="terms" class="@error('terms') is-invalid @enderror" style="border: none;"> I accept and have read the <a href="">terms and conditions</a></label>

                            @error('terms')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-success px-3 text-uppercase">Checkout</button>
                        </div>
                    </td>
                </tr>

            </form>
            </tbody>
        </table>
    </div>
</section>

@endsection
