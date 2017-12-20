<?php

/**
 * Created by PhpStorm.
 * User: lopereira2
 * Date: 22/11/17
 * Time: 17:27
 */
class Flux
{
    private $nom;
    private $url;

    /**
     * Flux constructor.
     * @param $nom
     * @param $url
     */
    public function __construct(string $nom, string $url)
    {

        $this->nom = $nom;
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getNom():string
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getUrl():string
    {
        return $this->url;
    }
}