@extends('layouts.app')
@section('content')
    <div class="alert alert-success" id="success_msg" style="display: none;">
        Data Deleted Successfully
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <th scope="col">{{__('messages.Offer Price')}}</th>
            <th scope="col">{{__('messages.Offer Photo')}}</th>
            <th scope="col">{{__('messages.Offer Details')}}</th>
            <th scope="col">{{__('messages.Operations')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr class="offerRow{{$offer -> id}}">
                <th scope="row">{{$offer -> id}}</th>
                <td>{{$offer -> name}}</td>
                <td>{{$offer -> price}}</td>
                <td><img  style="width: 90px; height: 90px;" src="{{asset('images/offers/'.$offer->photo)}}"></td>
                <td>{{$offer -> details}}</td>
                <td><a href="{{route('ajax.offers.edit',$offer -> id)}}" class="btn btn-success">{{__('messages.Ajax Update')}}</a>
                    <a href="" offer_id="{{$offer -> id}}" class="delete_btn btn btn-danger"> {{__('messages.Ajax Destroy')}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('scripts')
    <script>
        $(document).on('click', '.delete_btn', function(e){
            e.preventDefault();
            var offer_id = $(this).attr('offer_id');
            $.ajax({
                type: "post",
                url: "{{ route('ajax.offers.delete') }}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': offer_id
                },
                success: function (data) {

                    if(data.status == true){
                        $('#success_msg').show();
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            })
        });

    </script>
@stop
