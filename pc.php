#! /usr/bin/env php
<?php

use Palmacodi\SayHelloCommand;
use Palmacodi\NewCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app = new Application('Palmacodi CLI Demo', '1.0');

$app->add(new NewCommand(new GuzzleHttp\Client));

$app->run();