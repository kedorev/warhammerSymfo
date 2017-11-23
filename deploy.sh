#!/usr/bin/env bash

vendor/bin/phpunit >> var
if [ var == 0 ]
then
    vendor/bin/behat >> var
    if [ var == 0 ]
    then
        vendor/bin/phploc src >> var
        if [ var == 0 ]
        then
            vendor/bin/phpcs ./src >> var

            if [ var == 0 ]
            then
                php rocketeer.phar deploy
            fi
        fi
    fi
fi