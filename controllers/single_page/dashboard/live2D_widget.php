<?php

/**
 * Class Widget.
 *
 * @author: Biplob Hossain <biplob@concrete5.co.jp>
 *
 * @license MIT
 */
namespace Concrete\Package\Live2dWidget\Controller\SinglePage\Dashboard;

use Concrete\Core\Page\Controller\DashboardPageController;
use Concrete\Core\Routing\RedirectResponse;

class Live2dWidget extends DashboardPageController
{
    public function view()
    {
        $config = $this->app->make('config');
        $this->set('enabled', $config->get('live2d_widget::settings.enabled'));
        $this->set('model_selected', $config->get('live2d_widget::settings.model_selected'));
        $models = $config->get('live2d_widget::settings.models');
        $models = array_map(static function ($model) {
            return t($model);
        }, $models);
        $this->set('models', $models);
    }

    public function save()
    {
        if (!$this->token->validate('save')) {
            $this->error->add($this->token->getErrorMessage());
        }

        if (!$this->error->has()) {
            $config = $this->app->make('config');
            $config->save('live2d_widget::settings.enabled', (bool) $this->request('enabled'));
            $config->save('live2d_widget::settings.model_selected', $this->request('model_selected'));
            $this->flash('message', t('Saved successfully.'));

            return RedirectResponse::create($this->action('view'));
        }

        $this->set('error', $this->error);

        return $this->view();
    }
}
