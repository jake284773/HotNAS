<?php if($this->session->flashdata('message')) : ?>
    <p><?=$this->session->flashdata('message')?></p>
<?php endif; ?>

<?=form_open('login/index')?>
    <?=form_fieldset('Login Form')?>

        <div class="textfield">
            <?=form_label('username', 'username')?>
            <?=form_error('username')?>
            <?=form_input('username')?>
        </div>

        <div class="textfield">
            <?=form_label('password', 'password')?>
            <?=form_error('password')?>
            <?=form_password('password')?>
        </div>

        <div class="buttons">
            <?=form_submit('login', 'Login')?>
        </div>

    <?=form_fieldset_close()?>
<?=form_close();?>
