@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-3 mt-15">
                    <h1 style="margin-top: 100px">Doctor Services</h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($doctors) && $doctors -> count() > 0)
                    @foreach($doctors as $doctor)

                        <tr>
                        <th scope="row">{{$doctor->id}}</th>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->title}}</td>
                        <td>
                            <a href="{{route('doctors.services',$doctor->id)}}" class="btn btn-success">Show Specialties</a>
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
