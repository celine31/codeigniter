<div class="container">
    <div class="row">
        <?= heading($title); ?>
    </div>
    <div class="row">
        <?= form_open('blog/nouvel_article', ['class' => 'form-horizontal']); ?>
        <div class="form-group">
            <?= form_label("titre : ", "title", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('title'))?'':'has-error' ?>">
                <?= form_input(['name' => "title", 'id' => "title", 'class' => 'form-control'],set_value('title')) ?>
                <span class="help-block"><?= form_error('title');?> </span>
            </div>
        </div>
        <div class="form-group">
            <?= form_label("Texte : ", "content", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('content'))?'':'has-error' ?>">
                <?= form_textarea(['name' => "content", 'id' => "content", 'class' => 'form-control'], set_value('content')) ?>
                <span class="help-block"><?= form_error('content');?> </span> 
            </div>
        </div>
        <div class="form-group">
            <?= form_label("statut : ", "status", ['class' => "col-md-2 control-label"]) ?>
            <div class="col-md-10 <?= empty(form_error('status'))?'':'has-error' ?>">
                <?= form_dropdown("status",$this->article_status->text,set_value('status'),['id' => "status", 'class' => 'form-control']) ?>
                <span class="help-block"><?= form_error('status');?> </span> 
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

