@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center align-items-center">
            <div class="">
                <div class="text-center mb-3 mt-15">
                    <h1 style="margin-top: 100px">Doctors</h1>

                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Specialty</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($services) && $services -> count() > 0)
                        @foreach($services as $service)

                            <tr>
                                <th scope="row">{{$service->id}}</th>
                                <td>{{$service->name}}</td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

                <br><br>
                <form method="POST" action="{{route('save.doctors.services')}}">
                    @csrf
                    {{-- <input name="_token" value="{{csrf_token()}}"> --}}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose Doctor</label>
                        <select class="form-control" name="doctor_id" >
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor -> id}}">{{$doctor -> name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose Specialty</label>
                        <select class="form-control" name="servicesIds[]" multiple>
                            @foreach($allServices as $allService)
                                <option value="{{$allService -> id}}">{{$allService -> name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@stop
