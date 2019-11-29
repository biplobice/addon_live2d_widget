<?php
/**
 * concrete5 - Controller.php
 * Author: biplob
 * Date: 2018/04/17.
 */
namespace Concrete\Package\Live2dWidget;

use Live2dWidget\Widget\Live2dWidgetServiceProvider;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Foundation\Service\ProviderList;
use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected $pkgHandle = 'live2d_widget';
    protected $appVersionRequired = '8.0.1';
    protected $pkgVersion = '0.0.1';

    protected $pkgAutoloaderRegistries = [
        'src/Concrete' => '\Live2dWidget',
    ];

    public function getPackageDescription()
    {
        return t('Live2D on webpages with out-of-the-box experience.');
    }

    public function getPackageName()
    {
        return t('Live2d Widget');
    }

    public function on_start(): void
    {
        $this->registerAssets();
        $this->registerProviders();
        $this->addListeners();
    }

    protected function registerAssets(): void
    {
        $al = AssetList::getInstance();
        $al->register('javascript', 'live2dwidget', 'js/live2d-widget/L2Dwidget.min.js', [], $this);
    }

    protected function registerProviders(): void
    {
        if ($this->getPackageEntity()->isPackageInstalled()) {
            $providerList = $this->app->make(ProviderList::class);
            $providerList->registerProvider(Live2dWidgetServiceProvider::class);
        }
    }

    protected function addListeners(): void
    {
        $director = $this->app->make('director');
        if (is_object($director)) {
            $widget = $this->app->make('widget/live2d');
            $director->addListener('on_before_render', [$widget, 'insert']);
        }
    }
}
