<?php

namespace Source\Models;

use Source\Core\Model;


class Request extends Model
{
    
    public function __construct()
    {
        parent::__construct("request_client", ["id"], ["auth", "service"]);
    }

    public function service(): ?Service
    {
        if ($this->service) {
            return (new Service())->findById($this->service);
        }
        return null;
    }
   
}