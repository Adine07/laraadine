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
        $this->imgPath = public_path('img');
    }

    public function index()
    {
        $this->authorize('viewAny', $this->model);
        $students = $this->model->orderBy('created_at', 'desc')->get();

        return view('student.index', compact('students'));
    }

    public function create()
    {
        $this->authorize('create', $this->model);

        $guardians = Guardian::all();

        return view('student.create', compact('guardians'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', $this->model);

        if ($request->photo_file) {
            $request = $this->uploadImage($request);
        }

        $this->model->create($request->all());

        // Guardian::create($request->all());

        return redirect('/students');
    }

    public function edit($id)
    {
        $this->authorize('update', $this->model);

        $student = $this->model->find($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', $this->model);

        $model = $this->model->find($id);



        if ($request->photo_file) {
            $this->removeImage($model->photo);
            $request = $this->uploadImage($request);
        }

        $model->update($request->all());

        return redirect('/students');
    }

    public function delete($id)
    {
        $this->authorize('delete', $this->model);

        $model = $this->model->find($id);

        $this->removeImage($model->photo);

        $model->delete();

        return redirect('/students');
    }

    public function uploadImage($request)
    {
        $img = $request->file('photo_file');
        $newName = time() . '.' . $img->getClientOriginalExtension();

        $img->move($this->imgPath, $newName);

        $request->merge([
            'photo' => $newName,
        ]);

        return $request;
    }

    public function removeImage($img)
    {
        $fullPath = $this->imgPath . '/' . $img;

        if ($img && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
