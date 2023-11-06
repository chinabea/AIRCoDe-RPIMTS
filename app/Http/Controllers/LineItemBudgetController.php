<?php

namespace App\Http\Controllers;

use App\Models\LineItemBudget;
use App\Models\Project;
use Illuminate\Http\Request;

class LineItemBudgetController extends Controller
{
    public function index()
    {
        try {
            $lineItemsBudget = LineItemBudget::all();
            return view('submission-details.line-items-budget.index', compact('lineItemsBudget'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching line items budgets: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('submission-details.line-items-budget.create');
    }

    public function store(Request $request)
    {
        try {
            $projId = $request->input('project_id');
            $requestData = $request->all();
            $requestData['project_id'] = $projId;

            // Define validation rules
            $rules = [
                'project_id' => 'required|exists:projects,id',
                // Add more validation rules for other fields here
            ];

            // Validate the request data
            $this->validate($request, $rules);

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
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding a line item budget: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $lineItemsBudget = LineItemBudget::findOrFail($id);
            return view('submission-details.line-items-budget.show', compact('lineItemsBudget'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching line item budget details: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $lib = LineItemBudget::findOrFail($id);
            $projects = $lib->project;
            return view('submission-details.line-items-budget.edit', compact('lib', 'projects'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while editing a line item budget: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $lineItem = LineItemBudget::findOrFail($id);

            $requestData = $request->all();
            $requestData['total'] = $request->input('quantity') * $request->input('unit_price');

            // Define validation rules
            $rules = [
                'project_id' => ['required', 'exists:projects,id', Rule::unique('line_item_budgets')->ignore($id)],
                // Add more validation rules for other fields here
            ];

            // Validate the request data
            $this->validate($request, $rules);

            $lineItem->update($requestData);

            return redirect()->back()->with('success', 'LIB Successfully Updated!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating a line item budget: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $lib = LineItemBudget::findOrFail($id);
            $lib->delete();
            return redirect()->back()->with('success', 'LIB deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting a line item budget: ' . $e->getMessage());
        }
    }

}
