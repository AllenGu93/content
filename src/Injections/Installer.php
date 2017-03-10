<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-10 14:12
 */
namespace Notadd\Content\Injections;

use Notadd\Foundation\Module\Abstracts\Installer as AbstractInstaller;

/**
 * Class Installer.
 */
class Installer extends AbstractInstaller
{

    /**
     * @return bool
     */
    public function handle()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function require ()
    {
        return true;
    }
}
