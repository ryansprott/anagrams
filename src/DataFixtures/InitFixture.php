<?php

namespace App\DataFixtures;

use App\Entity\Word;
use App\Utils\PrimeUtil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

// because PHP is definitely going to run out of memory otherwise
ini_set('memory_limit', '-1');

/**
 * Initialize the DB by recording each word with its numeric representation
 * Requires word lists from http://www.keithv.com/software/wlist/
 * Make sure the fully-qualified path to wlist_matchX.txt is in your .env.local
 *
 * Class InitFixture
 * @package App\DataFixtures
 * @author Ryan Sprott
 */
class InitFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws FileNotFoundException
     */
	public function load(ObjectManager $manager)
	{
		$dictionaryFile = getenv('DICTIONARY_FILE');
		if (FALSE === file_exists($dictionaryFile)) {
		    throw new FileNotFoundException("Dictionary file {$dictionaryFile} not found. Check your .env.local");
        }

        $primeUtil = new PrimeUtil();
		$words = explode("\n", shell_exec("cat {$dictionaryFile}"));
		foreach ($words as $item) {
            // strip non-alphabetic characters
            $item = strtolower(preg_replace("/[^A-Za-z]/", '', $item));
			if ($item) {
				$num = $primeUtil->getNumericRepresentation($item);
				$word = new Word();
				$word->setTextRepresentation($item);
				$word->setNumericRepresentation($num);
				$manager->persist($word);
			}
		}
		$manager->flush();
	}
}
