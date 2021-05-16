<?php

namespace App\Services\Log;

use Illuminate\Support\Facades\Log;

class LogService implements LogServiceInterface
{
    /**
     * @param $message
     * @param array $config
     */
    public function error($message, array $config = [])
    {
        Log::error($message, $config);
        session()->flash('error', 'An internal error occurred during this operation.  Please try again.');
    }
}
