@extends('layouts.app2')
<style>
.container{
    width: 100%;
}
input[type=text] {
    display: inline-block;
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 4px;
}
#table-scroll {
  height:160px;
  overflow:auto;
  margin-top:20px;
}
#search-text-input{
    border-top:thin solid  #e5e5e5;
    border-right:thin solid #e5e5e5;
    border-bottom:0;
    border-left:thin solid  #e5e5e5;
    box-shadow:0px 1px 1px 1px #e5e5e5;
    height:40px;
    margin:.8em 0 0 0em;
    outline:0;
    padding:.4em 0 .4em .6em;
    width:450px;
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
    width:450px;
}
.search{
    height: 35px;
    width: 35px;
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
.bar {
    white-space: nowrap;
}
</style>
@section('content')
<div class="container">

  <div class="row justify-content-left">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
  </div>

  <div class="card-deck">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">My Trading Accounts</h5>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                  <th>Nickname</th>
                  <th>Account Balance (AUD)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists2 as $list)
                <tr>
                <form action="{{ action('TradingAccountController@deleteTradingAccount') }}" method="post">
                  <td><label id="name"><a href="/trading_account/{{$list->nickname}}">{{$list->nickname}}</a></label></td>
                  <td>{{$list->balance}}</td>
                </form>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>

    &nbsp;&nbsp;

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Search Stock</h5>
          <div class="bar">
            <input type='text' placeholder='Search...' id='search-text-input' name='search-text-input'>
            <img class="search"
                  src='https://cdn1.iconfinder.com/data/icons/hawcons/32/698627-icon-111-search-512.png'>
            <div id="searchOutput"></div>
          </div>

          <script>
            $(document).ready(function(){
              $(".search").click(function(){
                if((document.getElementById('search-text-input').value) != ""){
                  $('#searchOutput').html(`

                  `)
                  @foreach ($lists as $list)
                    var code = "{{$list->code}}";
                    var name = "{{$list->name}}";
                    if( ((document.getElementById('search-text-input').value).toUpperCase()
                        == (code).toUpperCase()) ||
                        ((name).toUpperCase()
                            .includes((document.getElementById('search-text-input').value)
                                .toUpperCase()) == true) ){
                        $('#searchOutput').html(`
                        <br>
                              <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>{{$list->code}}</td>
                                <td>{{$list->name}}</td>
                                <td>
                                <a href='/home/{{ $list->code }}'>${{$list->value}}
                                </a>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                        `)
                    }
                  @endforeach
                    }else{
                      $('#searchOutput').html(`
                          <p><font color="red">Error: Invalid value. Please enter a stock code / name.</font></p>
                      `)
                    }
              });
            });
          </script>

          <div id="table-scroll">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Code</th>
                    <th>Name</th>
                    <th>Value</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($lists as $list)
                <tr>
                  <td>{{$list->code}}</td>
                  <td>{{$list->name}}</td>
                  <td>
                    <a href='/home/{{ $list->code }}'>${{$list->value}}
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <br>
</div>
@endsection
