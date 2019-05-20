# Anagram generator (with bonus GIF action) 

## About

Find anagrams for your favorite words while you look at three grainy, 
distorted GIFs.

## Setup

You'll need an [English word list] of your choice; I recommend 
wlist_match6 (about 181,000 words). Make sure the fully-qualified path
to the file is present in .env.local. Make sure your [GIPHY API] key is
present in .env.local as well.

## Installation

```$sh
    composer install
    yarn install
    ./bin/console doctrine:database:create
    ./bin/console doctrine:migrations:migrate
    ./bin/console doctrine:fixtures:load
    ./bin/console server:start
    ./node_modules/.bin/encore dev-server --hot
```

[English word list]: <http://www.keithv.com/software/wlist/>
[GIPHY API]: <https://developers.giphy.com/>
