<?php

namespace Lumis\Organization\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Lumis\Organization\Entities\FinancialYear;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('organization::financialyear.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('organization::financialyear.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param FinancialYear $financialYear
     * @return Renderable
     */
    public function show(FinancialYear $financialYear): Renderable
    {
        return view('organization::financialyear.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param FinancialYear $financialYear
     * @return Renderable
     */
    public function edit(FinancialYear $financialYear): Renderable
    {
        return view('organization::financialyear.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param FinancialYear $financialYear
     * @return Renderable
     */
    public function update(Request $request, FinancialYear $financialYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param FinancialYear $financialYear
     * @return Renderable
     */
    public function destroy(FinancialYear $financialYear)
    {
        //
    }
}
