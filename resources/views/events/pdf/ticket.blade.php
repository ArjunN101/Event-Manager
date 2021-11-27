<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Ticket</title>
    <style>
        html, body{
            font-size: 13px;
            font-family:Arial,sans-serif;
        }
        .text-center{
            text-align: center;
        }
        .text-uppercase{
            text-transform: uppercase;
        }
        .mb-0{
            margin-bottom : 0;
            margin-top: 5px;
        }
        .text-primary{
            color: #044f8c;
        }
        .dotted{
            border-bottom: solid #bcbcbc 0.1px;
            padding-bottom: 5px;
        }
        .text-success{
            color: #044837;
        }
    </style>
</head>
<body>
    <div class="logo text-center" style="padding: 20px 0px 0px 10px;">
        <img src="{{ asset('asset/img/logo.png') }}" style="height: 100px; border-radius: 5px;">
    </div>
    <h2 class="text-center">E-Ticket</h2>
    <table width="100%" style="border: dashed #000 1px;">
        <tr>
            <td width="20%" style="padding-top: 10px;" valign="top" align="center">
                <img src="{{ asset('storage/events/'.$booking->eventDetail->picture) }}" alt="{{ $booking->eventDetail->title }}" style="width:100px; border-radius: 5px;">
            </td>
            <td>
                <h4 class="text-uppercase" style="margin-bottom: 5px; margin-top: 0;">{{ $booking->eventDetail->title }}</h4>
                <p class="text-primary mb-0" style="margin-top: 0">{{ $booking->date }} | {{ Carbon\Carbon::parse($booking->eventDetail->start_date_time)->format('h:i a') }}</p>
                <p class="mb-0">Location : {{ $booking->eventDetail->location }} </p>
                <p style="margin-top: 1px; margin-bottom: 5px;">City : {{ $booking->eventDetail->city->name }}</p>
                <p class="mb-0" style="margin-top: 0">Packages Selected:</p>
                @foreach($booking->packages as $pac)
                    <p class="mb-0 text-success" style="margin: 0;"><span class="float-left">{{ $pac->packageDetails->title }} </span> -- <span class="ml-3"> {{ $pac->quantity }} Tickets</span></p>
                @endforeach
                <p class="dotted" style="margin-top: 5px; font-weight: bold;">Name : <span class="text-capitalize"> {{ $booking->name }}</span></p>
                {{-- <hr class="dotted"> --}}
                <p style="margin-top: 2px;"><span class="text-uppercase">Total Amount Paid</span><span style="font-size: 1.2em; font-weight: bold; float: right; margin-right: 5px;">Rs {{ number_format($booking->transaction->total_amount,2) }}</span></p>
            </td>
            <td style="border-left: solid #a6a6a6 0.5px;">
                <div class="visible-print text-center">
                    <span>{!! QrCode::size(150)->generate($booking->booking_id); !!}</span>
                </div>
                {{-- <hr class="dotted"> --}}
                <div class="text-center">
                    <p class="mb-0">BOOKING ID</p>
                    <h5 class="text-uppercase" style="color: #000; font-weight: bold; margin-top : 0;">{{ $booking->booking_id }}</h5>
                </div>
            </td>
        </tr>
    </table>
    <hr style="margin: 15px 0px 10px 0px; border: dashed #000 0.5px;">
    <div>
       <h3>Instructions</h3>
       <ol>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, id?</li>
           <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia similique dolorem quasi atque! Debitis?</li>
           <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</li>
           <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. At veniam fugiat nam aut blanditiis deleniti, recusandae neque nemo sit laboriosam?</li>
           <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non distinctio aliquam eligendi!</li>
       </ol>
    </div>
</body>
</html>
