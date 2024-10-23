<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Contact Us';
        $sub_title = 'Contact Us';

        return view('admin.contact.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        $data = Contact::getFullData($request);
        return $data;
    }
}
