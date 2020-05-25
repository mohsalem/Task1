<?php

namespace Modules\Admin\Http\Controllers;

use App\ContactFormEntry;
use App\ContactFormField;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function show_contact_form_entries()
    {
        $entry_numbers = ContactFormEntry::select('entry_number')->groupBy('entry_number')->pluck('entry_number');

        foreach ($entry_numbers as $entry_number)
        {
            $entry = ContactFormEntry::where('entry_number', $entry_number)->orderBy('contact_form_fields_id')->get();
            $entries[] = $entry;
        }
        $data['entries'] = $entries;
        $data['fields'] = ContactFormField::orderBy('id')->get();

        return view('admin::contact_form_entries', $data);
    }

    public function show_contact_form_fields()
    {
        $data['fields'] = ContactFormField::all();
        return view('admin::contact_form_fields', $data);
    }

    public function add_contact_form_field(Request $request)
    {
        $request = $request->validate([
            'name' => 'required',
        ]);

        ContactFormField::create([
            'name' => $request['name']
        ]);
        return redirect('/admin/contactFormFields');
    }

    public function edit_contact_form_field(Request $request, $id)
    {
        $request = $request->validate([
            'name' => 'required',
        ]);

        ContactFormField::findOrFail($id)->update([
           'name' => $request['name'],
        ]);
        return redirect('/admin/contactFormFields');

    }



}
