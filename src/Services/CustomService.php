<?php

namespace App\Services;

class CustomService {
    public function getBackgroundImage ($projectDir) {
        $searchdir = $projectDir . "/public/uploads";
        //$searchdir="/var/www/html/wdev2.be/web/stephen21/eindwerk/uploads";
        $images = array_diff(scandir($searchdir), array('.','..'));
        
        $randomKey = array_rand($images);
        $bgImage = $images[$randomKey];

        return $bgImage;
    }
}