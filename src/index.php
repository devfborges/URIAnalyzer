<?php

$srcFile = $argv[1];

function verifyFile($source) 
{
  if (is_file($source)) {
    return $source;
  } else {
    throw new Exception('ERRO: Arquivo informado não encontrado.');
  }
}

function getFile($source) 
{
  try {
    $source = verifyFile($source);
    $content = file_get_contents($source);
    return $content;
  } catch (Exception $error) {
    return $error->getMessage() . PHP_EOL;
  }
}

function extractLinks($contentFile) {

}

echo getFile($srcFile) . PHP_EOL;