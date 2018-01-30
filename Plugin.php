<?php

namespace Newride\ForceScheme;

use League\Uri;
use System\Classes\PluginBase;
use URL;

/**
 * ForceScheme Plugin Information File.
 */
class Plugin extends PluginBase
{
    public $detectedScheme;

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'ForceScheme',
            'description' => 'No description provided yet...',
            'author' => 'Newride',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->detectedScheme = Uri\parse(env('APP_URL'))['scheme'];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        URL::forceScheme($this->detectedScheme);
    }
}
