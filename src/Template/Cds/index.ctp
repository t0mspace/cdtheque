<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $cds
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Gérer les Cds'), ['controller' => 'Cds','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les artistes'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les styles'), ['controller' => 'Styles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les collections'), ['controller' => 'Collections', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cds index large-9 medium-8 columns content">

    <h3><?= __('Cds') ?></h3>
    <li><?= $this->Html->link(__('Ajouter cd'), ['action' => 'add']) ?></li>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('compositor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interpreter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('style_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collection_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_cd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cd_url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cds as $cd): ?>
            <tr>
                <td><?= $this->Number->format($cd->id) ?></td>
                <td><?= $cd->has('compositor') ? $this->Html->link($cd->compositor->id, ['controller' => 'Artists', 'action' => 'view', $cd->compositor->id]) : '' ?></td>
                <td><?= $cd->has('interpreter') ? $this->Html->link($cd->interpreter->id, ['controller' => 'Artists', 'action' => 'view', $cd->interpreter->id]) : '' ?></td>
                <td><?= $this->Number->format($cd->style_id) ?></td>
                <td><?= $this->Number->format($cd->collection_id) ?></td>
                <td><?= $this->Number->format($cd->nbr_cd) ?></td>
                <td><?= h($cd->cd_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cd->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cd->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cd->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
