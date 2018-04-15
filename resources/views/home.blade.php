@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Stock List</h5>
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
                                <a href='/dashboard/{{ $list->code }}'>${{$list->value}}
                                </a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">
                    Trading Account Management
                    </h5>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Transaction history</li>
                    <li class="list-group-item">My stock performance</li>
                    <li class="list-group-item"><a href="/search">Search for stock</a></li>
                    <li class="list-group-item">Transfer funds</li>
                    <li class="list-group-item">Change nickname</li>
                    <li class="list-group-item">Delete account</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
@endsection
