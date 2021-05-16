<?php
namespace App\Services\Log;

interface LogServiceInterface
{
    public function error($message, array $config = []);
}
