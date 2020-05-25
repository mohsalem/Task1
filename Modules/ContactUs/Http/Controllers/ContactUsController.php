<?php

namespace Modules\ContactUs\Http\Controllers;

use App\ContactFormEntry;
use App\ContactFormField;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contactus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['fields'] = ContactFormField::all();
        return view('contactus::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entry_number = ContactFormEntry::max('entry_number') > 0 ? ContactFormEntry::max('entry_number')+1 : 1;
        foreach ($request->except('_token') as $key => $part) {
            ContactFormEntry::create([
                'entry_number' => $entry_number,
                'contact_form_fields_id' => $key,
                'data' => $request[$key],
            ]);
        }
        return redirect('/');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('contactus::edit');
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
}
