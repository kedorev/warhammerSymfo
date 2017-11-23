#!/usr/bin/env bash

vendor/bin/phpunit >> var
echo var
if [ var == 0 ]
then
    vendor/bin/behat >> var
    echo var
    if [ var == 0 ]
    then
        vendor/bin/phploc src >> var
        echo var
        if [ var == 0 ]
        then
            vendor/bin/phpcs ./src >> var
            echo var
            if [ var == 0 ]
            then
                php rocketeer.phar deploy
            fi
        fi
    fi
fi