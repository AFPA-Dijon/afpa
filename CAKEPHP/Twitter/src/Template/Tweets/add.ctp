<div class="tweets form large-9 medium-8 columns content">
    <?= $this->Form->create($tweet) ?>
    <fieldset>
        <legend><?= __('Add Tweet') ?></legend>
        <?php
            echo $this->Form->input('content');
            echo $this->Form->input('formatted_content');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('hashtags._ids', ['options' => $hashtags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
