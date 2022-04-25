<?php

namespace Trov\Faqs;

use Livewire\Livewire;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class TrovFaqsServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('trov-faqs')
            ->hasViews()
            ->hasCommand(Commands\InstallTrovFaqs::class)
            ->hasMigrations([
                'create_faqs_table',
            ]);
    }

    public function boot()
    {
        parent::boot();

        Livewire::component('faqs-overview', Widgets\FaqsOverview::class);
    }
}
