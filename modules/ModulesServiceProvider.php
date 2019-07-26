<?php

namespace Laramod;

use Illuminate\Support\Facades\Log;

/**
 * Class ModulesServiceProvider sets up each individual module
 * as manually configured in 'config/module.php' or by convention where
 * each direct sub-folder of 'modules' will be considered a module.
 *
 * The conventional structure of each module comprises the following
 * files and sub-folders
 *      |- Controllers (the 'C' of MVC)
 *      |- Lang (i18n and l10n)
 *      |- Views  (the 'V' of MVC)
 *      |- Models (the 'M' of MVC)
 *      |- Migrations (database migration)
 *      |- routes.php (defining routes)
 *
 *  Such a module and its structure can be also generated via the following
 *  artisan command (see 'app/Console/Commands/GenModuleCommand.php')
 *
 *      php artisan gen:module module_name
 *
 * @package Laramod
 */
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Ensure that the modules are properly loaded
     *
     * @return void
     */
    public function boot()
    {
        $this->findAndLoadModules();
    }

    protected function findAndLoadModules()
    {
        Log::debug('Try to load the module configuration "config/module.php"');

        $modules = config("module.modules");

        if (!$modules) {

            Log::debug('File "config/module.php" does not exist or contain any module configuration');

            $modules = $this->getModuleNamesFromCurrentPath();
        }

        if ($modules) {
            array_walk($modules, function ($module) {
                $this->loadModule($module);
            });
        }
    }

    protected function getModuleNamesFromCurrentPath()
    {
        Log::debug('Extract modules from path "' . __DIR__ . '"');

        $paths = glob(__DIR__ . '/*', GLOB_ONLYDIR);

        array_walk($paths, function (&$e) {
            $e = basename($e);
        });

        return $paths;
    }

    /**
     * Load the module's resources following a conventional structure (routes.php, Views, Lang, Migrations)
     *
     * @param $module
     */
    protected function loadModule($module)
    {
        if ($module) {

            Log::debug("Loading the module '" . $module . "'");

            // load the module's routes
            if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
                Log::debug("Module routes in '" . __DIR__ . "/" . $module . "/routes.php'");
                $this->loadRoutesFrom(__DIR__ . '/' . $module . '/routes.php');
            }

            // load the module's views
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                Log::debug("Module views in '" . __DIR__ . "/" . $module . "/Views'");
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }

            // load the module's translation
            if (is_dir(__DIR__ . '/' . $module . '/Lang')) {
                Log::debug("Module's lang in '" . __DIR__ . "/" . $module . "/Lang'");
                $this->loadTranslationsFrom(__DIR__ . '/' . $module . '/Lang', $module);
            }

            // load the module's migrations
            if (is_dir(__DIR__ . '/' . $module . '/Migrations')) {
                Log::debug("Module migrations in '" . __DIR__ . "/" . $module . "/Migrations'");
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migrations', $module);
            }

        }
    }

    public function register()
    {

    }
}
