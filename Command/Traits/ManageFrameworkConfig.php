<?php
/**
 * Created by PhpStorm.
 * Date: 27.07.18
 * Time: 15:17
 */

namespace Sf4\SecurityBundle\Command\Traits;

use Sf4\BaseBundle\Command\Helpers\ConfigManager;
use Symfony\Component\Console\Style\OutputStyle;

trait ManageFrameworkConfig
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
     * Add framework config
     */
    public function addFrameworkConfig()
    {
        $this->editFrameworkConfig(function ($key, $value) {
            $this->addConfigValue(ConfigManager::CONFIG_FRAMEWORK, $key, $value);
        });
    }

    /**
     * Remove framework config
     */
    public function removeFrameworkConfig()
    {
        $this->editFrameworkConfig(function ($key, $value) {
            $this->removeConfigValue(ConfigManager::CONFIG_FRAMEWORK, $key);
        });
    }

    /**
     * Edit framework config
     * @param \Closure $closure
     */
    protected function editFrameworkConfig(\Closure $closure)
    {
        $config = [
            'framework.default_locale' => 'en',
            'framework.csrf_protection' => true
        ];

        $this->editConfig($config, $closure);
    }
}
