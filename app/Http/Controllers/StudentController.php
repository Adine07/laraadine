<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Guardian;
use Ramsey\Uuid\Guid\Guid;

class StudentController extends Controller
{

    function __construct()
    {
        $this->model = new Student();
    }

    public function index()
    {
        $students = $this->model->all();

        return view('student.index', compact('students'));
    }

    public function create()
    {
        $guardians = Guardian::all();

        return view('student.create', compact('guardians'));
    }

    public function store(Request $request)
    {
        $this->model->create($request->all());

        // Guardian::create($request->all());

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = $this->model->find($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->model->find($id)->update($request->all());

        return redirect('/students');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();

        return redirect('/students');
    }
}
