<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $employee = Employee::all();
        return response()->json([
            'status' => 'success',
            'data' => $employee
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'joined_date' => 'required|date|max:255',
            'salary' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 'failed', 'message' => $validator->errors()->all()],
                400
            );
        }

        $employee = Employee::create([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'department' => $request->department,
            'joined_date' => $request->joined_date,
            'salary' => $request->salary,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'successfully added',
            'data' => $employee
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'joined_date' => 'required|date|max:255',
            'salary' => 'required|integer',
        ]);

        $request = new Request();
        $request['id'] = $id;
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 'failed', 'message' => $validator->errors()->all()],
                400
            );
        }

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->job_title = $request->job_title;
        $employee->department = $request->department;
        $employee->joined_date = $request->joined_date;
        $employee->salary = $request->salary;
        $employee->save();

        return response()->json([
            'status' => 'success',
            'message' => 'successfully updated',
            'data' => $employee
        ]);
    }

    public function destroy($id)
    {
        $request = new Request();
        $request['id'] = $id;
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 'failed', 'message' => $validator->errors()->all()],
                400
            );
        }

        $employee = Employee::find($id);
        if ($employee != null) {
            $employee->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'successfully deleted',
                'data' => $employee
            ]);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'id not found',
            'data' => $employee
        ]);
    }
}
