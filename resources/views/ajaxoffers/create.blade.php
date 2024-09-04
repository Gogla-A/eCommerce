@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-3 mt-15">
                    <h1 style="margin-top: 100px">{{__('messages.Make your offer')}}</h1>
                </div>
            </div>
            <div class="alert alert-success" id="success_msg" style="display: none;">
                Data Updated Successfully
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-primary mb-3" role="alert" style="width: 400px;text-align: center;margin-left: 560px;}">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" id="offerForm" action="" enctype="multipart/form-data">
            @csrf
            {{--<input name="_token" value="{{csrf_token()}}">--}}

            <div class="form-group text-center" >
                <label for="exampleInputEmail1">{{__('messages.Offer Name')}}</label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="{{__('messages.Enter Offer Name')}}">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group text-center" >
                <label for="exampleInputEmail1">{{__('messages.Offer Photo')}}</label>
                <input type="file" name="photo" class="form-control">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group text-center" >
                <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                <input type="text" name="price" class="form-control" placeholder="{{__('messages.Enter Offer Price')}}">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div><div class="form-group text-center" >
                <label for="exampleInputPassword1">{{__('messages.Offer Details')}}</label>
                <input type="text" name="details" class="form-control" placeholder="{{__('messages.Enter Offer Details')}}">
                @error('details')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group text-center">
                <button id="save_offer" class="btn btn-primary">{{__('messages.Submit')}}</button>
            </div>
            <div class="form-group text-center">
                <a href="{{url('offers/all')}}" class="btn btn-success" style="margin-left: -25px">{{__('messages.Show All Offers')}}</a>
            </div>
        </form>
    </div>
@stop
@section('scripts')
    <script>
        $(document).on('click','#save_offer',function(e){
            e.preventDefault();
            var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: "post",
                enctype: 'multipart/form-data',
                url: "{{ route('ajax.offers.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if(data.status == true){
                        $('#success_msg').show();
                    }


                }, error: function (reject) {
                }
            })
        });

    </script>
@stop
