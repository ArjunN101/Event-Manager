<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>

    <style>
        body{
            background-color: #d5dbe6;
            font-family:Arial,sans-serif;
            font-size: 12px;
        }
        .container{
            padding: 2% 20%;
        }
        .container-box{
            background-color: #fff;
            color: #182430;
            border-radius: 15px;
            padding: 20px;
        }
        .header{
            text-align: center;
            border-radius: 15px 15px 0 0;
        }
        .logo{
            height: 100px;
            padding-bottom: 10px;
        }
        .ticket{
            background-color: #f5f5f5;
            color: #3c3c3c;
            border-radius: 5px;
            padding: 20px;
        }
        .table-hr{
            border: dashed 0.2px #a3a3a3;
        }
        .text-light{
            color: #a0a0a0;
        }

        @media only screen and (max-width: 800px){
            body{
                font-size: 10px;
            }
            .container{
                padding: 2% 8%;
            }
            .logo{
                height: 50px;
                padding-bottom: 5px;
            }
        }

        @media only screen and (max-width: 700px){
            body{
            font-size: 8px;
            }
            .container{
                padding: 2% 5%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-box">
            <div class="header">
                <img class="logo" src="{{ $message->embed($pathToLogo) }}">

                <h3 style="color: #06a426; font-weight: 650; margin-bottom: 0;">YOUR BOOKING IS CONFIRMED</h3>
                <h3 style="text-align: center">Booking Id {{ $booking->booking_id }}</h3>
            </div>
            <div style="padding: 30px;">
                <div class="ticket">
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td>&nbsp;</td>
                            <td width="20%">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{ $message->embed($eventBanner) }}" style="height: 60px; border-radius: 4px;">
                            </td>
                            <td colspan="2" valign="top" style="padding-left: 15px;">
                                <h2 style="margin-top: 0;">{{ $booking->eventDetail->title }}</h2>
                                <p>{{ $booking->date }} | {{ Carbon\Carbon::parse($booking->eventDetail->start_date_time)->format('h:m a') }}</p>
                                <p>{{ $booking->eventDetail->location }}, {{ $booking->eventDetail->city->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr class="table-hr">
                            </td>
                        </tr>
                        @foreach($booking->packages as $pac)
                        <tr>
                            <td colspan="2">{{ $pac->packageDetails->title }}</td>
                            <td>{{ $pac->quantity }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <h3 style="font-weight: bold; margin-top: 30px;">ORDER SUMMARY</h3>
                <div class="summary-box">
                    <table cellspacing="0" cellpadding="10" width="100%" style="padding: 10px; border: solid #a3a3a3 0.5px;">
                        <tr>
                            <td width="60%" style="text-transform: uppercase">Total Ticket Price</td>
                            <td>Rs {{ $booking->transaction->total_amount - $booking->transaction->convenience_fee }}</td>
                        </tr>
                        <tr>
                            <td style="text-transform: uppercase">Convienence Fee</td>
                            <td>Rs {{ $booking->transaction->convenience_fee }}</td>
                        </tr>
                        <tr>
                            <td style="padding-top: 20px; padding-bottom: 20px; background-color: #f5f5f5; font-weight: bold;">
                               TOTAL PAID
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; background-color: #f5f5f5; font-weight: bold;">
                                Rs. {{ $booking->transaction->total_amount }}
                            </td>
                        </tr>
                    </table>
                </div>
                <hr style="border: solid #f5f5f5 0.5px; margin: 20px 0;">

                <h3 class="text-light" style="margin-top: 0">IMPORTANT INSTRUCTIONS</h3>
                <ul class="text-light">
                    <li>This transaction cannot be cancelled as per cinema cancellation policy.</li>
                    <li>This transaction cannot be cancelled as per cinema cancellation policy.</li>
                    <li>This transaction cannot be cancelled as per cinema cancellation policy.</li>
                    <li>This transaction cannot be cancelled as per cinema cancellation policy.</li>
                </ul>
                <hr style="border: solid #adadad 0.5px; margin: 20px 0;">
                <div style="text-align: center;">
                    <p style="font-weight: bold; margin:0; margin-bottom: 2px;">For Further Assitance</p>
                    <p style="font-weight: bold; margin:0; margin-bottom: 2px;">helpdesk@getthrills.com</p>
                    <p style="font-weight: bold; margin:0;">9512484121 | 2415412478</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
