<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Artist[]|\Cake\Collection\CollectionInterface $artists
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
<div class="artists index large-9 medium-8 columns content">
    <h3><?= __('Artists') ?></h3>
    <li><?= $this->Html->link(__('Ajouter artiste'), ['action' => 'add']) ?></li>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist): ?>
            <tr>
                <td><?= $this->Number->format($artist->id) ?></td>
                <td><?= h($artist->first_name) ?></td>
                <td><?= h($artist->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $artist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?>
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
