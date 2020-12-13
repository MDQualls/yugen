<?php
namespace App\Services\Video\Adapter;

use GuzzleHttp\Client;

class TikTokAdapter implements VideoAdapterInterface
{
    /**
     * @var string
     */
    protected $tiktokBaseUrl = 'https://www.tiktok.com/oembed?url=';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * newest in the zero index
     * todo: automate the video listings in the future
     * @var array
     */
    protected $videos = [
        'https://www.tiktok.com/@yugenfarm/video/6904689104110308613?lang=en',
        'https://www.tiktok.com/@yugenfarm/video/6899550917524262149?lang=en',
        'https://www.tiktok.com/@yugenfarm/video/6897977735109414149?lang=en',
        'https://www.tiktok.com/@yugenfarm/video/6897737949790883077?lang=en',
    ];

    /**
     * @var string
     */
    protected $dataFormat = 'json';

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getVideos(): array
    {
        $result = [];

        foreach ($this->videos as $url)  {
            $res = $this->httpClient->request('GET', $this->tiktokBaseUrl . $url);

            $result[] = json_decode($res->getBody());
        }

        return $result;
    }

    public function getDataFormat() : string
    {
        return $this->dataFormat;
    }

    public function __toString(): string
    {
        return self::class;
    }
}
