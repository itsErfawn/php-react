<?php
namespace App\Controllers;
require __DIR__."/Controller.php";
class HomeController extends Controller
{
    public function index()
    {
        $page = [
            'component' => 'Home',
            'props' => [
                'message' => 'سلام از کنترلر PHP + MVC',
                'data'=>[
                    "react","vite","inertia","php"
                ]
            ],
            'url' => $_SERVER['REQUEST_URI'],
            'version' => '1',
        ];
        $this->setOutPut($page);
    }
}
