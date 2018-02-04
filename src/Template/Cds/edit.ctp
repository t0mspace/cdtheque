<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cd->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cd->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Compositor'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compositor'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cds form large-9 medium-8 columns content">
    <?= $this->Form->create($cd) ?>
    <fieldset>
        <legend><?= __('Edit Cd') ?></legend>
        <?php
            echo $this->Form->control('compositor_id', ['options' => $compositor]);
            echo $this->Form->control('interpreter_id', ['options' => $interpreter]);
            echo $this->Form->control('style_id');
            echo $this->Form->control('collection_id');
            echo $this->Form->control('nbr_cd');
            echo $this->Form->control('cd_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
