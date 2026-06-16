<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceSeoRequest;
use App\Models\ResourceSeo;
use Exception;
use Illuminate\Http\Request;

class ResourceSeoController extends Controller
{
    public function store(StoreResourceSeoRequest $request)
    {
        abort_unless(Gate::allows('resources-seo'), 403);

        try {
            $save = ResourceSeo::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
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

    public function show(Request $request)
    {
        abort_unless(Gate::allows('resources-seo'), 403);
        $data = ResourceSeo::getData($request->resource_id);
        return $data;
    }
}
