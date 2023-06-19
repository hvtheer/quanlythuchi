<?php

namespace App\Http\Controllers\Admin;

use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiptFormRequest;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $receipts = Receipt::where('feeId','LIKE',"%$search%")->orWhere('householdId','LIKE',"%$search%")->orWhere('personId','LIKE',"%$search%")->get();
        } else {
            $receipts = Receipt::all();
        }
        return view('admin.receipt.index', compact('receipts','search'));
    }

    public function show($receipt)
    {
        if (!$receipt = Receipt::findOrFail($receipt)) {
            abort(404);
        }

        return view('admin.receipt.show', compact('receipt'));
    }

    public function create()
    {
        return view('admin.receipt.create');
    }

    public function store(ReceiptFormRequest $request)
    {
        $validatedData = $request->validated();

        $receipt = new Receipt;
        $receipt->householdId = $validatedData['householdId'];
        $receipt->personId = $validatedData['personId'];
        $receipt->feeId = $validatedData['feeId'];
        $receipt->collecterId = $validatedData['collecterId'];
        $receipt->amount = $validatedData['amount'];
        $receipt->note = $validatedData['note'];
        $receipt->save();

        return redirect('admin/receipt')->with('message','This receipt was added successfully');
    }

    public function edit($receipt)
    {
        if (!$receipt = Receipt::findOrFail($receipt)) {
            abort(404);
        }
        return view('admin.receipt.edit', compact('receipt'));
    }
    
    public function update($receipt, ReceiptFormRequest $request)
    {
        $validatedData = $request->validated();
        if (!$receipt = Receipt::findOrFail($receipt)) {
            abort(404);
        }
        $receipt->householdId = $validatedData['householdId'];
        $receipt->personId = $validatedData['personId'];
        $receipt->feeId = $validatedData['feeId'];
        $receipt->collecterId = $validatedData['collecterId'];
        $receipt->amount = $validatedData['amount'];
        $receipt->note = $validatedData['note'];
        $receipt->update();

        return redirect('admin/receipt')->with('message','This receipt was updated successfully');
    }

    public function destroy($receipt)
    {
        if (!$receipt = Receipt::findOrFail($receipt)) {
            abort(404);
        }
        $receipt->delete();

        return redirect()->back()->with('message','This receipt was deleted successfully');
    }
}
