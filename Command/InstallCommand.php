<?php

namespace Sf4\SecurityBundle\Command;

class InstallCommand extends AbstractSecurityInstallUninstallCommand
{

    /**
     * Execute command
     */
    public function executeCommand()
    {
        $this->addRouteConfig();
        $this->addFrameworkConfig();
        $this->addSecurityConfig();
    }

}
