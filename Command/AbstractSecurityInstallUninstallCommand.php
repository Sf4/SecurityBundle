<?php
/**
 * Created by PhpStorm.
 * Date: 27.07.18
 * Time: 13:14
 */

namespace Sf4\SecurityBundle\Command;

use Sf4\PublicBundle\Command\AbstractPublicInstallUninstallCommand;
use Sf4\SecurityBundle\Command\Traits\ManageFrameworkConfig;
use Sf4\SecurityBundle\Command\Traits\ManageSecurityConfig;

abstract class AbstractSecurityInstallUninstallCommand extends AbstractPublicInstallUninstallCommand
{
    use ManageFrameworkConfig,
        ManageSecurityConfig;
}