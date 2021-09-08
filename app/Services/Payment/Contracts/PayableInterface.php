<?php


namespace App\Services\Payment\Contracts;

interface PayableInterface
{
    public function pay();
}