<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
         abort_unless(Gate::allows('blogs'), 403);
         $userCanDelete = Gate::allows('blogs-delete');
        $title = 'Blogs';
        $sub_title = 'Blogs';

        return view('admin.blogs.index',compact('title','sub_title','userCanDelete'));
    }

    public function create()
    {
        abort_unless(Gate::allows('blogs-create'), 403);
        $title = 'Blogs';
        $sub_title = 'Add';
        return view('admin.blogs.create',compact('title','sub_title'));
    }

    public function store(StoreBlogRequest $request)
    {
        abort_unless(Gate::allows('blogs-create'), 403);
        try{
            $save= Blog::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blogs',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function show(Request $request)
    {
        abort_unless(Gate::allows('blogs'), 403);
        $data = Blog::getFullData($request);
        return $data;
    }


    public function edit($id)
    {
        abort_unless(Gate::allows('blogs-edit'), 403);
        $data = Blog::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Blogs';
        $sub_title = 'Edit';
        return view('admin.blogs.edit',compact('data','title','sub_title'));
    }






    public function update(UpdateBlogRequest $request, $id)
    {
        abort_unless(Gate::allows('blogs-edit'), 403);
        try{
            $save= Blog::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blogs',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }

    public function destroy(Request $request)
    {
        abort_unless(Gate::allows('blogs-delete'), 403);

        $delete = Blog::deleteData($request);
        return response()->json($delete);
    }






    public function changeStatus(Request $request)
    {
        $data = Blog::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Blog::updateOrder($request);

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

            // Extract document ID from URL (handle different URL formats)
            preg_match('/\/d\/([a-zA-Z0-9-_]+)/', $url, $matches);
            
            if (!isset($matches[1])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Google Docs URL format. Please use a shareable link like: https://docs.google.com/document/d/DOCUMENT_ID/edit'
                ], 400);
            }

            $docId = $matches[1];
            
            // Export URL - HTML format
            $exportUrl = 'https://docs.google.com/document/d/' . $docId . '/export?format=html';
            
            // Fetch the HTML content using cURL
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
                    'message' => 'Failed to fetch document (HTTP ' . $httpCode . '). Please ensure:\n1. The document is publicly accessible\n2. Share settings: "Anyone with the link" can view\n3. The URL is correct'
                ], 400);
            }

            if (empty($html) || strlen($html) < 100) {
                return response()->json([
                    'status' => false,
                    'message' => 'Document appears to be empty or access denied. Please check sharing settings.'
                ], 400);
            }

            // Clean up the HTML - remove Google Docs specific meta tags and scripts
            $html = preg_replace('/<meta[^>]*>/i', '', $html);
            $html = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $html);
            $html = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $html);
            
            // Remove Google Docs wrapper divs but keep content
            $html = preg_replace('/<body[^>]*>/i', '<div>', $html);
            $html = str_replace('</body>', '</div>', $html);
            
            // Clean up extra whitespace
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
