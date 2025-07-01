<?php
namespace App\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $page = [
            'component' => 'About',
            'props' => [
                'info' => 'صفحه درباره ما',
            ],
            'url' => $_SERVER['REQUEST_URI'],
            'version' => '1',
        ];
        $this->setOutPut($page);
    }
}
