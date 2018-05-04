<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <?= heading($title)?>
                    <p>
                        <small>
                            <?= nice_date($this->article->date, 'd/m/y'); ?>
                            -
                            <?= $this->article->author ?>
                            <?php if ($this->auth_user->is_connected): ?>
                            -
                            <?= $this->article_status->label[$this->article->status]; ?>
                            <?php endif; ?>
                        </small>
                    </p>
                    <hr/>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <?= nl2br(htmlentities($this->article->content)) ?>
                </div>
            </div>
         </div>
        
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <?= anchor('blog/index', "Liste des articles");?>
                </li>
                <li>
                    <?=anchor(['blog','editer',$this->article->id],"Modifier l'article");?>
                </li>
                <li>
                    <?=anchor ('blog/editer',"Nouvel article");?>
                </li>
            </ul>
        </div>
    </div>
</div> 


