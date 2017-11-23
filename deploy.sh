#!/usr/bin/env bash

vendor/bin/phpunit
if [ $? == 0 ]
then
    vendor/bin/behat
    if [ $? == 0 ]
    then
        vendor/bin/phploc src
        if [ $? == 0 ]
        then
            vendor/bin/phpcs ./src
            if [ $? == 0 ]
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