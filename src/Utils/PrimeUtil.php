<?php

namespace App\Utils;

/**
 * Class PrimeUtil
 * @author Ryan Sprott
 * @package App\Utils
 */
class PrimeUtil
{
    private $combined = [];

    /**
     * PrimeUtil constructor.
     */
    public function __construct()
    {
        $primes = $this->getPrimes();
		$this->combined = array_combine(range('a', 'z'), $primes);
    }

    /**
     * Returns a numeric representation of a string by associating each
     * character in the string with a prime number and finding the product
     *
     * @param String $input The word to convert
     * @return String
     */
    public function getNumericRepresentation(String $input): String
    {
        // split the input string into an array of lowercase characters
        $arr = str_split($input);

        // find the prime associated with each character and multiply them all together
        $product = 1;
        foreach ($arr as $a) {
            $product *= $this->combined[$a];
        }

        return strval($product);
    }

    /**
     * @param int $num Integer to test for primality
     * @return bool
     */
    private function isPrime(int $num): bool
    {
		if ($num == 1) return false;
		if ($num == 2) return true;
		if ($num % 2 == 0) return false;

		$ceil = ceil(sqrt($num));
		for ($i = 3; $i <= $ceil; $i += 2) {
		    if ($num % $i == 0) return false;
		}

		return true;
	}

    /**
     * Returns an array of the first 26 prime numbers (one for each letter in
     * the alphabet)
     *
     * @return array
     */
	private function getPrimes(): array
    {
		$primes = [];
		$index  = 1;
		while (count($primes) < 26) {
			if ($this->isPrime($index)) {
				array_push($primes, $index);
			}
            $index++;
		}
		return $primes;
	}
}
