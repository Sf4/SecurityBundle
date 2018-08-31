<?php
/**
 * Created by PhpStorm.
 * Date: 27.07.18
 * Time: 15:52
 */

namespace Sf4\SecurityBundle\Command\Traits;


use Sf4\BaseBundle\Command\Helpers\ConfigManager;
use Symfony\Component\Console\Style\OutputStyle;

trait ManageSecurityConfig
{
    use \Sf4\SecurityBundle\Command\Traits\ConfigManager;

    /**
     * @return OutputStyle
     */
    abstract public function getOutputStyle(): OutputStyle;

    /**
     * Add config value
     * @param string $configName
     * @param string $key
     * @param mixed $value
     * @throws \Exception
     */
    abstract public function addConfigValue(string $configName, string $key, $value);

    /**
     * Remove config value
     * @param string $configName
     * @param string $key
     * @throws \Exception
     */
    abstract public function removeConfigValue(string $configName, string $key);

    /**
     * Add security config
     */
    public function addSecurityConfig()
    {
        $this->editSecurityConfig(function ($key, $value) {
            $this->addConfigValue(ConfigManager::CONFIG_SECURITY, $key, $value);
        });
    }

    /**
     * Remove security config
     */
    public function removeSecurityConfig()
    {
        $this->editSecurityConfig(function ($key, $value) {
            $this->removeConfigValue(ConfigManager::CONFIG_SECURITY, $key);
        });
    }

    /**
     * Edit security config
     * @param \Closure $closure
     */
    protected function editSecurityConfig(\Closure $closure)
    {
        $config = [
            'security.providers.your_db_provider.entity.class' => 'Sf4\SecurityBundle\Entity\User',
            'security.providers.your_db_provider.entity.property' => 'apiKey',

            'security.firewalls.main.anonymous' => true,
            'security.firewalls.main.logout' => true,
            'security.firewalls.main.guard.authenticators' => ['Sf4\SecurityBundle\Security\TokenAuthenticator'],

            'security.firewalls.dev.pattern' => '^/(_(profiler|wdt)|css|images|js)/',
            'security.firewalls.dev.security' => false,

            'security.access_control' => [
                [
                    'path' => '^/security',
                    'roles' => 'ROLE_API'
                ]
            ]
        ];

        $this->editConfig($config, $closure);
    }
}
