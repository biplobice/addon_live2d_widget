<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<div>
    <form method="post" action="<?= $view->action('save'); ?>">
        <?= $this->controller->token->output('save'); ?>
        <fieldset>
            <div class="checkbox">
                <label>
                    <?= $form->checkbox('enabled', true, $enabled); ?>
                    <?= t('Enable Widget'); ?>
                </label>
            </div>

            <div class="form-group">
                <?= $form->label('model_selected', t('Choose Model')); ?>
                <?= $form->select('model_selected', $models, $model_selected); ?>
                <p class="help-block"><?=t('See the models\' demo <a href="%s">here</a>.', 'https://huaji8.top/post/live2d-plugin-2.0/')?></p>
            </div>
        </fieldset>

        <div class="ccm-dashboard-form-actions-wrapper">
            <div class="ccm-dashboard-form-actions">
                <button class="pull-right btn btn-primary" type="submit" ><?=t('Save'); ?></button>
            </div>
        </div>
    </form>
</div>