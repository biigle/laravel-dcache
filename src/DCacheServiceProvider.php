<?php

namespace Biigle\DCache;

use Biigle\WebDav\WebDAVAdapter;
use Biigle\WebDav\WebDavServiceProvider;

class DCacheServiceProvider extends WebDavServiceProvider
{
    const DISK_TYPE = 'dcache';

    /**
     * {@inheritdoc}
     */
    public function getWebDavAdapter($webdavClient, $guzzleClient, $pathPrefix, $url = null): WebDAVAdapter
    {
        return new DCacheAdapter($webdavClient, $guzzleClient, $pathPrefix, $url);
    }
}
