<div class="container">
    <div class="row">
        <?= heading($title); ?>
    </div>
    <div class="row">
        <?= form_open('contact', ['class' => 'form-horizontal']); ?>
        <div class="form-group">
            <?= form_label("votre nom : ", "name", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10">
                <?= form_input(['name' => "name", 'id' => "name", 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("votre email : ", "email", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10">
                <?= form_input(['name' => "email", 'id' => "email", 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("titre : ", "title", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10">
                <?= form_input(['name' => "title", 'id' => "title", 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("votre message : ", "message", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10">
                <?= form_textarea(['name' => "message", 'id' => "message", 'class' => 'form-control']) ?>
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