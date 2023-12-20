<?php

declare(strict_types=1);

namespace Modules\Shop\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class ShopServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'shop'; // lower del nome
}
