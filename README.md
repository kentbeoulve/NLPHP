Description 
===========
[![Build Status](https://secure.travis-ci.org/charlycoste/NLPHP.png)](http://travis-ci.org/charlycoste/NLPHP)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/charlycoste/NLPHP/badges/quality-score.png?s=ab9b1902eac275ee8b15b05f84f6aec99ba0eea7)](https://scrutinizer-ci.com/g/charlycoste/NLPHP/)
[![Code Coverage](https://scrutinizer-ci.com/g/charlycoste/NLPHP/badges/coverage.png?s=cca6ea966108ee1a7b146c28afefa1b547d469eb)](https://scrutinizer-ci.com/g/charlycoste/NLPHP/)
[![Latest Stable Version](https://poser.pugx.org/charlycoste/nlphp/v/stable.png)](https://packagist.org/packages/charlycoste/nlphp)
[![License](https://poser.pugx.org/charlycoste/nlphp/license.png)](https://packagist.org/packages/charlycoste/nlphp)
[![Total Downloads](https://poser.pugx.org/charlycoste/nlphp/downloads.png)](https://packagist.org/packages/charlycoste/nlphp)

Quelques classes PHP permettant des traitements très basiques du langage naturel
à l'aide de grammaires de Chomsky et de la matrice de Coke

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/67b9e8d4-da80-4b51-a7aa-07cc6dcfc080/big.png)](https://insight.sensiolabs.com/projects/67b9e8d4-da80-4b51-a7aa-07cc6dcfc080)

Dépendances
===========

 - PHP 5
 - eZ Components


Installation
============

Installation of NLPHP uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

    php composer.phar require charlycoste/nlphp:dev-master

or

    composer require charlycoste/nlphp:dev-master

Installation without composer is not officially supported, and requires you to install and autoload
the dependencies specified in the `composer.json`.

Unit tests
==========

Unit tests are using PHPUnit. To launch it, from the project folder type:

    ./vendor/bin/phpunit


License
=======

[![AGPL](http://www.gnu.org/graphics/agplv3-155x51.png)](http://www.gnu.org/licenses/agpl-3.0.html)

Copyright (C) 2011-2014 Charles-Edouard Coste

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
