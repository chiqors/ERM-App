<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveAdapter extends \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter
{
    public function getService()
    {
        return $this->service;
    }
}
