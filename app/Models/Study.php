<?php

namespace App\Models;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'studies';

    protected $fillable = [
        'study_banner_image',
        'study_banner_title',
        'sub_content_title',
        'sub_content_description',
        'sub_image',
        'package_title',
        'package_description',
        'banner_description'
    ];

    // One Study has many FAQs
    public function faqs()
    {
        return $this->hasMany(Faqstudy::class, 'study_id');
    }

    // One Study has many Cities
    public function cities()
    {
        return $this->hasMany(City::class, 'study_id');
    }

    // One Study has many Packages
    public function packages()
    {
        return $this->hasMany(Packagestudy::class, 'study_id');
    }



    public static function createData($data)
    {
        // Save the main study data


        $study = new Study([
            'study_banner_title' => $data['study_banner_title'],
            'sub_content_title' => $data['sub_content_title'],
            'sub_content_description' => $data['sub_content_description'],
            'package_title' => $data['package_title'],
            'package_description' => $data['package_description'],
            'banner_description' => $data['banner_description']   // ✅ Corrected
        ]);

        if ($data->study_banner_image) {
            $study->study_banner_image = Cms::storeImage($data->study_banner_image, $data->title);
        }
        if ($data->sub_image) {
            $study->sub_image = Cms::storeImage($data->sub_image, $data->title);
        }


        $study->save(); // Save and check if it was successful

        // Save packages data
        // First, save the single package description (once)


        if (!empty($data['package_list_title']) && is_array($data['package_list_title'])) {
            foreach ($data['package_list_title'] as $index => $packageTitle) {
                $packageListDescription = $data['package_list_description'][$index] ?? null;

                $package = new Packagestudy([
                    'study_id' => $study->id,
                    // Store it once for all packages
                    'package_list_title' => $packageTitle,
                    'package_list_description' => $packageListDescription,
                ]);

                $package->save(); // Save each package entry
            }
        }

        // Save city data
        $citySaved = true; // Track the overall success
        if (isset($data['cities_list_place']) && is_array($data['cities_list_place'])) {
            foreach ($data['cities_list_place'] as $index => $cityPlace) {
                // Create a new City record
                $city = new City([
                    'study_id' => $study->id,
                    'cities_title' => $data['cities_title'],
                    'cities_list_place' => $cityPlace,
                ]);




                if (isset($data['cities_list_image'][$index])) {

                    $city->cities_list_image = Cms::storeImage($data['cities_list_image'][$index], $data['title']);
                }


                $citySaved &= $city->save();
            }
        }



        // Save FAQ data
        $faqSaved = true;
        if (isset($data['faq_question']) && is_array($data['faq_question'])) {
            foreach ($data['faq_question'] as $index => $question) {
                $faq = new Faqstudy([
                    'study_id' => $study->id,
                    'faq_question' => $question,
                    'faq_answer' => $data['faq_answer'][$index],
                ]);
                $faqSaved &= $faq->save(); // Save and keep track of success
            }
        }

        // Return true if all saves were successful, otherwise false
        return $study && $package && $citySaved && $faqSaved;
    }
    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value = SELF::with(['faqs', 'cities', 'packages'])
            ->select('study_banner_image', 'id', 'study_banner_title', 'created_at', 'sub_content_title', 'sub_content_description', 'sub_image', 'package_title')
            ->selectRaw('study_banner_title as title') // Adding an alias for 'title'
            ->get();

        return DataTables::of($value)
            ->editColumn('image', function ($row) use ($locationData) {
                return $locationData['storage_server_path'] . $locationData['storage_image_path'] . $row->image;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('study-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('study-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }


    public static function getData($id)
    {
        return SELF::with(['faqs', 'cities', 'packages'])->find($id);
    }

    public static function updateData($data)
    {

        $study = Study::find($data->table_id);

        if (!$study) {
            return false; // Study record not found
        }

        // Ensure $data is an array
        // if (!is_array($data)) {
        //     throw new \Exception('Invalid data format');
        // }

        // Update main Study fields
        $study->study_banner_title = $data['study_banner_title'] ?? null;
        $study->sub_content_title = $data['sub_content_title'] ?? null;
        $study->sub_content_description = $data['sub_content_description'] ?? null;
        $study->package_title = $data['package_title'] ?? null;
        $study->banner_description = $data['banner_description'];
        $study->package_description = is_array($data['package_description'])
            ? implode(', ', $data['package_description']) // Convert array to string
            : $data['package_description'];


        if (!empty($data['study_banner_image'])) {
            $study->study_banner_image = Cms::storeImage($data['study_banner_image'], $data['title'] ?? '');
        }
        if (!empty($data['sub_image'])) {
            $study->sub_image = Cms::storeImage($data['sub_image'], $data['title'] ?? '');
        }

        $studySaved = $study->save();

        // Update Packages
        Packagestudy::where('study_id', $study->id)->delete(); // Remove existing packages
        $packageSaved = true;
        if (!empty($data['package_list_title']) && is_array($data['package_list_title'])) {
            foreach ($data['package_list_title'] as $index => $packageTitle) {
                $packageListDescription = $data['package_list_description'][$index] ?? null;


                $package = new Packagestudy([
                    'study_id' => $study->id,
                    'package_list_title' => $packageTitle,

                    'package_list_description' => $packageListDescription,
                ]);

                $package->save();
            }
        }

        // Update Cities
        City::where('study_id', $study->id)->delete(); // Remove existing cities
        $citySaved = true;
        if (!empty($data['cities_list_place']) && is_array($data['cities_list_place'])) {
            foreach ($data['cities_list_place'] as $index => $cityPlace) {
                $city = new City([
                    'study_id' => $study->id,
                    'cities_title' => $data['cities_title'] ?? '',
                    'cities_list_place' => $cityPlace,
                ]);
                if (!empty($data['cities_list_image'][$index])) {
                    $city->cities_list_image = Cms::storeImage($data['cities_list_image'][$index], $data['title'] ?? '');
                }
                $citySaved &= $city->save();
            }
        }

        // Update FAQs
        Faqstudy::where('study_id', $study->id)->delete(); // Remove existing FAQs
        $faqSaved = true;
        if (!empty($data['faq_question']) && is_array($data['faq_question'])) {
            foreach ($data['faq_question'] as $index => $question) {
                $faqAnswer = $data['faq_answer'][$index] ?? null;

                $faq = new Faqstudy([
                    'study_id' => $study->id,
                    'faq_question' => $question,
                    'faq_answer' => $faqAnswer,
                ]);
                $faqSaved &= $faq->save();
            }
        }

        return $studySaved && $packageSaved && $citySaved && $faqSaved;
    }

    public static function deleteData($data)
    {

        $value = SELF::with(['faqs', 'cities', 'packages'])->find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else
            return false;
    }


    public static function changeStatus($data)
    {
        $value = SELF::with(['faqs', 'cities', 'packages'])->find($data->id);
        if ($value) {
            $value->status = $value->status == 1 ? 0 : 1;
            $value->save();
            return true;
        } else
            return false;
    }



    public static function getFullDataForHome(){
        return SELF::with(['faqs', 'cities', 'packages'])->get();
    }
}
