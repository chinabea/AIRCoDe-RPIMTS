<?php

namespace App\Http\Controllers;
use App\Models\LineItem;
use Illuminate\Http\Request;

class LineItemController extends Controller
{    
    public function index()
    {
        $lineItems = LineItem::all();
        return view('submission-details.line-item-budget.index', compact('lineItems'));
    }

    public function create()
    {
        return view('submission-details.line-item-budget.create');
    }

    public function store(Request $request)
    {
        try {
            $projectId = $request->input('project_id', 1);
            $requestData = $request->all();
            $requestData['project_id'] = $projectId;
            LineItem::create($requestData);
    
            LineItem::create($requestData);

        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    
    public function show($id)
    {
        $lineItems = LineItem::findOrFail($id);
        return view('submission-details.show', compact('lineItems'));

    }

    public function edit($id)
    {
        $lineItems = LineItem::where('id', $id)->firstOrFail();
        $projects = $projectTeam->project;
        return view('submission-details.line-item-budget.edit', compact('lineItems', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $lineItems = LineItem::find($id);
        $lineItems->name = $request->input('name');
        $lineItems->quantity = $request->input('quantity');
        $lineItems->unit_price = $request->input('unit_price');
        $lineItems->save();

        return redirect()->back()->with('success', 'Project team member updated successfully.');
    }

    public function destroy($id)
    {
        $lineItems = LineItem::findOrFail($id);
        $lineItems->delete();
        return redirect()->back()->with('success', 'Project team member deleted successfully');
    }
    
}
