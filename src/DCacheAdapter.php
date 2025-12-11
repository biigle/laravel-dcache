<?php

namespace Biigle\DCache;

use Biigle\WebDav\WebDAVAdapter;

class DCacheAdapter extends WebDAVAdapter
{
    /**
     * Get a temporary URL for the file at the given path.
     *
     * See: https://dcache.org/manuals/UserGuide-10.2/webdav.shtml#requesting-macaroons
     */
    public function getTemporaryUrl($path, $expiration, $options): string
    {
        $location = $this->encodePath($this->prefixer->prefixPath($path));
        $url = $this->client->getAbsoluteUrl($location);

        $response = $this->guzzle->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/macaroon-request',
            ],
            'json' => [
                'caveats' => [
                    "activity:DOWNLOAD",
                    "before:".$expiration->toIso8601ZuluString(),
                ],
            ],
        ]);

        $macaroon = json_decode($response->getBody());

        return $macaroon->uri->targetWithMacaroon;
    }
}
