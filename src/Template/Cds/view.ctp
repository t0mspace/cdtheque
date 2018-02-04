<?php
/**
  * @var \App\View\AppView $this
  * @var \Cake\Datasource\EntityInterface $cd
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cd'), ['action' => 'edit', $cd->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cd'), ['action' => 'delete', $cd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cd->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cd'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Compositor'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compositor'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cds view large-9 medium-8 columns content">
    <h3><?= h($cd->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Compositor') ?></th>
            <td><?= $cd->has('compositor') ? $this->Html->link($cd->compositor->id, ['controller' => 'Artists', 'action' => 'view', $cd->compositor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interpreter') ?></th>
            <td><?= $cd->has('interpreter') ? $this->Html->link($cd->interpreter->id, ['controller' => 'Artists', 'action' => 'view', $cd->interpreter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cd Url') ?></th>
            <td><?= h($cd->cd_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cd->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Style Id') ?></th>
            <td><?= $this->Number->format($cd->style_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection Id') ?></th>
            <td><?= $this->Number->format($cd->collection_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nbr Cd') ?></th>
            <td><?= $this->Number->format($cd->nbr_cd) ?></td>
        </tr>
    </table>
</div>
