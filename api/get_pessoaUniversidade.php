<?php
include __DIR__ . '/../control/Pessoa_UniversidadeControl.php';
$pessoa_universidadeControl = new Pessoa_UniversidadeControl();

header('Content-type: application/json');

if (!isset($args[1])) {
    $result = $pessoa_universidadeControl->find();
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
} else {
    $result = $pessoa_universidadeControl->find($args[1]);
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
}
