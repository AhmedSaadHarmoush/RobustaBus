<?php


namespace App\ViewModels;


use App\Models\Route;
use App\Models\RouteStop;

class InitRouteInput extends \Spatie\ViewModels\ViewModel
{
    public $route;
    public $stops;

    public function __construct(Route $route, array $stops)
    {
        $this->route = $route;
        $this->stops = $stops;
    }
    public function validateInit(){

        count($this->stops)>2?true:false;
    }
}
