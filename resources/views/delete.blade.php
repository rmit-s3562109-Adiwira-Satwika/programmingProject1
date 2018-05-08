@extends('layouts.app2')
<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #3e8e41;
    }

    #myInput {
        border-box: box-sizing;
        background-image: url("http://icons.iconarchive.com/icons/custom-icon-design/mono-general-2/512/search-icon.png");
        background-size: 20px 20px;
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput:focus {outline: 3px solid #ddd;}

    #myInput2 {
        border-box: box-sizing;
        background-image: url("http://icons.iconarchive.com/icons/custom-icon-design/mono-general-2/512/search-icon.png");
        background-size: 20px 20px;
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput2:focus {outline: 3px solid #ddd;}

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {background-color: #ddd}

    .show {display:block;}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Trading Account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('TradingAccountController@deleteTradingAccount') }}">
                        @csrf

                        &nbsp;&nbsp;
                        <div class="form-group row">
                            <label for="deleteAcc" class="col-sm-4 col-form-label text-md-right">{{ __('Choose an account to delete :') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('deleteAcc') ? ' is-invalid' : '' }}" id="deleteName" name="deleteName" required>
                                    @foreach ($lists2 as $list)
                                        <option value="{{$list->nickname}}">{{$list->nickname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        &nbsp;&nbsp;
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Proceed') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
