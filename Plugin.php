<?php namespace GrofGraf\CookieNotice;

use Backend;
use System\Classes\PluginBase;

/**
 * CookieNotice Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'CookieNotice',
            'description' => 'Cookie notice required by EU directive',
            'author'      => 'GrofGraf',
            'icon'        => 'icon-legal'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'GrofGraf\CookieNotice\Components\cookieNotice' => 'cookieNotice',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'grofgraf.cookienotice.some_permission' => [
                'tab' => 'CookieNotice',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'cookienotice' => [
                'label'       => 'CookieNotice',
                'url'         => Backend::url('grofgraf/cookienotice/mycontroller'),
                'icon'        => 'icon-legal',
                'permissions' => ['grofgraf.cookienotice.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Cookie notice',
                'description' => 'Settings for cookie notice, required by EU directive',
                'category'    => 'Cookies',
                'icon'        => 'icon-legal',
                'class'       => 'GrofGraf\CookieNotice\Models\Settings',
                'order'       => 100
            ]
        ];
    }
}
