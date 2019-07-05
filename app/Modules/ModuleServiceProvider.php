<?php
namespace App\Modules;
use File;

class ModuleServiceProvider extends  \Illuminate\Support\ServiceProvider{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $modules = array_map('basename', File::directories(__DIR__.'\\'. $moduleName));
            foreach ($modules as $sub_moduleName) {
                // print_r($sub_moduleName);
                // echo "<br>";
                $this->_registerModule($moduleName,$sub_moduleName);
            }
        }
       
    }
    private function _registerModule($moduleName,$sub_moduleName) {
        $modulePath = __DIR__ . "/$moduleName/$sub_moduleName/";
        // boot route
        // echo "<pre>";
        // echo $moduleName;
        // echo "<pre>";
        // $routes= $modulePath."routes.php";
        // echo $routes;
        // echo "</pre>";
        if (File::exists($modulePath . "routes.php")) {
            \Route::group(['prefix' => 'admin','namespace'=>'App\Modules','middleware'=>['web','auth']], function() use($modulePath){
                $this->loadRoutesFrom($modulePath . "routes.php");
            });  
        }
        // boot migration
        if (File::exists($modulePath . "Migrations")) {
            $this->loadMigrationsFrom($modulePath . "Migrations");
        }
        // boot languages
        if (File::exists($modulePath . "Languages")) {
            $this->loadTranslationsFrom($modulePath . "Languages", $sub_moduleName);
        }
        // boot views
        if (File::exists($modulePath . "Views")) {
            $this->loadViewsFrom($modulePath . "Views", $sub_moduleName);
        }
    }
}