<?php

namespace Sf4\SecurityBundle\Command;

class UninstallCommand extends AbstractSecurityInstallUninstallCommand
{

    /**
     * Execute command
     */
    public function executeCommand()
    {
        $this->removeRouteConfig();
        $this->removeFrameworkConfig();
        $this->removeSecurityConfig();
    }
}
