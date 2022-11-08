<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        //get image file
        $image = $request->file;

        //to make every uploaded file have different name
        $imagename = time().'.'.$image->getClientOriginalExtension();

        //moving file to a folder named 'doctorimage' = kena create folder doctorimage dlm public folder (will automatically create)
        $request->file->move('doctorimage',$imagename);

        //send image file to the database
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->contact = $request->contact;
        $doctor->room_num = $request->room_num;
        $doctor->specialty = $request->specialty;

        $doctor->save();

        return redirect()->back()->with('message','Dr Added Successfully !');
    }

    // manage appointments
    public function showappointment()
    {
        $data = appointment::all();
        
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data = appointment::find($id);

        $data->status='approved';

        $data->save();

        return redirect()->back()->with('message','Appointment is Approved');
    }

    public function cancelled($id)
    {
        $data = appointment::find($id);

        // $data->delete();

        $data->status='cancelled';

        $data->save();

        return redirect()->back()->with('message','Appointment is Cancelled');
    }

    // manage doctors
    public function showdoctors()
    {
        $data = doctor::all();
        
        return view('admin.showdoctors',compact('data'));
    }

    public function deleted($id)
    {
        $data = doctor::find($id);

        $data->delete();

        return redirect()->back()->with('message','Data is successfully deleted !');
    }

    // redirect to update form
    public function updatedoctor($id)
    {
        $data = doctor::find($id);

        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = doctor::find($id);

        $doctor->name = $request->name;
        $doctor->contact = $request->contact;
        $doctor->room_num = $request->room_num;
        $doctor->specialty = $request->specialty;

        //get image file
        $image = $request->file;

        // if admin wants to upload another image
        if($image)
        {
            //to make every uploaded file have different name
            $imagename = time().'.'.$image->getClientOriginalExtension();

            //moving file to a folder named 'doctorimage' = kena create folder doctorimage dlm public folder (will automatically create)
            $request->file->move('doctorimage',$imagename);

            //send image file to the database
            $doctor->image = $imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message','Dr Updated Successfully !');
    }
}
