<?php
/**
 * Created by PhpStorm.
 * User: Javier_T
 * Date: 5/4/2018
 * Time: 9:46 PM
 */

namespace app;


use Doctrine\ORM\EntityManager;

class AbstractResource
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractResource constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}