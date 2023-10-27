<?php

namespace App\Http\Controllers;

use App\Models\LineItemBudget;
use App\Models\Project;
use Illuminate\Http\Request;

class LineItemBudgetController extends Controller
{
    public function index()
    {
        $lineItemsBudget = LineItemBudget::all();
        return view('submission-details.line-items-budget.index', compact('lineItemsBudget'));
    }

    public function create()
    {
        return view('submission-details.line-items-budget.create');
    }
    public function store(Request $request)
    {
        $projId = $request->input('project_id');
        $requestData = $request->all();
        $requestData['project_id'] = $projId;
        $lineItem = LineItemBudget::create($requestData);

        // Update the total of existing line items
        $allLineItems = LineItemBudget::where('project_id', $projId)->get();
        $totalAllLineItems = 0;
        foreach ($allLineItems as $item) {
            $totalAllLineItems += $item->quantity * $item->unit_price;
        }

        // Update the total in the project (assuming you have a project model)
        $project = Project::find($projId);
        $project->total_budget = $totalAllLineItems;
        $project->save();

        return redirect()->back()->with('success', 'LIB Successfully Added!');
    }


    // public function store(Request $request)
    // {
    //     $projId = $request->input('project_id');
    //     $requestData = $request->all();
    //     $requestData['project_id'] = $projId;
    //     LineItemBudget::create($requestData);

    //     return redirect()->back()->with('success', 'Data Successfully Added!');
    // }


    public function show($id)
    {
        $lineItemsBudget = LineItemBudget::findOrFail($id);
        return view('submission-details.line-items-budget.show', compact('lineItemsBudget'));
    }

    public function edit($id)
    {
        $lib = LineItemBudget::where('id', $id)->firstOrFail();
        $projects = $lib->project;
        return view('submission-details.line-items-budget.edit', compact('lib', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $lineItem = LineItemBudget::findOrFail($id);

        $requestData = $request->all();
        $requestData['total'] = $request->input('quantity') * $request->input('unit_price');

        $lineItem->update($requestData);

        return redirect()->back()->with('success', 'LIB Successfully Updated!');
    }

    // public function update(Request $request, $id)
    // {
    //     $lib = LineItemBudget::find($id);
    //     $lib->name = $request->input('name');
    //     $lib->quantity = $request->input('quantity');
    //     $lib->unit_price = $request->input('unit_price');
    //     $lib->save();

    //     return redirect()->back()->with('success', 'Project team member updated successfully.');
    // }

    public function destroy($id)
    {
        $lib = LineItemBudget::findOrFail($id);
        $lib->delete();
        return redirect()->back()->with('success', 'LIB deleted successfully');
    }
}
