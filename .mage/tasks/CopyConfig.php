<?php
namespace Task;

use Mage\Task\AbstractTask;

class CopyConfig extends AbstractTask
{
    public function getName()
    {
        return 'Copying configuration';
    }

    public function run()
    {
        $command = 'cp /root/yuidoadmin_config/parameters.yml /var/www/yuidoadmin/current/app/config/parameters.yml';
        $result = $this->runCommandRemote($command);

        return $result;
    }
}