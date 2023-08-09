<?php


namespace App\Services\Users;


use App\Models\User\Employee;
use App\Models\User\EmployeeType;
use Illuminate\Http\Request;


class EmployeeService
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.index', ['employees' => $employees]);
    }

    public function createEmployee()
    {
        return view('admin.employee.create');
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.edit', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->user->email = $request->email;
        $employee->user->password = $request->password;
        $employee->user->user_type_id = $request->user_type_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->note = $request->note;
        $employee->user->save();
        $employee->save();
    }

    public function storeEmployee(Request $request)
    {
        $user_type = $request->user_type_id;
        $user = $this->user->storeUser($request, $user_type);
        $employee = Employee::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'note' => $request->note,
        ]);
        return response()->json([
            'employee' => $employee,
//            'user' => $user,
        ]);

    }
}
