<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeeFormRequest;

class FeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $fees = Fee::where('name','LIKE',"%$search%")->get();
        } else {
            $fees = Fee::all();
        }
        return view('admin.fee.index', compact('fees','search'));
    }

    public function show($fee)
    {
        if (!$fee = Fee::findOrFail($fee)) {
            abort(404);
        }

        return view('admin.fee.show', compact('fee'));
    }

    public function create()
    {
        return view('admin.fee.create');
    }

    public function store(FeeFormRequest $request)
    {
        $validatedData = $request->validated();

        $fee = new Fee;
        $fee->name = $validatedData['name'];
        $fee->amount = $validatedData['amount'];
        $fee->isMandatory = $request->isMandatory ? '1':'0';
        $fee->startDate = $validatedData['startDate'];
        $fee->endDate = $validatedData['endDate'];
        $fee->save();

        return redirect('admin/fee')->with('message','This fee was added successfully');
    }

    public function edit($fee)
    {
        if (!$fee = Fee::findOrFail($fee)) {
            abort(404);
        }
        return view('admin.fee.edit', compact('fee'));
    }
    
    public function update($fee, FeeFormRequest $request)
    {
        $validatedData = $request->validated();
        if (!$fee = Fee::findOrFail($fee)) {
            abort(404);
        }
        $fee->name = $validatedData['name'];
        $fee->amount = $validatedData['amount'];
        $fee->startDate = $validatedData['startDate'];
        $fee->endDate = $validatedData['endDate'];
        $fee->isMandatory = $request->isMandatory ? '1':'0';
        $fee->update();

        return redirect('admin/fee')->with('message','This fee was updated successfully');
    }

    public function destroy($fee)
    {
        if (!$fee = Fee::findOrFail($fee)) {
            abort(404);
        }
        $fee->delete();

        return redirect()->back()->with('message','This fee was deleted successfully');
    }
}
