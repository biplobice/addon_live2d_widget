<?php
/**
 * Class Live2dWidget.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace Live2dWidget\Widget;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\View\View;
use Symfony\Component\EventDispatcher\GenericEvent;

class Live2dWidget implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    public function insert(GenericEvent $event): void
    {
        /** @var View $view */
        $view = $event->getArgument('view');
        $view->addFooterItem($this->generateScript());
    }

    private function generateScript(): string
    {
        $config = $this->app->make('config');
        $model = $config->get('live2d_widget::settings.model_selected');

        return <<<EOT
<script type="text/javascript" src="/packages/live2d_widget/js/live2d-widget/L2Dwidget.min.js"></script>
<script type="text/javascript">
    var config = {
        model: {
            jsonPath: '/packages/live2d_widget/assets/live2d_models/{$model}/{$model}.model.json',
        }
    };
    L2Dwidget.init(config);
</script>
EOT;
    }
}
