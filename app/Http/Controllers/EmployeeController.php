<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('employees.index');
    }
    public function edit(int $id)
    {

        echo "edit action";
    }
    public function update(Request $req, $id)
    {
        echo "update action";
    }
}
