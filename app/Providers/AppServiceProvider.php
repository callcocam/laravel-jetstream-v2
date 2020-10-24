<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Providers;

use App\Http\Livewire\Table\TableServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->register(MultitenancyServiceProvider::class);
       $this->app->register(TableServiceProvider::class);

        $this->app->afterResolving(BladeCompiler::class, function () {
           //Livewire::component('landlord.navigation-dropdown', NavigationDropdown::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->configureComponents();
    }

    /**
     * Configure the Jetstream Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('test-message');
        });
         $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponentLandlord('switchable-tenant');
        });

        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponentAlert('header');
            $this->registerComponentAlert('toast');
            $this->registerComponentAlert('footer');
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponentLandlord(string $component)
    {
        Blade::component('components.landlord.'.$component, 'land-'.$component);
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponentAlert(string $component)
    {
        Blade::component('components.alerts.'.$component, 'alert-'.$component);
    }
    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('components.'.$component, 'jet-'.$component);
    }
}
