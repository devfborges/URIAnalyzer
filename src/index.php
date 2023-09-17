<?php

$srcFile = $argv[1];

function getFile($src) {
  if($src) {
    $content = file("$src");
  } else {
    echo "Erro: Arquivo passado não encontrado";
  }

  return $content;
}