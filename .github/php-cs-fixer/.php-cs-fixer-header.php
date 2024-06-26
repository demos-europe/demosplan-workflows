<?php

require_once __DIR__.'/vendor/autoload.php';

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'cache',
        'lib',
        'node_modules',
        'services',
        'var',
        'vendor',
    ]);

$config = new PhpCsFixer\Config();

$header = <<<HEADER
This file is part of the package demosplan.

(c) 2010-present DEMOS plan GmbH, for more information see the license file.

All rights reserved
HEADER;

$config
    ->setRules(
        [
            'header_comment' => [
                'header'       => $header,
                'comment_type' => 'PHPDoc',
                'location'     => 'after_declare_strict',
            ],
            'phpdoc_to_comment' => [
                'ignored_tags'  => [
                    'var',
                ]
            ],
        ]
    )
    ->setCacheFile('.php-cs-fixer-header.cache')
    ->setFinder($finder);

return $config;

