<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\HospitalNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function adddoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype==1) {
                return view('admin.add_doctor');
            }
            else {
                return redirect()->back();
            }
        }
        else 
        {
            return redirect('login');
        }
    }

    public function upload(Request $request) 
    {   
        $doctor= new doctor;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);

        $doctor->image=$imagename;

        $doctor->name=$request->name;

        $doctor->phone=$request->phone;

        $doctor->speciality=$request->speciality;

        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfuly');

    }

    public function showappointment() 
    {

        $data = appointment::all();

        return view('admin.showappointment',compact('data'));
    }

    public function approved($id) 
    {
        $data=appointment::find($id);

        $data->status='Approved';

        $data->save();

        return redirect()->back();

    }

    public function canceled($id) 
    {
        $data=appointment::find($id);

        $data->status='Canceled';

        $data->save();

        return redirect()->back();
        
    }

    public function showadoctor() {

        $data=doctor::all();

        return view('admin.showadoctor',compact('data'));
    }

    public function deletdoctor($id) 
    {
        $data=doctor::find($id);

        $data->delete();

        return redirect()->back();  
    }

    public function updatedoctor($id)
    {

        $data = doctor::find($id);

        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id)
    {
        $doctor = doctor::find($id);

        $doctor->name=$request->name;

        $doctor->phone=$request->phone;

        $doctor->speciality=$request->speciality;

        $doctor->room=$request->room;

        $image=$request->file;

        if ($image) {
            
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage',$imagename);

        $doctor->image=$imagename;
        }

        $doctor->save();
        
        return redirect()->back();

    }

    public function emailview($id)
    {

        $data=appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
        $data = appointment::find($id);

        $details=[
            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->actiontext,

            'actionurl' => $request->actionurl,

            'endpart' => $request->endpart

        ];

        Notification::send($data,new
        HospitalNotification($details));

        return redirect()->back();

    }


}


