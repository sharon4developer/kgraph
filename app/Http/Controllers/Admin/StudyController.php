<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Study;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreStudyRequest;
use App\Http\Requests\UpdateStudyRequest;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('study'), 403);
        $add_button =  Gate::allows('study-create');

        $sub_title = 'Study ';
        $title = 'Study ';
        return view('admin.study.index', compact('title', 'sub_title', 'add_button'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('study-create'), 403);
        $sub_title = 'Study ';
        $title = 'Study ';

        return view('admin.study.create', compact('title', 'sub_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudyRequest $request)
    {
        abort_unless(Gate::allows('study-create'), 403);
        try {
            $save = Study::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/study',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($response);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        abort_unless(Gate::allows('study'), 403);
        $data = Study::getFullData($request);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_unless(Gate::allows('study'), 403);
        $data = Study::getData($id);
        // dd($data);
        if (!$data) {
            abort(404);
        }
        $title = 'Add';
        $sub_title = 'Edit';


        return view('admin.study.edit', compact('data', 'title', 'sub_title'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('study-edit'), 403);
        try {
            $save = Study::updateData($request, $id);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/study',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($response);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('study-delete'), 403);
        $delete = Study::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Study::changeStatus($request);
        dd($data);
        return response()->json($data);
    }
}
