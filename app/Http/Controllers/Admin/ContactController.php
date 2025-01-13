<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
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
        abort_unless(Gate::allows('contact'), 403);
        $title = 'Contact Us';
        $sub_title = 'Contact Us';

        return view('admin.contact.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('contact'), 403);
        $data = Contact::getFullData($request);
        return $data;
    }

    public function destroy(Request $request)
    {

        abort_unless(Gate::allows('contact-delete'), 403);
        $delete = Contact::deleteData($request);
        return response()->json($delete);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Contact::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
