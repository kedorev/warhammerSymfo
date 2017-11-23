#!/usr/bin/env bash

vendor/bin/phpunit
if [ $? == 0 ]
then
    vendor/bin/beha
    if [ $? == 0 ]
    then
        vendor/bin/phploc src >> var
        if [ $? == 0 ]
        then
            vendor/bin/phpcs ./src >> var
            if [ $? == 0 ]
            then
                php rocketeer.phar deploy
            fi
        fi
    fi
fi