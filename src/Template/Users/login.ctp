<?php echo $this->Form->create($user, ['action' => 'login']) ?>

<?php echo $this->Form->input('username') ?>
<?php echo $this->Form->input('password') ?>


<?php echo $this->Form->button('Login') ?>
<?php echo $this->Form->end() ?>