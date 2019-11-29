<?php
/**
 * Class Live2WidgetServiceProvider.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace Live2dWidget\Widget;

use Concrete\Core\Foundation\Service\Provider;

class Live2dWidgetServiceProvider extends Provider
{
    public function register()
    {
        $this->app->singleton('widget/live2d', Live2dWidget::class);
    }
}
