<?php

namespace App\Services\Payment\Contracts;

abstract class AbstractProviderInterface
{
    public function __construct(protected RequestInterface $request)
    {
        
    }
}