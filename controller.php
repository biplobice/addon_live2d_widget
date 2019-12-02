<?php
/**
 * concrete5 - Controller.php
 * Author: biplob.
 */
namespace Concrete\Package\Live2dWidget;

use Concrete\Core\Asset\AssetList;
use Concrete\Core\Foundation\Service\ProviderList;
use Concrete\Core\Package\Package;
use Live2dWidget\Widget\Live2dWidgetServiceProvider;

class Controller extends Package
{
    protected $pkgHandle = 'live2d_widget';
    protected $appVersionRequired = '8.0.1';
    protected $pkgVersion = '0.0.2';

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

    public function install()
    {
        parent::install();
        $this->installContentFile('config/install.xml');
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile('config/install.xml');
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
        $config = $this->app->make('config');
        if ($config->get('live2d_widget::settings.enabled')) {
            $director = $this->app->make('director');
            if (is_object($director)) {
                $widget = $this->app->make('widget/live2d');
                $director->addListener('on_before_render', [$widget, 'insert']);
            }
        }
    }
}
