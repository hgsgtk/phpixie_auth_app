<?php

namespace Project\App;

/**
 * Here you can define wrappers for the ORM to use.
 */
class ORM extends \PHPixie\DefaultBundle\ORM
{
    protected $entityMap = array(
        /*entityGeneratorPlaceholder*/
        'user' => 'Project\App\ORM\User'
    );

    protected $repositoryMap = array(
        /*repositoryGeneratorPlaceholder*/
        'user' => 'Project\App\ORM\User\UserRepository'
    );

    protected $query = array(
        /*queryGeneratorPlaceholder*/
    );
}