<?php

namespace Jez433\ClankBundle\Twig;

class ClankExtension extends \Twig_Extension
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getName()
    {
        return "clank";
    }

    public function getFunctions()
    {
        return array(
            "clank_client" => new \Twig_Function_Method($this, 'clientOutput', array('is_safe' => array('html')))
        );
    }

    public function clientOutput()
    {
        return $this->container->get("templating")->render("Jez433ClankBundle::client.html.twig");
    }
}