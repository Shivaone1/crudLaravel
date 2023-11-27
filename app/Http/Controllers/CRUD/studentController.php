<?php

namespace App\Http\Controllers\CRUD;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $getData = DB::table('student')->orderBy('ID', 'DESC')->get();
        return view('CRUD.index', compact('getData'));
    }

    function studentCreate()
    {
        return view("CRUD.create");
    }
    public function studentStore(Request $request)
    {
        // $storeData = $request->accepts('_tocken');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            // Add more validation rules for other fields as needed
        ]);
        $getData = DB::table('student')->insert([
            'name' => $validatedData['name'],
            'mobile' => $validatedData['mobile'],
            'email' => $validatedData['email'],
            'city' => $validatedData['city'],
            // Add more fields as needed
        ]);
        // Check if the insertion was successful
        if ($getData) {
            return view('CRUD.index')->with(['status' => true, 'message' => 'Save Successfully']);
        } else {
            return view('CRUD.index')->with(['status' => false, 'message' => 'Failed to save']);
        }
    }
    public function studentEdit(Request $request, $ID)
    {
        $getEditData = DB::table('student')->where('ID', $ID)->get();
        return view('CRUD.edit', compact('getEditData'));
    }
    public function studentEditUpdate(Request $request)
    {
        $getID = $request->ID;
        // Use the update method instead of insert for updating records
        $updateData = DB::table('student')
            ->where('ID', $getID)
            ->update([
                'name' => $request->name, 
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'city'=>$request->city
            ]);
        if ($updateData) {
            // return response()->json(['message' => 'Update successful'], 200);
            return view('CRUD.index');
        } else {
            return response()->json(['message' => 'Update failed'], 500);
        }
    }
    public function studentDelete(Request $request, $ID)
    {
        $deleteData = DB::table('student')->where('ID', $ID)->delete();
        if ($deleteData > 0) {
            // return response()->json(['message' => 'Student deleted successfully']);
            return view('CRUD.index')->with(['status' => true, 'message' => 'Deleted Successfully']);
        } else {
            // return response()->json(['error' => 'Student not found'], 404);
            return view('CRUD.index');
        }
    }
}
