<?php

namespace Biigle\DCache;

use Biigle\WebDav\WebDAVAdapter;

class DCacheAdapter extends WebDAVAdapter
{
    /**
     * Get a temporary URL for the file at the given path.
     */
    public function getTemporaryUrl($path, $expiration, $options): string
    {
        // TODO: https://dcache.org/old/manuals/UserGuide-6.2/webdav.shtml#requesting-macaroons
        return 'https://example.com';
    }
}
