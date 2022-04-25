<?php

namespace Trov\Faqs\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class FaqsOverview extends Widget
{
    public $faqs;

    protected static string $view = 'trov-faqs::components.widgets.faqs-overview';

    public function mount()
    {
        $this->faqs = DB::table('faqs')
            ->select('status', DB::raw('count(*) as total'))
            ->where('deleted_at', null)
            ->groupBy('status')
            ->get();
    }
}
