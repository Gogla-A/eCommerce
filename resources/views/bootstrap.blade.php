<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!--bootstrap links-->
        <link href="/public/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet"/>
        <script src="/public/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Add Your Offer
            </div>
        </div>
    </div>

    <form method="POST" action={{route('offers.store')}}>
        @csrf
        {{--        <input name="_token" value="{{csrf_token()}}">--}}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Price">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </body>

</html>
