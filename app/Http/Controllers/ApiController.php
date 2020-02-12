<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllEmployees() {
        $employee = Employee::get()->toJson(JSON_PRETTY_PRINT);
        return response($employee, 200);
    }

    public function createEmployee(Request $request) {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->skills = $request->skills;
        $employee->save();
        return response()->json([
            "message" => "New employee created"
        ], 201);
    }

    public function getEmployee($id) {
        if(Employee::where('id', $id)->exists())
        {
            $employee = Employee::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee, 200);
        }else
        {
            return response()->json([
                "message" => "Sorry! employee not found"
            ], 404);
        }
    }

    public function updateEmployee(Request $request, $id) {
        if(Employee::where('id', $id)->exists())
        {
            $employee = Employee::find($id);
            $employee->name = is_null($request->name) ? $employee->name : $request->name;
            $employee->skills = is_null($request->skills) ? $employee->skills : $request->skills;
            $employee->save();
            return response()->json([
                "message" => "Employee updated successfully!"
            ], 200);
        }else
        {
            return  response()->json([
                "message" => "Sorry! Employee not found",
            ], 404);
        }
    }

    public function deleteEmployee ($id) {
        if(Employee::where('id', $id)->exists())
        {
            $employee = Employee::find($id);
            $employee->delete();
            return response([
                "message" => "Employee deleted"
            ], 202);
        }else
        {
            return response([
                "message" => "Soryy! Employee Not Found"
            ], 404);
        }
    }
}
