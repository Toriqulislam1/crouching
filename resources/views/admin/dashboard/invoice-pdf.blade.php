<!DOCTYPE html>
<html>
<head>
    {{-- <title>Invoice-{{$invoice->order_id}}</title> --}}
</head>
<body>
<div style="font-family: Arial, sans-serif; margin: 0 auto; max-width: 600px; width: 100%">
    <div style="background-color: #f5f5f5;">
        <img src="{{ asset('public/logo.png') }}" alt="Company Logo" style="width: 335px; height: 68px; float: left;">
        <h5 style="font-size: 15px; margin: 0; color: #333; float: right; padding: 20px"> {{$basic->title}}</h5>
        <div style="clear: both;"></div>
    </div>

    <div style="padding: 20px;">
        <div style="width: 30%; display: inline-block; vertical-align: top;">
            <h2 style="font-size: 16px; margin: 0;">Bill From:</h2>
            <p style="font-size: 14px; margin: 0;">
                {{$basic->title}}<br>
                {{$basic->phone}}<br>
                {{$basic->email}}<br>

            </p>
        </div>
        <div style="width: 38%; display: inline-block; vertical-align: top;">
            <h2 style="font-size: 16px; margin: 0;">Bill To:</h2>
            <p style="font-size: 14px; margin: 0;">
                {{$invoice->user->name}}<br>
                {{$invoice->user->phone}}<br>
                {{$invoice->user->email}}<br>
                {{$invoice->user->address}}<br>
            </p>
        </div>
        <div style="width: 30%; display: inline-block; vertical-align: top; float:right">
            <h2 style="font-size: 16px; margin: 0;">Payment Info:</h2>
            <p style="font-size: 14px; margin: 0;">
                <label for="" class="badge btn btn-info">package: {{$invoice->status}}</label><br>
                <label for="" class="badge btn btn-info">payment: {{$invoice->payment_status}}</label><br>
                Invoice#{{$invoice->order_id}}<br>
                @if($invoice->status == 'paid')
                    {{$invoice->payment_method}}<br>
                    {{$invoice->transaction_id}}<br>
                @endif
            </p>
        </div>
        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">Course</th>
                <th style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">Discount</th>
                <th style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">Price</th>
            </tr>
            </thead>
            <tbody>
                <tr style="text-align: center">
                    {{-- <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$invoice->package->title}}</td> --}}
                    <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$basic->currency}} {{ $invoice->discount }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$basic->currency}} {{$invoice->total_amount}}</td>
                </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-size: 14px;">Price:</td>
                <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$basic->currency}} {{$invoice->total_amount}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-size: 14px;">Discount Amount:</td>
                <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$basic->currency}} {{$invoice->discount}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-size: 14px;">Payable Amount:</td>
                <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{$basic->currency}} {{$invoice->total_amount}}</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div style="background-color: #f5f5f5; padding: 20px; text-align: center;">
        <p style="font-size: 14px; margin: 0;">Thank you for your Course enroll !</p>

    </div>
</div>
</body>
</html>
