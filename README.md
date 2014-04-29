Description [![Build Status](https://secure.travis-ci.org/charlycoste/NLPHP.png)](http://travis-ci.org/charlycoste/NLPHP)
===========

Quelques classes PHP permettant des traitements très basiques du langage naturel
à l'aide de grammaires de Chomsky et de la matrice de Coke


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

Unit tests are using PHPUnit. Too launch it, from the project folder type:

    ./vendor/bin/phpunit


License
=======

[[AGPL](http://www.gnu.org/graphics/agplv3-155x51.png)](http://www.gnu.org/licenses/agpl-3.0.html)

Copyright (C) 2012 Synap System SARL

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
