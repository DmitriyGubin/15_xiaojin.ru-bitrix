<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/services/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/services/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/products/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/products/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),

    3 =>
        array (
            'CONDITION' => '#^/catalog/([a-zA-Z0-9,.()_-]+)/([a-zA-Z0-9,.()_-]+)/#',
            'RULE' => 'code=$2&$3',
            'ID' => 'bitrix:news',
            'PATH' => '/catalog/detail.php',
            'SORT' => 100,
        ),
  4 =>
        array (
            'CONDITION' => '#^/catalog/([a-zA-Z0-9,.()_-]+)/#',
            'RULE' => 'sec=$1&$2',
            'ID' => 'bitrix:catalog',
            'PATH' => '/catalog/index.php',
            'SORT' => 100,
        ),

);
