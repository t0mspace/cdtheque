<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Collection $collection
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collection'), ['action' => 'edit', $collection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collection'), ['action' => 'delete', $collection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cds'), ['controller' => 'Cds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cd'), ['controller' => 'Cds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collections view large-9 medium-8 columns content">
    <h3><?= h($collection->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($collection->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($collection->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cds') ?></h4>
        <?php if (!empty($collection->cds)): ?>
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
            <?php foreach ($collection->cds as $cds): ?>
            <tr>
                <td><?= h($cds->id) ?></td>
                <td><?= h($cds->compositor_id) ?></td>
                <td><?= h($cds->interpreter_id) ?></td>
                <td><?= h($cds->style_id) ?></td>
                <td><?= h($cds->collection_id) ?></td>
                <td><?= h($cds->nbr_cd) ?></td>
                <td><?= h($cds->cd_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cds', 'action' => 'view', $cds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cds', 'action' => 'edit', $cds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cds', 'action' => 'delete', $cds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
