# Laravel dCache

A dCache filesystem driver for Laravel.


### Installation
```bash
composer require biigle/laravel-dcache
```

## Usage

### Add the new entries to your `.env`
```env
DCACHE_BASEURL=""
DCACHE_USERNAME=
DCACHE_PASSWORD=

# or as alternative to username and password a bearer token:
DCACHE_TOKEN=

# Optional
DCACHE_PROXY=
DCACHE_PATHPREFIX=""
DCACHE_AUTHTYPE=
DCACHE_ENCODING=
```

### Add the new entries to the config

`config/filesystems.php`
```php

'disks' => [
    ...
    'dcache' => [
        'driver'     => 'dcache',
        'baseUri'    => env("DCACHE_BASEURL"),
        'userName'   => env("DCACHE_USERNAME"),
        'password'   => env("DCACHE_PASSWORD"),
        'pathPrefix' => env("DCACHE_PATHPREFIX", ''),

        // Alternative to userName and password
        'token'   => env("DCACHE_TOKEN"),

        // Optional prameters
        // 'proxy'      => env("DCACHE_PROXY", 'locahost:8888'),
        // 'authType'   => env("DCACHE_AUTHTYPE", null),
        // 'encoding'   => env("DCACHE_ENCODING", null),
    ],
    ...
];
```
After adding the config entry you can use it in your storage driver.

[Laravel filesystem](https://laravel.com/docs/master/filesystem)

```php
Storage::disk('dcache')->files('...')
```


## Config

The driver uses the WebDAV driver under the hood. See [biigle/laravel-webdav](https://github.com/biigle/laravel-webdav/tree/main?tab=readme-ov-file#config) for the available config options.
