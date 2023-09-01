#!/usr/bin/env php
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require __DIR__ . '/../vendor/autoload.php';

use XIP\CS\DocumentationGenerator;

DocumentationGenerator::generate();