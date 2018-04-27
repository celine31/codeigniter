<div class="container">
    <div class="row">
        <?= heading($title); ?>
    </div>
    <div class="row">
        <?= form_open('connexion', ['class' => 'form-horizontal']); ?>
        <div class="form-group">
            <?= form_label("Nom d'utilisateur ", "username", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('username')) ? '' : 'has-error' ?>">
                <?= form_input(['name' => "username", 'id' => "username", 'class' => 'form-control'], set_value('username')) ?>
                <span class="help-block"><?= form_error('username'); ?> </span>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("Mot de passe : ", "password", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('password')) ? '' : 'has-error' ?>">
                <?= form_input(['name' => "password", 'id' => "password", 'class' => 'form-control'], set_value('password')) ?>
                <span class="help-block"><?= form_error('password'); ?> </span> 
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <?= form_submit("send", "envoyer", ['class' => "btn btn-default"]) ?>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

