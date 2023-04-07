<?php

namespace Lumis\Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Lumis\Organization\Entities\Faculty;
use Lumis\Organization\Http\Requests\FacultyRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('read-faculty');

        return view('organization::faculty.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param FacultyRequest $request
     * @return Renderable
     */
    public function store(FacultyRequest $request)
    {
        $this->authorize('create-faculty');

        Faculty::create($request->all());
        return redirect()->route('faculty.index')->with('success', 'Record created successfully');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create-faculty');

        return view('organization::faculty.create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('read-faculty');

        return redirect()->route('faculty.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update-faculty');

        $faculty = Faculty::findorfail($id);
        return view('organization::faculty.edit')->with([
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param FacultyRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FacultyRequest $request, $id)
    {
        $this->authorize('update-faculty');

        $faculty = Faculty::findorfail($id);
        $faculty->update($request->all());
        return redirect()->route('faculty.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete-faculty');

        Faculty::destroy($id);
        return redirect()->route('faculty.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete-faculty');

        $items = $request->items;
        Faculty::whereIn('id', explode(",", $items))->delete();
        if ($request->ajax()) {
            return response()->json(['success' => "Records Deleted successfully."]);
        } else {
            return redirect()->route('faculty.index')->with('success', 'Records deleted successfully');
        }

    }
}
