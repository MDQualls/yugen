<?php

namespace App\Services\Video\Adapter;

interface VideoAdapterInterface
{
    public function getDataFormat(): string;

    public function getVideos(): array;

    public function __toString(): string;
}
