<?php

namespace Lumis\Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Lumis\Organization\Entities\Department;
use Lumis\Organization\Entities\Faculty;
use Lumis\Organization\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('read-department');

        return view('organization::department.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create-department');

        $faculties = Faculty::all();

        return view('organization::department.create')->with([
            'faculties' => $faculties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param DepartmentRequest $request
     * @return Renderable
     */
    public function store(DepartmentRequest $request)
    {
        $this->authorize('create-department');

        $dept = new Department();
        $dept->fill($request->all());
        $dept->faculty()->associate($request->faculty);
        $dept->save();
        return redirect()->route('department.index')->with('success', 'Record updated successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('read-department');

        return redirect()->route('department.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update-department');

        $department = Department::findorfail($id);

        $faculties = Faculty::all();

        return view('organization::department.edit')->with([
            'department' => $department,
            'faculties' => $faculties
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param DepartmentRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(DepartmentRequest $request, $id)
    {
        $this->authorize('update-department');

        $dept = Department::findorfail($id);
        $dept->fill($request->all());
        $dept->faculty()->associate($request->faculty);
        $dept->update();
        return redirect()->route('department.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete-department');

        Department::destroy($id);
        return redirect()->route('department.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete-department');

        $items = $request->items;
        Department::whereIn('id', explode(",", $items))->delete();
        if ($request->ajax()) {
            return response()->json(['success' => "Records Deleted successfully."]);
        } else {
            return redirect()->route('campus.index')->with('success', 'Records deleted successfully');
        }

    }
}
