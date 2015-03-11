#!/bin/bash

echo -e "\nAPIManager Test\n"
vendor/bin/phpunit tests/APIManagerTest.php

echo -e "\nSong Test\n"
vendor/bin/phpunit tests/SongTest.php

echo -e "\nWord Test\n"
vendor/bin/phpunit tests/WordTest.php
