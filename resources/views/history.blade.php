<html>
@extends('layouts.app2')

@section('content')
    <body>
<h1 style="padding-left: 10%">Transaction History</h1>
    <div class="card" style="padding-left: 10%;padding-right: 10%">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Purchased Value</th>
                    <th scope="col">Current Value</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <td scope="row">{{$list->dateTime}}</td>
                        <td>{{$list->code}}</td>
                        <td>{{$list->amount}}</td>
                        <td>${{$list->value}}</td>
                        @foreach($stocks as $stock)
                        <td>{{($stock->value) * ($list->amount)}}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </body>

@endsection
</html>
