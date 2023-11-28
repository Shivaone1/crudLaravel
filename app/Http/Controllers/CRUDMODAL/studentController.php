<?php

namespace App\Http\Controllers\CRUDMODAL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    public function index()
    {
        $getData = Student::orderBy('ID', 'DESC')->get();
        return view('CRUDMODAL.index', compact('getData'));
    }

    // function studentCreate()
    // {
    //     return view("CRUDMODAL.create");
    // }
    // public function studentStore(Request $request)
    // {
    //     // $storeData = $request->accepts('_tocken');
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'mobile' => 'required|string|max:10',
    //         'email' => 'required|email|max:255',
    //         'city' => 'required|string|max:255',
    //         // Add more validation rules for other fields as needed
    //     ]);
    //     $getData = DB::table('student')->insert([
    //         'name' => $validatedData['name'],
    //         'mobile' => $validatedData['mobile'],
    //         'email' => $validatedData['email'],
    //         'city' => $validatedData['city'],
    //         // Add more fields as needed
    //     ]);
    //     // Check if the insertion was successful
    //     if ($getData) {
    //         return view('CRUDMODAL.index')->with(['status' => true, 'message' => 'Save Successfully']);
    //     } else {
    //         return view('CRUDMODAL.index')->with(['status' => false, 'message' => 'Failed to save']);
    //     }
    // }


    public function studentEdit(Request $request, $ID)
    {
        $getID = $request->route($ID);  //
        dd($getID);
        $getEditData = Student::find($getID);

        if (!$getEditData) {
            abort(404, 'Student not found');
        }

        return view('CRUDMODAL.edit', compact('getEditData'));
    }

    // public function studentEditUpdate(Request $request)
    // {
    //     $getID = $request->ID;
    //     // Use the update method instead of insert for updating records
    //     $updateData = DB::table('student')
    //         ->where('ID', $getID)
    //         ->update([
    //             'name' => $request->name, 
    //             'email'=>$request->email,
    //             'mobile'=>$request->mobile,
    //             'city'=>$request->city
    //         ]);
    //     if ($updateData) {
    //         // return response()->json(['message' => 'Update successful'], 200);
    //         return view('CRUDMODAL.index');
    //     } else {
    //         return response()->json(['message' => 'Update failed'], 500);
    //     }
    // }
    public function studentDelete(Request $request, $ID)
    {
        $deleteData = Student::find($ID);
        if (!$deleteData) {
            // Handle the case where the student is not found
            return view('CRUDMODAL.index')->with(['status' => false, 'message' => 'Student not found']);
        }

        if ($deleteData->delete()) {
            // Handle the case where the delete operation was successful
            return view('CRUDMODAL.index')->with(['status' => true, 'message' => 'Deleted Successfully']);
        } else {
            // Handle the case where the delete operation failed
            return view('CRUDMODAL.index')->with(['status' => false, 'message' => 'Deletion failed']);
        }
    }
}
