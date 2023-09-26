<?php

$srcFile = $argv[1];

/**
 * @throws Exception
 */
function getFileName($source) 
{
  if (is_file($source)) {
    return $source;
  } elseif (is_dir($source)) {
    // algoritmo para retornar um array com o nome dos arquivos da pasta
  } else {
    throw new Exception('ERRO: Arquivo informado não encontrado.');
  }
}

function getContentFile($source) 
{
  try {
    $source = getFileName($source);
    $content = file_get_contents($source);
    return $content;
  } catch (Exception $error) {
    return $error->getMessage() . PHP_EOL;
  }
}

function extractLinks($contentFile) {

}

echo getFileName($srcFile) . PHP_EOL;