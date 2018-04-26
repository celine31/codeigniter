<div class="container">
    <div class="row">
        <?= heading($title); ?>
    </div>
    <div class="row">
        <?= form_open('site/contact', ['class' => 'form-horizontal']); ?>
        <div class="form-group">
            <?= form_label("votre nom : ", "name", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('name'))?'':'has-error' ?>">
                <?= form_input(['name' => "name", 'id' => "name", 'class' => 'form-control'],set_value('name')) ?>
                <span class="help-block"><?= form_error('name');?> </span>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("votre email : ", "email", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('email'))?'':'has-error' ?>">
                <?= form_input(['name' => "email", 'id' => "email", 'class' => 'form-control'], set_value('email')) ?>
                <span class="help-block"><?= form_error('email');?> </span> 
            </div>
        </div>
        <div class="form-group">
            <?= form_label("confirmer votre email : ", "confEmail", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('email'))?'':'has-error' ?>">
                <?= form_input(['name' => "confEmail", 'id' => "confEmail", 'class' => 'form-control'], set_value('confEmail')) ?>
                <span class="help-block"><?= form_error('confEmail');?> </span> 
            </div>
        </div>
        <div class="form-group">
            <?= form_label("titre : ", "title", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('title'))?'':'has-error' ?>">
                <?= form_input(['name' => "title", 'id' => "title", 'class' => 'form-control'],set_value('title')) ?>
                 <span class="help-block"><?= form_error('title');?> </span> 
            </div>
        </div>
        <div class="form-group">
            <?= form_label("votre message : ", "message", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10">
                <?= form_textarea(['name' => "message", 'id' => "message", 'class' => 'form-control'],set_value('message')) ?>
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