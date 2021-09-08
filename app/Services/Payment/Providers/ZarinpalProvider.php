<?php

namespace App\Services\Payment\Providers;

use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\VerifaibleInterface;

class ZarinpalProvider implements PayableInterface, VerifaibleInterface
{
    public function pay()
    {

    }
    
    public function verify()
    {

    }
}