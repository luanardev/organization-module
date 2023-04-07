<?php

namespace Lumis\Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Lumis\Organization\Entities\Branch;
use Lumis\Organization\Http\Requests\BranchRequest;

class BranchController extends Controller
{


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('read-branch');

        return view('organization::branch.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param BranchRequest $request
     * @return Renderable
     */
    public function store(BranchRequest $request)
    {
        $this->authorize('create-branch');

        Branch::create($request->all());
        return redirect()->route('branch.index')->with('success', 'Record created successfully');

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create-branch');

        return view('organization::branch.create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('read-branch');

        return redirect()->route('branch.edit', $id);
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update-branch');

        $branch = Branch::findorfail($id);
        return view('organization::branch.edit')->with([
            'branch' => $branch
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param BranchRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(BranchRequest $request, $id)
    {
        $this->authorize('update-branch');

        $branch = Branch::findorfail($id);
        $branch->update($request->all());
        return redirect()->route('branch.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete-branch');

        Branch::destroy($id);
        return redirect()->route('branch.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete-branch');

        $items = $request->items;
        Branch::whereIn('id', explode(",", $items))->delete();
        if ($request->ajax()) {
            return response()->json(['success' => "Records Deleted successfully."]);
        } else {
            return redirect()->route('branch.index')->with('success', 'Records deleted successfully');
        }

    }


}
