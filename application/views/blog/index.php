<div class="container">
    <div class="row">
        <?= heading($title) ?>
        <br/>
    </div>
    <div class="row"        
         <div class="col-md-12">
            <p class="text-left">Nombre d'articles: <?= $this->articles->num_items ?></p>
        </div>

        <div class="row">
            <?php if ($this->articles->has_item): ?>
                <?php
                foreach ($this->articles->items as $article) {
                    $this->load->view('blog/article_resume', $article);
                }
                ?>
            <?php else: ?>
                <div class="col-md-12">
                    <p class="alert alert-warning" role="alert">  
                        Il n'y a pas encore d'articles. 
                    </p>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-10">
                    <ul class="nav nav-pills nav-justified">
                        <li role="presentation">
                            <?= anchor('blog/edition',"Nouvel article");?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>