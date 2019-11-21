<?php

namespace Bedard\Prerender;

use Backend;
use Bedard\Prerender\Classes\PrerenderMiddleware;
use Event;
use GuzzleHttp\Client;
use System\Classes\PluginBase;

/**
 * Prerender Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        if (config('bedard.prerender::enable')) {
            // apply middleware to all routes
            $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

            $kernel->pushMiddleware(PrerenderMiddleware::class);

            // register an event handler to recache urls
            Event::listen('bedard.prerender.recache', function ($url) {
                $client = new Client();

                $client->request('POST', 'https://api.prerender.io/recache', [
                    'json' => [
                        'prerenderToken' => config('bedard.prerender::prerenderToken'),
                        'url' => $url,
                    ],
                ]);
            });
        }
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'author'      => 'Scott Bedard',
            'description' => 'Prerendering plugin for October CMS',
            'icon'        => 'icon-sitemap',
            'name'        => 'Prerender',
        ];
    }
}
