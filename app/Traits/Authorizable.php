<?php
namespace App\Traits;

trait Authorizable
{
    private $authorize = false;
    private $abilities = [
        'index' => 'list',
        'edit' => 'edit',
        'show' => 'show',
        'update' => 'edit',
        'create' => 'create',
        'store' => 'create',
        'destroy' => 'delete'
    ];

    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        if(isset($this->abilities[$method]) && $this->authorize != false){
            $ability = $this->abilities[$method].'_'.$this->authorize;
            $this->authorize($ability);
        }

        return parent::callAction($method, $parameters);
    }

}
