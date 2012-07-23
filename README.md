# Version

[![Build Status](https://secure.travis-ci.org/kherge/Version.png?branch=master)](http://travis-ci.org/kherge/Version)

A parsing and comparison library for [semantic versioning](http://semver.org/).

## Installing

To install Version, you must add it to the list of dependencies in your [`composer.json`][Composer] file.

    $ php composer.phar require kherge/version=1.*

If you are not using Composer to manage your dependencies, you may use any [PSR-0][PSR-0] class loader to load Wisdom.

## Usage

To create an instance from an existing version string, pass it to the constructor:

    <?php

        $version = new Version('1.2.3-alpha.1+build.123');

Or you can create it from scratch using the available class methods:

    <?php

        $version = new Version;
    
        $version->setMajor(1);
        $version->setMinor(2);
        $version->setPatch(3);
        $version->setPreRelease('alpha', 1);
        $version->setBuild('build', 123);

        echo $version; // "1.2.3-alpha.1+build.123"

If you just need to extract information, you can use these methods:

    <?php

        $major = $version->getMajor();
        $minor = $version->getMinor();
        $patch = $version->getPatch();
        $pre = $version->getPreRelease();
        $build = $version->getBuild();

You can also compare to version instances to each other:

    <?php

        $a = new Version('1.0.0-beta.1');
        $b = new Version('1.0.0');

        echo $a->isEqualsTo($b) ? 'Yes' : 'No'; // "No"
        echo $a->isGreaterThan($b) ? 'Yes' : 'No'; // "No"
        echo $a->isLessThan($b) ? 'Yes' : 'No'; // "Yes"

        $precedence = $a->compareTo($b);

        if (0 > $precedence)
        {
            echo '$a > $b';
        }

        elseif (0 < $precedence)
        {
            echo '$a < $b';
        }

        else
        {
            echo '$a == $b';
        }

[Composer]: http://getcomposer.org/
[PSR-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md