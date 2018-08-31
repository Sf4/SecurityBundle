<?php
/**
 * Created by PhpStorm.
 * User: siim
 * Date: 31.08.18
 * Time: 15:01
 */

namespace Sf4\SecurityBundle\Command\Traits;


trait ConfigManager
{
    /**
     * @param array $config
     * @param \Closure $closure
     */
    protected function editConfig(array $config, \Closure $closure)
    {
        foreach($config as $key => $value) {
            try {
                $closure($key, $value);
            } catch (\Exception $e) {
                $this->getOutputStyle()->error($e->getMessage());
            }
        }
    }
}
