<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResourceRequest;
use App\Http\Requests\Admin\UpdateResourceRequest;
use App\Models\Resource;
use App\Models\ResourceCategory;
use Exception;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('resources'), 403);
        $userCanDelete = Gate::allows('resources-delete');
        $title = 'Resources';
        $sub_title = 'Resources';

        return view('admin.resources.index', compact('title', 'sub_title', 'userCanDelete'));
    }

    public function create()
    {
        abort_unless(Gate::allows('resources-create'), 403);
        $title = 'Resources';
        $sub_title = 'Add';
        $categories = ResourceCategory::getActiveCategories();
        return view('admin.resources.create', compact('title', 'sub_title', 'categories'));
    }

    public function store(StoreResourceRequest $request)
    {
        abort_unless(Gate::allows('resources-create'), 403);
        try {
            $save = Resource::createData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resources',
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
        abort_unless(Gate::allows('resources'), 403);
        $data = Resource::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('resources-edit'), 403);
        $data = Resource::getData($id);
        if (!$data) {
            abort(404);
        }
        $title = 'Resources';
        $sub_title = 'Edit';
        $categories = ResourceCategory::getActiveCategories();
        return view('admin.resources.edit', compact('data', 'title', 'sub_title', 'categories'));
    }

    public function update(UpdateResourceRequest $request, $id)
    {
        abort_unless(Gate::allows('resources-edit'), 403);
        try {
            $save = Resource::updateData($request);

            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Saved successfully...',
                    'return_url' => '/admin/resources',
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

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('resources-delete'), 403);

        $delete = Resource::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Resource::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        Resource::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }

    public function importGoogleDocs(Request $request)
    {
        try {
            $data = $request->json()->all();
            $url = $data['url'] ?? $request->input('url');

            if (!$url) {
                return response()->json([
                    'status' => false,
                    'message' => 'Google Docs URL is required'
                ], 400);
            }

            preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $url, $matches);

            if (!isset($matches[1])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Google Docs URL format. Please use a shareable link like: https://docs.google.com/document/d/DOCUMENT_ID/edit'
                ], 400);
            }

            $docId = $matches[1];
            $exportUrl = 'https://docs.google.com/document/d/' . $docId . '/export?format=html';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $exportUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

            $html = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            if ($curlError) {
                return response()->json([
                    'status' => false,
                    'message' => 'Connection error: ' . $curlError
                ], 400);
            }

            if ($httpCode !== 200) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to fetch document (HTTP ' . $httpCode . '). Please ensure the document is publicly accessible.'
                ], 400);
            }

            if (empty($html) || strlen($html) < 100) {
                return response()->json([
                    'status' => false,
                    'message' => 'Document appears to be empty or access denied. Please check sharing settings.'
                ], 400);
            }

            $html = preg_replace('/<meta[^>]*>/i', '', $html);
            $html = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $html);
            $html = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $html);
            $html = preg_replace('/<body[^>]*>/i', '<div>', $html);
            $html = str_replace('</body>', '</div>', $html);
            $html = preg_replace('/\s+/', ' ', $html);
            $html = trim($html);

            return response()->json([
                'status' => true,
                'html' => $html,
                'message' => 'Content imported successfully! Content is now visible in the editor below.'
            ]);
        } catch (Exception $e) {
            \Log::error('Google Docs Import Error: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed to import: ' . $e->getMessage()
            ], 500);
        }
    }
}
