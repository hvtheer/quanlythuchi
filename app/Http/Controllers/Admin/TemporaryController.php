<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TemporaryFormRequest;
use App\Models\TemporaryResidenceAndAbsence;

class TemporaryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $temps = TemporaryResidenceAndAbsence::where('personId','LIKE',"%$search%")->orWhere('householdId','LIKE',"%$search%")->get();
        } else {
            $temps = TemporaryResidenceAndAbsence::all();
        }
        return view('admin.temporary.index', compact('temps','search'));
    }

    public function show($temp)
    {
        if (!$temp = TemporaryResidenceAndAbsence::findOrFail($temp)) {
            abort(404);
        }

        return view('admin.temporary.show', compact('temp'));
    }

    public function create()
    {
        return view('admin.temporary.create');
    }

    public function store(TemporaryFormRequest $request)
    {
        $validatedData = $request->validated();

        $temp = new TemporaryResidenceAndAbsence;
        $temp->personId = $validatedData['personId'];
        $temp->householdId = $validatedData['householdId'];
        $temp->startDate = $validatedData['startDate'];
        $temp->endDate = $validatedData['endDate'];
        $temp->reason = $validatedData['reason'];
        $temp->tempAbsenceAddress = $validatedData['tempAbsenceAddress'];
        $temp->save();

        return redirect('admin/temporary')->with('message','This temporary residence or absence was added successfully');
    }

    public function edit($temp)
    {
        if (!$temp = TemporaryResidenceAndAbsence::findOrFail($temp)) {
            abort(404);
        }
        return view('admin.temporary.edit', compact('temp'));
    }
    
    public function update($temp, TemporaryFormRequest $request)
    {
        $validatedData = $request->validated();
        if (!$temp = TemporaryResidenceAndAbsence::findOrFail($temp)) {
            abort(404);
        }
        $temp->personId = $validatedData['personId'];
        $temp->householdId = $validatedData['householdId'];
        $temp->startDate = $validatedData['startDate'];
        $temp->endDate = $validatedData['endDate'];
        $temp->reason = $validatedData['reason'];
        $temp->tempAbsenceAddress = $validatedData['tempAbsenceAddress'];
        $temp->update();

        return redirect('admin/temporary')->with('message','This temporary residence or absence was updated successfully');
    }

    public function destroy($temp)
    {
        if (!$temp = TemporaryResidenceAndAbsence::findOrFail($temp)) {
            abort(404);
        }
        $temp->delete();

        return redirect()->back()->with('message','This temporary residence or absence was deleted successfully');
    }
}
