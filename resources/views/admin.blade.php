<!doctype html>
<html lang="en">
@extends('layouts.app')

@section('content')

    <div class="card">
        <h5 class="card-title">Inactive Users</h5>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Last Active</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->last_active}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
</html>