<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contactList = ContactRepository::getContacts();

        return view('panel.contact.index', ['contactList' =>$contactList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('panel.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {


        $contact = ContactRepository::createContact($request->validated());
        if(!$contact){
            abort(404);
        }

        return to_route('panel.contacts.edit', $contact['id'])->with('success', 'Статья создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = ContactRepository::getContactById($id);

        if(!$contact){
            abort(404);
        }

        return view('panel.contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $contact = ContactRepository::getContactById($id);

        if(!$contact){
            abort(404);
        }

        ContactRepository::updateContact($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = ContactRepository::getContactById($id);

        if(!$contact){
            abort(404);
        }

        ContactRepository::deleteContact($contact['id']);
        return to_route('panel.contacts')->with('success', 'Контакт ' . "'" . $contact['title'] . "'" . ' удален');
    }
}
