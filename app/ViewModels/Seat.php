<?php


namespace App\ViewModels;


class Seat
{
    public $number;
    public $available;
    public function __construct($number,$available)
    {
        $this->$number = $number;
        $this->available = $available;
    }
    public static function buildBus(){
        return [1=>true,2=>true,3=>true,4=>true,5=>true,6=>true,7=>true,8=>true,9=>true,10=>true,11=>true,12=>true];
    }
}