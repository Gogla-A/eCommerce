@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-3 mt-15">
                    <h1 style="margin-top: 100px">Hospitals</h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">address</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($hospitals) && $hospitals -> count() > 0)
                        @foreach($hospitals as $hospital)
                            <tr>
                                <th scope="row">{{$hospital->id}}</th>
                                <td>{{$hospital->name}}</td>
                                <td>{{$hospital->address}}</td>
                                <td>
                                    <a href="{{route('hospital.doctors',$hospital->id)}}" class="btn btn-success">Show Doctors</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
