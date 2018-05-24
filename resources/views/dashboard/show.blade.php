<!doctype html>
<html lang="en">
@extends('layouts.app2')

@section('content')
<body onload="checkButton();">
    <div class="container">
        <div class="row justify-content-center">
            <main>
                <div>
                    <h1>Stock Details for: {{ $list->code }} - {{ $list->name }} </h1>
                    <br>
                </div>

                <div class="container">
                    <form method="POST" action="/buy">
                    @csrf
                        <div class="form-group">
                            <label>Nickname</label>
                            <select class="form-control" id='name' name='name' required>
                                @foreach($accounts as $account)
                                    <option value="{{$account->nickname}}">
                                        {{$account->nickname}}: ${{$account->balance}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="code">Stock code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $list->code }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Unit to buy:</label>
                            <input type="number" class="form-control" id="amount" name="amount" min="1" required>
                        </div>

                        <button class="btn btn-success" type="submit">Buy</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" id="sell" type="submit" formaction="/sell" disabled>Sell</button>
                    </form>

                    <script>
                        function checkButton() {
                            var e = document.getElementById('name');
                            var name = e.options[e.selectedIndex].value;
                            var code = document.querySelector('#code').value;
                            @foreach($stock as $stck)
                                var checkName = "{{$stck->trading_nickname}}";
                                var checkCode = "{{$stck->asx_code}}";
                                if(checkName == name) {
                                    if(checkCode == code) {
                                        document.getElementById('sell').disabled = false;
                                    }
                                }
                            @endforeach
                        }
                    </script>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
@endsection