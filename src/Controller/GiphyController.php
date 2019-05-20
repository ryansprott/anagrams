<?php

namespace App\Controller;

use App\Utils\CurlUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Giphy controller.
 *
 * Class GiphyController
 * @package App\Controller
 * @author Ryan Sprott
 */
class GiphyController extends AbstractController
{
    /**
     * @param String $word Find GIFs for this word
     * @param String $rating MPAA rating for GIF results
     * @return JsonResponse
     */
    public function gifs(String $word, String $rating)
    {
        $output['word'] = $word;
        $output['gifs'] = [];
        $apiKey = getenv('GIPHY_API_KEY');
        $url = "http://api.giphy.com/v1/gifs/search?api_key={$apiKey}&rating={$rating}&limit=3&q={$word}";
        $curlUtil = new CurlUtil($url);
        $json = $curlUtil->getResult();
        foreach ($json->data as $item) {
            array_push($output['gifs'], $item->images->downsized->url);
        }
        $response = new JsonResponse($output);
        $response->headers->set('Symfony-Debug-Toolbar-Replace', 1);
        return $response;
    }
}
