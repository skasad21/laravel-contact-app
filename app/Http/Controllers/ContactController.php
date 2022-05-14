<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    public function index(){
        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');
        $contacts = Contact::orderBy('first_name','asc')->where(function($query)
        {
            if($companyId=request('company_id'))
            {
                $query->where('company_id',$companyId);
            }
        })->paginate(10);
        return view('contacts.index',compact('contacts','companies'));
    }

    public function create(){
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');
        return view('contacts.create',compact('companies','contact'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('messageContactCreated',"Contact has been added successfully");
    }
    
    public function edit($id){
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All Companies','');
        return view('contacts.edit',compact('companies','contact'));
    }

    public function update($id, Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);
        $contact = Contact::findOrFail($id);
        //Contact::create($request->all());
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('messageContactCreated',"Contact has been updated successfully");

    }

    public function show($id){
        $contact =  Contact::findOrFail($id);
        return view('contacts.show',compact('contact')); // ['contact' => $contact]
    }
}