<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Artist $artist
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cds Compositor'), ['controller' => 'Cds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cds Compositor'), ['controller' => 'Cds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artists view large-9 medium-8 columns content">
    <h3><?= h($artist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($artist->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($artist->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($artist->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cds') ?></h4>
        <?php if (!empty($artist->cds_compositor)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Compositor Id') ?></th>
                <th scope="col"><?= __('Interpreter Id') ?></th>
                <th scope="col"><?= __('Style Id') ?></th>
                <th scope="col"><?= __('Collection Id') ?></th>
                <th scope="col"><?= __('Nbr Cd') ?></th>
                <th scope="col"><?= __('Cd Url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->cds_compositor as $cdsCompositor): ?>
            <tr>
                <td><?= h($cdsCompositor->id) ?></td>
                <td><?= h($cdsCompositor->compositor_id) ?></td>
                <td><?= h($cdsCompositor->interpreter_id) ?></td>
                <td><?= h($cdsCompositor->style_id) ?></td>
                <td><?= h($cdsCompositor->collection_id) ?></td>
                <td><?= h($cdsCompositor->nbr_cd) ?></td>
                <td><?= h($cdsCompositor->cd_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cds', 'action' => 'view', $cdsCompositor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cds', 'action' => 'edit', $cdsCompositor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cds', 'action' => 'delete', $cdsCompositor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdsCompositor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cds') ?></h4>
        <?php if (!empty($artist->cds_interpreter)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Compositor Id') ?></th>
                <th scope="col"><?= __('Interpreter Id') ?></th>
                <th scope="col"><?= __('Style Id') ?></th>
                <th scope="col"><?= __('Collection Id') ?></th>
                <th scope="col"><?= __('Nbr Cd') ?></th>
                <th scope="col"><?= __('Cd Url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->cds_interpreter as $cdsInterpreter): ?>
            <tr>
                <td><?= h($cdsInterpreter->id) ?></td>
                <td><?= h($cdsInterpreter->compositor_id) ?></td>
                <td><?= h($cdsInterpreter->interpreter_id) ?></td>
                <td><?= h($cdsInterpreter->style_id) ?></td>
                <td><?= h($cdsInterpreter->collection_id) ?></td>
                <td><?= h($cdsInterpreter->nbr_cd) ?></td>
                <td><?= h($cdsInterpreter->cd_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cds', 'action' => 'view', $cdsInterpreter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cds', 'action' => 'edit', $cdsInterpreter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cds', 'action' => 'delete', $cdsInterpreter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdsInterpreter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
