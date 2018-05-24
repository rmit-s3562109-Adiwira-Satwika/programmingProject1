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
#search-user-input{
    border-top:thin solid  #e5e5e5;
    border-right:thin solid #e5e5e5;
    border-bottom:0;
    border-left:thin solid  #e5e5e5;
    box-shadow:0px 1px 1px 1px #e5e5e5;
    height:40px;
    margin:.8em 0 0 0em;
    outline:0;
    padding:.4em 0 .4em .6em;
    width:440px;
}
.search1{
    height: 35px;
    width: 35px;
}
.imgIcon{
    height: 28px;
    width: 28px;
    margin-left: 20px;
}
</style>
@section('content')
<body>
    <br>
    <div class="card">
        <div class="card-header">My Friends</div>
        <div class="card-body">
            <div>
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Friends</h5>
                            <div class="bar">
                                <input type='text' placeholder='Find Existing Users...' id='search-user-input' name='search-user-input'>
                                <img class="search1"
                                    src='https://cdn1.iconfinder.com/data/icons/hawcons/32/698627-icon-111-search-512.png'>
                                <div id="searchUserOutput"></div>
                            </div>

                            <script>
                                $(document).ready(function(){
                                $(".search1").click(function(){
                                    if((document.getElementById('search-user-input').value) != ""){
                                    $('#searchUserOutput').html(`

                                    `)
                                    @foreach ($lists4 as $list)
                                        var name = "{{$list->nickname}}";
                                        if( ((name).toUpperCase().includes((document.getElementById('search-user-input').value).toUpperCase()) == true) ) {
                                        $('#searchUserOutput').html(`
                                            <br>
                                            <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                <th>Nickname</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="" method="post">
                                                <tr>
                                                <td><input type="hidden" id="usrName" name="usrName">{{$list->nickname}}</input></td>
                                                <td><input type="hidden" id="currTradeAcc" name="currTradeAcc">{{$currName}}</input></td>
                                                <td><button type="submit" class="btn btn-primary">Add</button></td>        
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                </tr>
                                                </form>
                                            </tbody>
                                            </table>
                                        `)
                                        }
                                    @endforeach
                                        }else{
                                        $('#searchUserOutput').html(`
                                            <p><font color="red">Error: Invalid user. Please try again.</font></p>
                                        `)
                                        }
                                });
                                });
                            </script>

                            <div id="table-scroll">
                                <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                    <th>Other Available Users</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    @foreach ($lists4 as $list)
                                    <tr>
                                    <form action="/trading_account/{nickname}" method="post">
                                        <td><input type="hidden" id="usrName" name="usrName" value="{{$list->nickname}}">{{$list->nickname}}</td>
                                        <input type="hidden" id="currTradeAcc" name="currTradeAcc" value="{{$currName}}">
                                        <td><button type="submit" class="btn btn-primary">Add</button></td>        
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Friends Lists</h5>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                    <th>Nickname</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists5 as $list)
                                    <tr>
                                        <td>{{$list->friend}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($lists7 as $list2)
                                    <tr>
                                        <td>{{$list2->nickname}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">My Friends Requests</h5>
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                    <th>Nickname</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists6 as $list)
                                    <tr>
                                        <form action="{{ action('FriendController@acceptFriendReq') }}" method="post">
                                            <td><input type="hidden" id="fromUser" name="fromUser" value="{{$list->from}}">{{$list->from}}</td>
                                            <input type="hidden" id="currUser" name="currUser" value="{{$currName}}">
                                            <td><a href="/accept"><button type="submit" class="btn btn-success">Accept</button></a></td>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <br><br><br>
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
