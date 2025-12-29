<?php

namespace App\Models;

use App\Helpers\UnifiedMailer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsLetter extends Model
{
    use HasFactory;

    protected $table = 'news_letters';

    protected $fillable = ['email', 'order'];

    public static function getFullData($request)
    {
        $value =  SELF::select('email', 'id', 'created_at')->orderBy('order', 'asc');

        if ($request->has('from_date') && $request->filled('from_date')) {
            $value->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->filled('to_date')) {
            $value->whereDate('created_at', '<=', $request->input('to_date'));
        }

        return DataTables::of($value)

            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s', strtotime($row->created_at));
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('news-letter-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('news-letter-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function saveNewsLetter($data)
    {
        $value = new NewsLetter;
        $value->email = $data->news_letter_email;
        $value->save();

        // Send confirmation email using UnifiedMailer (SMTP primary, RawMailer fallback)
        $subject = "Newsletter Subscription Successful";
        $htmlBody = view('emails.newsletter_subscribed', [
            'email' => $data->news_letter_email,
        ])->render();

        UnifiedMailer::sendWithAttachments(
            $data->news_letter_email,
            $subject,
            $htmlBody,
            [] // No attachments
        );

        return true;
    }

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function updateOrder($data)
    {
        foreach ($data->order as $key => $value) {
            $step = SELF::find($value['id']);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }
}
