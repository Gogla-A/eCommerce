<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-5 mt-15">
                    <h1 style="margin-top: 100px">Make your offer</h1>
                </div>
            </div>
        </div>

    <form method="POST" action={{route('offers.store')}}>
        @csrf
        {{--<input name="_token" value="{{csrf_token()}}">--}}
        <div class="form-group text-center" style="width: 400px;margin-left: 825px">
            <label for="exampleInputEmail1">Offer Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Offer Name">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group text-center" style="width: 400px;margin-left: 825px">
            <label for="exampleInputPassword1">Details</label>
            <input type="text" class="form-control" placeholder="Enter Your Details">
            @error('details')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div style="margin-left: 985px;margin-top: 30px">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </body>
</html>
