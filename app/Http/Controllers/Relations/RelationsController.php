<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function hasOneRelation()
    {
        $user = User::with(['phone'=>function ($q) {
            $q->select('code','phone','user_id');
        }]) -> find(3);
        // $phone = $user->phone;
        return response()->json($user);
    }

    public function hasManyRelation(){
        $hospital = Hospital::with('doctors')->find(1);
        //return $hospital -> name;
        $doctors = $hospital->doctors;
        foreach ($doctors as $doctor){
            echo $doctor -> name . '<br>';
        }
        $doctor = Doctor::find(3);
        return $doctor -> hospital -> name;
    }

    public function hospitals(){
        $hospitals = Hospital::select('id', 'name', 'address')->get();
        return view('doctors.hospitals', compact('hospitals'));
    }

    public function doctors($hospital_id){
        $hospital = Hospital::find($hospital_id);
        $doctors = $hospital->doctors;
        return view('doctors.doctors', compact('doctors'));
    }

    public function doctorServices()
    {
        return $doctor = Doctor::with('services')->find(3);
        //return $doctor -> services;
    }
    public function serviceDoctors()
    {
        return $doctor = Service::with(['doctors' => function ($q) {
    $q->select('doctors.id','title','name');
    }])->find(1);
    }

    public function getDoctorServicesById($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        $services = $doctor->services;  //doctor services

        $doctors = Doctor::select('id', 'name')->get();
        $allServices = Service::select('id', 'name')->get(); // all db serves

        return view('doctors.services', compact('services', 'doctors', 'allServices'));
    }
    public function saveServicesToDoctors(Request $request)
    {

        $doctor = Doctor::find($request->doctor_id);
        if (!$doctor)
            return abort('404');
        // $doctor ->services()-> attach($request -> servicesIds);  // many to many insert to database
        //$doctor ->services()-> sync($request -> servicesIds);
        $doctor->services()->syncWithoutDetaching($request->servicesIds);
        return 'success';
    }

    public function getPatientDoctor()
    {
        $patient = Patient::find(2);
        return $patient -> doctor;
    }
    public function getCountryDoctor()
    {
        $country = Country::find(1);
        return $country -> doctors;
    }

    public function getDoctors(){
        $doctors = Doctor::select('id','title', 'name', 'gender')->get();
        foreach ($doctors as $doctor){
            $doctor -> gender = $doctor -> gender == 1 ? 'Male' : 'Female';
        }
        return $doctors;
    }

}
