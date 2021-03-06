<?php
namespace Task;

use Mage\Task\AbstractTask;

class Permissions extends AbstractTask
{
    public function getName()
    {
        return 'Fixing file permissions';
    }

    public function run()
    {
        $command = 'chown -R www-data /var/www/yuido/current/app/cache; chown -R www-data /var/www/yuido/current/app/logs';
        $result = $this->runCommandRemote($command);

        return $result;
    }
}