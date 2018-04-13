@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Shares</h2>
          <div class="table-responsive">
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
                    <a href='/dashboard/{{ $list->code }}'>
                    ${{ $list->value }}
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
    </div>
</div>
@endsection
