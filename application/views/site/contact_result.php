<div class="container">
    <div class="row">
        <?=heading($title);?>
   </div> 
    <div class="row alert alert-sucess" role="alert">
       <?= $result_message ?>
    </div>
    <div class="row text-center">
        <?=anchor("index","fermer",['class'=> "btn btn-primary"]);?>
    </div>
</div>

