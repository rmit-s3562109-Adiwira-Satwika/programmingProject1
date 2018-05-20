<html>
@extends('layouts.app2')
<style>
#table-scroll {
  height:260px;
  overflow:auto;
  margin-top:20px;
}
#table-scroll2 {
  height:200px;
  overflow:auto;
  margin-top:20px;
}
</style>
@section('content')
<body>
    <br>
    <div class="card">
        <div class="card-header">My Shares Inventory</div>
        <div class="card-body">
            <div id="table-scroll2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Stock Code</th>
                            <th scope="col">Available Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists2 as $list)
                            <tr>
                                <td>{{$list->asx_code}}</td>
                                <td>{{$list->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    <br><br><br>
    <div class="card">
        <div class="card-header">Transaction History</div>
        <div class="card-body">

            <div id="table-scroll">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Purchased Value</th>
                        <th scope="col">Current Value</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <td scope="row">{{$list->dateTime}}</td>
                            <td>{{$list->code}}</td>
                            <td>{{$list->amount}}</td>
                            <td>${{$list->value}}</td>
                            <td>
                            <script>
                                var code = "{{$list->code}}";
                                @foreach($stocks as $stock)
                                    var stckcode = "{{$stock->code}}";
                                    if(stckcode == code) {
                                        var val = "{{$stock->value}}";
                                        var amount = "{{$list->amount}}";
                                        var currVal = val * amount
                                        document.write(currVal.toFixed(2));
                                    }
                                @endforeach
                            </script>
                            </td>
                            <td>
                            <script>
                                var value = "{{$list->purchase}}";
                                if(value == "1") {
                                    document.write("buy");
                                } else if(value == "0") {
                                    document.write("sell");
                                }
                            </script>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

@endsection
</html>
