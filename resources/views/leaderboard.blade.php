<!doctype html>
<html lang="en">
@extends('layouts.app')

@section('content')

    <body>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Account Name</th>
                <th scope="col">Trading Value</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($boards as $board)
            <tr>
                <th scope="row">{{$board->place}}</th>
                <td>{{$board->nickname}}</td>
                <td>{{$board->trading_value}}</td>
                <td>{{$board->date}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </body>

</html>

@endsection