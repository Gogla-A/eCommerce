<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .error {
            color: #ae1c17;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LARAVEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>    <table class="table">

    <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-3 mt-15">
                    <h1 style="margin-top: 100px">{{__('messages.Edit The offer')}}</h1>
                </div>
            </div>
        </div>
            @if(session()->has('message'))
                <div class="alert alert-primary mb-3" role="alert" style="width: 400px;text-align: center;margin-left: 560px;}">
                    {{ session('message') }}
                </div>
            @endif
    <form method="POST" action={{route('offers.update',$offer->id)}}>
        @csrf
        {{--<input name="_token" value="{{csrf_token()}}">--}}

        <div class="form-group text-center" style="width: 400px;margin-left: 560px">
            <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
            <input type="text" name="name" value="{{$offer -> name}}" class="form-control" aria-describedby="emailHelp" placeholder="{{__('messages.Enter Offer Name')}}">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group text-center" style="width: 400px;margin-left: 560px">
            <label for="exampleInputEmail1">{{__('messages.Offer Photo')}}</label>
            <input type="file" name="photo" class="form-control">
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group text-center" style="width: 400px;margin-left: 560px">
            <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
            <input type="text" name="price" value="{{$offer -> price}}"  class="form-control" placeholder="{{__('messages.Enter Offer Price')}}">
            @error('price')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div><div class="form-group text-center" style="width: 400px;margin-left: 560px">
            <label for="exampleInputPassword1">{{__('messages.Offer Details')}}</label>
            <input type="text" name="details" value="{{$offer -> details}}"  class="form-control" placeholder="{{__('messages.Enter Offer Details')}}">
            @error('details')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div style="margin-left: 725px;margin-top: 30px">
        <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
        </div>
    </form>
    </body>
</html>
