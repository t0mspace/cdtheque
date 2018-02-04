<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Collection[]|\Cake\Collection\CollectionInterface $collections
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
<div class="collections index large-9 medium-8 columns content">
    <h3><?= __('Collections') ?></h3>
    <li><?= $this->Html->link(__('Ajouter collection'), ['action' => 'add']) ?></li>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collections as $collection): ?>
            <tr>
                <td><?= $this->Number->format($collection->id) ?></td>
                <td><?= h($collection->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $collection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $collection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $collection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collection->id)]) ?>
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
