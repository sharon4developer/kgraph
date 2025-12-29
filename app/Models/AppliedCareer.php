<?php

namespace App\Models;
use App\Helpers\UnifiedMailer;
use Illuminate\Support\Facades\Storage; 
use App\Mail\CareerApplication;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppliedCareer extends Model
{
    use HasFactory;

    protected $table = 'applied_careers';

    protected $fillable = ['email', 'name', 'country_code', 'mobile', 'branch', 'department', 'message', 'resume', 'career_id', 'order'];

    public function Branch()
    {
        return  $this->belongsTo(CareerBranch::class, 'branch')->withTrashed();
    }

    public function Career()
    {
        return  $this->belongsTo(Career::class, 'career_id')->withTrashed();
    }

    public function Department()
    {
        return  $this->belongsTo(CareerDepartment::class, 'department')->withTrashed();
    }

    public static function getFullData($request)
    {
        $locationData = getLocationData();

        $value =  SELF::with(['Branch:id,title', 'Department:id,title'])->select('email', 'id', 'created_at', 'name', 'country_code', 'mobile', 'branch', 'department', 'message', 'resume', 'career_id')->orderBy('order', 'asc');

        if ($request->has('from_date') && $request->filled('from_date')) {
            $value->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->filled('to_date')) {
            $value->whereDate('created_at', '<=', $request->input('to_date'));
        }

        // return DataTables::of($value)
        // ->addIndexColumn()
        // ->editColumn('mobile', function ($row) {
        //     return $row->country_code . $row->mobile;
        // })
        // ->editColumn('branch', function ($row) {
        //     return $row->branch ? $row->Branch->title : '';
        // })
        // ->editColumn('career_id', function ($row) {

        //     return $row->career_id ? $row->Career->title : '';
        // })
        // ->editColumn('department', function ($row) {
        //     return $row->department ? $row->Department->title : '';
        // })
        // ->editColumn('resume', function ($row) use($locationData) {
        //     return isset($row->resume) ? $locationData['storage_server_path'].$locationData['storage_image_path'].$row->resume : NULL;
        // })
        // ->editColumn('message', function ($row) use($locationData) {
        //     return isset($row->message) ?  $locationData['storage_server_path'].$locationData['storage_image_path'].$row->message : NULL;
        // })
        // ->editColumn('created_at', function ($row) {
        //     return date('Y-m-d H:i:s',strtotime($row->created_at));
        // })
        // ->make(true);

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->editColumn('branch', function ($row) {
                return $row->branch ? $row->Branch->title : '';
            })
            ->editColumn('career_id', function ($row) {
                return $row->career_id ? $row->Career->title : '';
            })
            ->editColumn('department', function ($row) {
                return $row->department ? $row->Department->title : '';
            })
            ->editColumn('resume', function ($row) use ($locationData) {
                //return isset($row->resume) ? $locationData['storage_server_path'] . $locationData['storage_image_path'] . $row->resume : NULL;
                if (! $row->resume) return null;
                $fileNewPath = $locationData['storage_image_path'] . $row->resume;
                return Storage::disk('public')->url($fileNewPath);
            })
            ->editColumn('message', function ($row) use ($locationData) {
                // return isset($row->message) ? $locationData['storage_server_path'] . $locationData['storage_image_path'] . $row->message : NULL;
                if (! $row->message) return null;
                $fileNewPath = $locationData['storage_image_path'] . $row->message;
                return Storage::disk('public')->url($fileNewPath);

            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s', strtotime($row->created_at));
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('faq-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('faq-edit');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

/*
    
    //Augest 4 2025 commented to use the simple php mailer function

    public static function saveCareerNew($data)
    {
        $locationData = getLocationData();

        $value = new AppliedCareer;
        $value->name = $data->name_n;
        $value->email = $data->email_n;
        $value->country_code = $data->country_n;
        $value->career_id = $data->job_id;
        $value->mobile = $data->mobile_n;
        $value->branch = $data->branch_n;
        $value->department = $data->department_n;
        // $value->message = $data->message_n;

        if ($data->resume_n) {
            $value->resume = Cms::storeImage($data->resume_n, $data->name_n);
        };

        if ($data->message_n) {
            $value->message = Cms::storeImage($data->message_n, $data->name_n);
        };

        $value->save();

        $career = Career::find($data->job_id);
        $jobName = $career ? $career->title : NULL;
        $branch = CareerBranch::find($data->branch_n);
        $branchName = $branch ? $branch->title : NULL;
        $department = CareerDepartment::find($data->department_n);
        $departmentName = $department ? $department->title : NULL;
        $emailData = [
            'name' => $data->name_n,
            'email' => $data->email_n,
            'mobile' => $data->country_n . ' ' . $data->mobile_n,
            'branchName' => $branchName,
            'departmentName' => $departmentName,
            'jobName' => $jobName,
            'resume' =>  isset($data->resume_n) ? $data->resume_n : NULL,
            'message' =>  isset($data->message_n) ? $data->message_n : NULL,
        ];

        // Send email with resume as attachment
        Mail::to($data->email_n)->send(new CareerApplication($emailData, $emailData['resume'], $emailData['message']));
        $careerEmail = config('services.career_notifications.email');
        Mail::to($careerEmail)->send(new CareerApplication($emailData, $emailData['resume'], $emailData['message']));

        return true;
    }
*/



   /**
 * Save a new career application and send email via PHP mail() with attachments.
 *
 * @param  object  $data
 * @return bool
 */
public static function saveCareerNew($data)
{
    // 1) Persist the record
    $value = new self;
    $value->name         = $data->name_n;
    $value->email        = $data->email_n;
    $value->country_code = $data->country_n;
    $value->career_id    = $data->job_id;
    $value->mobile       = $data->mobile_n;
    $value->branch       = $data->branch_n;
    $value->department   = $data->department_n;

    if ($data->resume_n) {
        $value->resume = Cms::storeImage($data->resume_n, $data->name_n);
    }
    if ($data->message_n) {
        $value->message = Cms::storeImage($data->message_n, $data->name_n);
    }

    $value->save();

    // 2) Lookup friendly names
    $career     = Career::find($data->job_id);
    $jobName    = $career ? $career->title : '';
    $branch     = CareerBranch::find($data->branch_n);
    $branchName = $branch ? $branch->title : '';
    $dept       = CareerDepartment::find($data->department_n);
    $deptName   = $dept ? $dept->title : '';

    // 3) Prepare data for Blade view
    $contactData = [
        'name'           => $data->name_n,
        'email'          => $data->email_n,
        'mobile'         => $data->country_n . ' ' . $data->mobile_n,
        'branchName'     => $branchName,
        'departmentName' => $deptName,
        'jobName'        => $jobName,
        'resume'         => $value->resume,
        'message'        => $value->message,
    ];

    // 4) Render HTML email body
    $subject  = "Your application for “{$jobName}”";
    $htmlBody = view('emails.career_application', [
        'contactData' => $contactData,
    ])->render();

    // 5) Resolve attachment paths
    $attachments = [];
    if ($value->resume) {
        $path = storage_path("assets/uploads/{$value->resume}");
        if (file_exists($path)) {
            $attachments[] = $path;
        }
    }
    if ($value->message) {
        $path = storage_path("assets/uploads/{$value->message}");
        if (file_exists($path)) {
            $attachments[] = $path;
        }
    }

    // 6) Send to applicant
    UnifiedMailer::sendWithAttachments(
        $data->email_n,
        $subject,
        $htmlBody,
        $attachments
    );

    // 7) Notify internal team
    $careerEmail = config('services.career_notifications.email');
    UnifiedMailer::sendWithAttachments(
        $careerEmail,
        "New application received for "{$jobName}"",
        $htmlBody,
        $attachments
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
