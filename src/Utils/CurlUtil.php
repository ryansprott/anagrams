<?php

namespace App\Utils;

use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * Class CurlUtil
 * @author Ryan Sprott
 * @package App\Utils
 */
class CurlUtil
{
    private $curl_handler;
    /**
     * CurlUtil constructor.
     *
     * @param $url URL that will receive the cURL request
     * @throws ParameterNotFoundException
     */
    public function __construct($url)
    {
        if (empty($url)) {
            throw new ParameterNotFoundException("URL not specified");
        }
        $this->curl_handler = curl_init();
        curl_setopt($this->curl_handler, CURLOPT_URL, $url);
        curl_setopt($this->curl_handler, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
        curl_setopt($this->curl_handler, CURLOPT_RETURNTRANSFER, 1);
    }

    /**
     * Returns the cURL result.
     *
     * @return mixed
     */
    public function getResult()
    {
        $curl_result = curl_exec($this->curl_handler);
        return json_decode($curl_result);
    }
}
