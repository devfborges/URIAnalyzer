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
    $arrFileName = scandir($source);
    array_splice($arrFileName, 0, 2);
    return $arrFileName;
  } else {
    throw new Exception('ERRO: Arquivo informado não foi encontrado.');
  }
}

function getContentFile($source) 
{
  try {
      $source = getFileName($source);
      if (gettype($source) === 'string') {
          return file_get_contents($source);
      } else {
          // Implementar função para percorrer arquivos da pasta e pegar os conteudos
      }

  } catch (Exception $error) {
    return $error->getMessage() . PHP_EOL;
  }
}

function extractLinks($contentFile) {

}

echo getContentFile($srcFile) . PHP_EOL;