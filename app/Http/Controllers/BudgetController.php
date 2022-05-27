<?php

namespace App\Http\Controllers;

use App\Models\Budget;

use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budget::all();
        return view('budget.index', compact('budgets'));
    }

    /* return a serialized response of the budget model */

    public function getBudgets()
    {
        $budgets = Budget::select('id','budget_title','budget_amount','start_date','end_date')->get();
        return $budgets->toArray();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budget.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetRequest $request)
    {

        $validated = $request->validated();
        //dd($validated);
        $validated['start_date'] = date('Y-m-d H:i:s', strtotime($validated['start_date']));
        $validated['end_date'] = date('Y-m-d H:i:s', strtotime($validated['end_date']));
        $budget = new Budget;
        $budget->create($validated);
        return redirect()->route('budgets.index')
            ->withSuccess(__('Budget created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        $budget = Budget::find($budget);
        return view('budget.view', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetRequest  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
