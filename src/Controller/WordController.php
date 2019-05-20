<?php

namespace App\Controller;

use App\Repository\WordRepository;
use App\Utils\PrimeUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Word controller.
 *
 * Class WordController
 * @package App\Controller
 * @author Ryan Sprott
 */
class WordController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @param String $word Find anagrams for this word
     * @param WordRepository $repository
     * @return JsonResponse
     */
    public function anagrams(String $word, WordRepository $repository)
    {
        $primeUtil = new PrimeUtil();
        // strip non-alphabetic characters
        $word = strtolower(preg_replace("/[^A-Za-z]/", '', $word));
        $numericRepresentation = $primeUtil->getNumericRepresentation($word);
        $result = $repository->findByNumericRepresentation($numericRepresentation);
        // flatten the result
        $anagrams = array_column($result, 'text_representation');
        $response = new JsonResponse($anagrams);
        $response->headers->set('Symfony-Debug-Toolbar-Replace', 1);
        return $response;
    }
}
