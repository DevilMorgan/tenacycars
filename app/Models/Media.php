<?php

namespace App\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
// use Spatie\MediaLibrary\Models\Media as SpatieMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    use UsesTenantConnection;

}