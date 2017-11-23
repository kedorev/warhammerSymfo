#!/usr/bin/env bash

vendor/bin/phpunit
if [ $? -eq 0 ]
then
    vendor/bin/behat
    if [ $? -eq 0 ]
    then
        vendor/bin/phploc src
        if [ $? -eq 0 ]
        then
            vendor/bin/phpcs ./src
            if [ $? -eq 0 ]
            then
                php rocketeer.phar deploy
            fi
        else
            exit 1
        fi
    else
        exit 1
    fi
else
    exit 1
fi