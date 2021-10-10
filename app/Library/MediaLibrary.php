<?php

namespace App\Library;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class MediaLibrary extends DefaultPathGenerator
{
    
    //   Get a unique base path for the given media.
     
    protected function getBasePath(Media $media): string
    {
        $website = \Hyn\Tenancy\Facades\TenancyFacade::website();
        // dd($website->uuid);
        return 'tenancy'.DIRECTORY_SEPARATOR.'tenants'.DIRECTORY_SEPARATOR.$website->uuid.DIRECTORY_SEPARATOR.$media->getKey();
        // return $currentTenant->unique_id.DIRECTORY_SEPARATOR.$media->getKey();
    }
}