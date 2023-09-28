<?php

// TODO implementar captura de erro caso o usuário não passe o argumento necessário
$srcFile = $argv[1];

/**
 * @throws Exception
 */
function getFileName($source) : array|string
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

function getContentFile($source): array|string
{
  try {
      $fileName = getFileName($source);
      if (gettype($fileName) === 'array') {
          foreach ($fileName as $item) {
              $content[$item] = file_get_contents("$source/$item");
          }
          return $content;
      } else {
          return file_get_contents($fileName) .PHP_EOL;
      }

  } catch (Exception $error) {
    return $error->getMessage() . PHP_EOL;
  }
}

function extractLinks($contentFile): array
{
    preg_match_all('/https?:\/\/[^\s\/$.?#].\S*/', $contentFile, $links);
    return $links;
}

$result = getContentFile($srcFile);

if (gettype($result) === 'array') {
    foreach ($result as $fileName => $content) {
        $arr = extractLinks($content);
        echo $fileName . PHP_EOL;
        var_dump($arr);
    }
} else {
    $arr = extractLinks($result);
    var_dump($arr);
}
