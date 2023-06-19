<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use App\Models\Household;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PersonFormRequest;
use App\Http\Requests\HouseholdFormRequest;
use App\Models\HouseholdMember;

class HouseholdController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $households = Household::where('address','LIKE',"%$search%")->get();
        } else {
            $households = Household::all();
        }
        return view('admin.household.index', compact('households','search'));
    }


    public function create()
    {
        $members = Person::all();
        return view('admin.household.create', compact('members'));
    }

    public function store(HouseholdFormRequest $request)
    {
        $validatedData = $request->validated();

        $household = Household::create([
            'address' => $validatedData['address']
        ]);

        $request->validate([
            'members.*.personId' => 'required|integer',
            'members.*.relationship' => 'required|string',
            'members.*.isOwner' => 'nullable',
        ]);

            foreach($request->members as $key => $member) {
                $household->householdMembers()->create($key);
            }

        $household->save();

        return redirect('admin/household')->with('message','Household was added successfully');
    }

    public function edit($household)
    {
        if (!$household = Household::findOrFail($household)) {
            abort(404);
        }
        $members = $household->householdMembers()->get();
        return view('admin.household.edit', compact('household', 'members'));
    }
    
    public function show($household)
    {
        if (!$household = Household::findOrFail($household)) {
            abort(404);
        }
        $members = $household->householdMembers()->get();
        return view('admin.household.show', compact('household', 'members'));
    }

    public function update($household, HouseholdFormRequest $request)
    {
        $validatedData = $request->validated();
        $household = Household::findOrFail($household);
        $household->update([
            'address' => $validatedData['address']
        ]);

        return redirect('admin/household')->with('message','This household was updated successfully');
    }

    public function destroy($household)
    {
        if (!$household = Household::findOrFail($household)) {
            abort(404);
        }
        $household->delete();

        return redirect()->back()->with('message','This household was deleted successfully');
    }
}
