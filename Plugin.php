<?php

namespace Bedard\Prerender;

use Backend;
use Bedard\Prerender\Classes\PrerenderMiddleware;
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
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

        $kernel->pushMiddleware(PrerenderMiddleware::class);
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
