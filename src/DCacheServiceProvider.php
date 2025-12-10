<?php

namespace Biigle\DCache;

use Biigle\WebDav\WebDAVAdapter;
use Biigle\WebDav\WebDavServiceProvider;

class DCacheServiceProvider extends WebDavServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected function getWebDavAdapter($webdavClient, $guzzleClient, $pathPrefix): WebDAVAdapter
    {
        return new DCacheAdapter($webdavClient, $guzzleClient, $pathPrefix);
    }
}
