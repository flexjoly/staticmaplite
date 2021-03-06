<?php

/**
 * staticMapLite 0.3.1
 *
 * Copyright 2009 Gerhard Koch
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author Gerhard Koch <gerhard.koch AT ymail.com>
 *
 * USAGE:
 *
 *  staticmap.php?center=40.714728,-73.998672&zoom=14&size=512x512&maptype=mapnik&markers=40.702147,-74.015794,blues|40.711614,-74.012318,greeng|40.718217,-73.998284,redc
 *
 */

require_once '../vendor/autoload.php';

use StaticMapLite\Element\Factory\Marker\ExtraMarkerFactory;
use StaticMapLite\Element\Polyline\Polyline;
use StaticMapLite\Printer\Printer;

$printer = new Printer();

$query = new \StaticMapLite\Query\Query();
$query->setPrinter($printer)->execute();

$guesserList = [
    new StaticMapLite\Guesser\MapCenterGuesser(),
    new \StaticMapLite\Guesser\MapTypeGuesser(),
    new \StaticMapLite\Guesser\MapZoomGuesser(),
];

foreach ($guesserList as $guesser) {
    $guesser->setPrinter($printer)->guess();
}

$printer->showMap();




