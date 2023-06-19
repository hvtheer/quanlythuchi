<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PersonFormRequest;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $persons = Person::where('firstName','LIKE',"%$search%")->orWhere('idCard','LIKE',"%$search%")->get();
        } else {
            $persons = Person::all();
        }
        return view('admin.person.index', compact('persons','search'));
    }

    public function show($person)
    {
        if (!$person = Person::findOrFail($person)) {
            abort(404);
        }

        return view('admin.person.show', compact('person'));
    }

    public function create()
    {
        return view('admin.person.create');
    }

    public function store(PersonFormRequest $request)
    {
        $validatedData = $request->validated();

        $person = new Person;
        $person->idCard = $validatedData['idCard'];
        $person->firstName = $validatedData['firstName'];
        $person->lastName = $validatedData['lastName'];
        $person->dateOfBirth = $validatedData['dateOfBirth'];

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/avatar/',$filename);
            $person->avatar = 'uploads/avatar/'.$filename;
        }
        $person->gender = $request->gender == true ? '1':'0';

        $person->email = $validatedData['email'];
        $person->numberPhone = $validatedData['numberPhone'];
        $person->address = $validatedData['address'];
        $person->ethnic = $validatedData['ethnic'];
        $person->nationality = $validatedData['nationality'];
        $person->occupation = $validatedData['occupation'];
        $person->educationLevel = $validatedData['educationLevel'];
        $person->maritalStatus = $request->maritalStatus == true ? '1':'0';
        $person->status = $request->status == true ? '1':'0';
        $person->save();

        return redirect('admin/person')->with('message','Person was added successfully');
    }

    public function edit($person)
    {
        if (!$person = Person::findOrFail($person)) {
            abort(404);
        }
        return view('admin.person.edit', compact('person'));
    }
    
    public function update($person, PersonFormRequest $request)
    {
        $validatedData = $request->validated();
        if (!$person = Person::findOrFail($person)) {
            abort(404);
        }
        $person->idCard = $validatedData['idCard'];
        $person->firstName = $validatedData['firstName'];
        $person->lastName = $validatedData['lastName'];
        $person->dateOfBirth = $validatedData['dateOfBirth'];

        if($request->hasFile('avatar')){
            $path = 'uploads/avatar/'.$person->avatar;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/avatar/',$filename);
            $person->avatar = 'uploads/avatar/'.$filename;
        }
        $person->gender = $request->gender == true ? '1':'0';

        $person->email = $validatedData['email'];
        $person->numberPhone = $validatedData['numberPhone'];
        $person->address = $validatedData['address'];
        $person->ethnic = $validatedData['ethnic'];
        $person->nationality = $validatedData['nationality'];
        $person->occupation = $validatedData['occupation'];
        $person->educationLevel = $validatedData['educationLevel'];
        $person->maritalStatus = $request->maritalStatus == true ? '1':'0';
        $person->status = $request->status == true ? '1':'0';
        $person->update();

        return redirect('admin/person')->with('message','Person was updated successfully');
    }

    public function destroy($person)
    {
        if (!$person = Person::findOrFail($person)) {
            abort(404);
        }
        $path = $person->avatar;
        if (File::exists($path)) {
            File::delete($path);
        }
        $person->delete();

        return redirect()->back()->with('message','This person was deleted successfully');
    }
}
