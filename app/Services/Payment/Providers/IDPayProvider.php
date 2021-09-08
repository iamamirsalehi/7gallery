<?php

namespace App\Services\Payment\Providers;

use App\Services\Payment\Contracts\AbstractProviderInterface;
use App\Services\Payment\Contracts\PayableInterface;
use App\Services\Payment\Contracts\VerifaibleInterface;

class IDPayProvider extends AbstractProviderInterface implements PayableInterface, VerifaibleInterface
{
    
    public function pay()
    {

    }
    
    public function verify()
    {

    }
}