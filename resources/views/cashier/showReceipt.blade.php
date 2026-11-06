<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Receipt | sale ID NO : {{ $sale->id }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/receipt.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/no-print.css') }}" media="print">
</head>

<body>
    <div id="wrapper">
        <div class="receipt-header">
            <h3 id="restaurant-name">Fry Chicks</h3>
            <p>Address: Faisal Town, Lahore</p>
            <p>Punjab,Pakistan</p>
            <p>Phone: 090078601</p>
            <p>Receipt No: <strong>{{ $sale->id }}</strong></p>
        </div>
        <div id="receipt-body">
            <h3>Customer Name: {{ $sale->user_name }}</h3>
            <table class="tb-sale-detail">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Menu</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $Sr = 1;
                    @endphp
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td>{{ $Sr++ }}</td>
                            <td>{{ $saleDetail->menu_name }}</td>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>${{ $saleDetail->menu_price }}</td>
                            <td>${{ $saleDetail->menu_price * $saleDetail->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                    <tr>
                        <td>Total Quantity: </td>
                        <td>{{ $saleDetails->count() }}</td>
                        <td>Total</td>
                        <td>${{ number_format($sale->total_price, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Type</td>
                        <td colspan="2">{{ $sale->payment_type }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Paid Amount</td>
                        <td colspan="2">${{ number_format($sale->total_recieved, 2) }}</td>

                    </tr>
                    <tr>
                        <td colspan="2">Change</td>
                        <td colspan="2">${{ number_format($sale->change, 2) }}</td>

                    </tr>
                    <tr>
                        <td colspan="2">Purchase Date</td>
                        <td colspan="2">{{ $sale->created_at }}</td>

                    </tr>
                </tbody>
            </table>
            <div id="receipt-footer">
                <p>Thanks For Shopping.</p>
            </div>
        </div>
        <div id="buttons">
            <a href="/cashier">
                <button class="btn btn-back">
                    Back To cashier
                </button>
            </a>
            <button class="btn btn-print" type="button" onclick="window.print(); return false;">print</button>
        </div>
    </div>
</body>

</html>
