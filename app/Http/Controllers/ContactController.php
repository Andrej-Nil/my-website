<?php

namespace App\Http\Controllers;

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

        return view('contact', ['contactList' => $contactList]);
    }

}
