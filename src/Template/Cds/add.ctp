<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Gérer les Cds'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les artistes'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les styles'), ['controller' => 'Styles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gérer les collections'), ['controller' => 'Collections', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cds form large-9 medium-8 columns content">
    <?= $this->Form->create($cd) ?>
    <fieldset>
        <legend><?= __('Add Cd') ?></legend>
        <?php
            echo $this->Form->control('compositor_id', ['options' => $compositor]);
            echo $this->Form->control('interpreter_id', ['options' => $interpreter]);
            echo $this->Form->control('style_id', ['options' => $style]);
		    echo $this->Form->control('collection_id', ['options' => $collection]);
            echo $this->Form->control('nbr_cd');
            echo $this->Form->control('cd_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
