<?php


namespace App\Http\View\Composers;

use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class AgentComposer
{
    /**
     * @var Agent
     */
    protected $agent;


    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('agent', $this->agent);
    }
}
