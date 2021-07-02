<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel hey</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
        html,
        body {
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

        .links>a {
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="title m-b-md">
            {{__('messages.add your offer')}}
        </div>

        @if (Session::has('success'))
        <div class="alert-success alert  " role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        {{-- <!-- <form method='POST' action="{{url('offers\store')}}"> --> --}}
        <!-- OR  -->
        <form method='POST' action="{{route('anyName.here')}}">
            @csrf
            <div class="form-group" style='width:50%; margin:0 auto'>
                <label for="exampleInputEmail1">{{__('messages.offer name')}}</label>
                <!-- name='name' should be similar to the field price in DB -->
                <input type="text" class="form-control" name='name' placeholder="{{__('messages.pholder')}}">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <label for="exampleInputPassword1">{{__('messages.offer price')}}</label>
                <!-- name='price' should be similar to the field price in DB -->
                <input type="text" class="form-control" name='price' placeholder="Offer Price">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <label for="exampleInputPassword1">{{__('messages.offer details')}}</label>
                <!-- name='details' should be similar to the field price in DB -->
                <input type="text" class="form-control" name='details' placeholder="Offer Details">
                @error('details')
                <small class="form-text text-danger">{{$message}}</small><br>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('messages.safe offer')}}</button>

        </form>

    </div>
    </div>
</body>

</html>