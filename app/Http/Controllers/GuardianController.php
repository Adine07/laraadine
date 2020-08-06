<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Guardian;
use Ramsey\Uuid\Guid\Guid;

class GuardianController extends Controller
{

    function __construct()
    {
        $this->model = new Guardian();
    }

    public function index()
    {
        $guardians = $this->model->orderBy('created_at', 'desc')->get();

        return view('guardian.index', compact('guardians'));
    }

    public function create()
    {
        return view('guardian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'is_parent' => 'required',
        ]);
        $guard = $this->model;

        $guard->name = $request->name;
        $guard->nik = $request->nik;
        $guard->gender = $request->gender;
        $guard->phone = $request->phone;
        $guard->birth_date = $request->birth_date;
        $guard->address = $request->address;
        $guard->is_parent = $request->is_parent;

        $guard->save();

        // Guardian::create($request->all());

        return redirect('/guardians');
    }

    public function edit($id)
    {
        $guardian = $this->model->find($id);

        return view('guardian.edit', compact('guardian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'is_parent' => 'required',
        ]);

        $guard = $this->model->find($id);
        $guard->name = $request->name;
        $guard->nik = $request->nik;
        $guard->phone = $request->phone;
        $guard->gender = $request->gender;
        $guard->address = $request->address;
        $guard->birth_date = $request->birth_date;
        $guard->is_parent = $request->is_parent;

        $guard->save();

        return redirect('/guardians');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();

        return redirect('/guardians');
    }
}
