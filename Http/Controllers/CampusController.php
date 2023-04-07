<?php

namespace Lumis\Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Lumis\Organization\Entities\Branch;
use Lumis\Organization\Entities\Campus;
use Lumis\Organization\Http\Requests\CampusRequest;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('read-campus');

        return view('organization::campus.index');

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create-campus');

        $branches = Branch::all();

        return view('organization::campus.create')->with([
            'branches' => $branches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param CampusRequest $request
     * @return Renderable
     */
    public function store(CampusRequest $request)
    {
        $this->authorize('create-campus');

        $campus = new Campus();
        $campus->fill($request->all());
        $campus->branch()->associate($request->branch);
        $campus->save();
        return redirect()->route('campus.index')->with('success', 'Record updated successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('read-campus');

        return redirect()->route('campus.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update-campus');

        $branches = Branch::all();

        $campus = Campus::findorfail($id);

        return view('organization::campus.edit')->with([
            'branches' => $branches,
            'campus' => $campus
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CampusRequest $request, $id)
    {
        $this->authorize('update-campus');

        $campus = Campus::findorfail($id);
        $campus->fill($request->all());
        $campus->branch()->associate($request->branch);
        $campus->update();
        return redirect()->route('campus.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete-campus');

        Campus::destroy($id);
        return redirect()->route('campus.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete-campus');

        $items = $request->items;
        Campus::whereIn('id', explode(",", $items))->delete();
        if ($request->ajax()) {
            return response()->json(['success' => "Records Deleted successfully."]);
        } else {
            return redirect()->route('campus.index')->with('success', 'Records deleted successfully');
        }

    }
}
