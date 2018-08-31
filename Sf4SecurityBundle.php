<?php
/**
 * Created by PhpStorm.
 * Date: 13.07.18
 * Time: 15:26
 */

namespace Sf4\SecurityBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\ServiceRepositoryCompilerPass;
use Sf4\SecurityBundle\Repository\UserRepository;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class Sf4SecurityBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->autowire(UserRepository::class)
            ->addTag( ServiceRepositoryCompilerPass::REPOSITORY_SERVICE_TAG);
    }
}
