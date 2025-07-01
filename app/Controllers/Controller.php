<?php
namespace App\Controllers;
class Controller
{
    protected function setOutPut($page)
    {
        if (isset($_SERVER['HTTP_X_INERTIA'])) {
            if (ob_get_length())
                ob_clean();
            header('Content-Type: application/json');
            header('X-Inertia: true');
            if (!empty($_SERVER['HTTP_X_INERTIA_VERSION'])) {
                header('X-Inertia-Version: ' . $_SERVER['HTTP_X_INERTIA_VERSION']);
            }
            echo json_encode($page, JSON_UNESCAPED_UNICODE);
            exit;
        }


        $jsonPage = json_encode($page, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
        $html = file_get_contents(__DIR__ . '/../../build/index.html');
        $html = str_replace('{{INERTIA_PAGE}}', $jsonPage, $html);
        echo $html;
    }
}