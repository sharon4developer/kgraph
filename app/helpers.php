<?php

    function getLocationData(){

        $locationData = [
            'storage_server_path' => config('settings.file_path.STORAGE_SERVER_PATH'),
            'storage_video_path' => config('settings.file_path.STORAGE_VIDEO_PATH'),
            'storage_image_path' => config('settings.file_path.STORAGE_IMAGE_PATH'),
            'storage_small_image_path' => config('settings.file_path.STORAGE_SMALL_IMAGE_PATH'),
            'static_assets_path' => config('settings.file_path.STATIC_ASSETS_PATH'),
            'admin_assets_path' => config('settings.file_path.ADMIN_ASSETS_PATH')
        ];

        return $locationData;
    }

?>
