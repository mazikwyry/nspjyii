<?php $this->beginContent('//layouts/main'); ?>
    <div class="left">
         <?php $this->widget('application.components.Menu'); ?>
    </div>
    
    <div class="right">
        
        <article>
            <?php echo $content; ?>
        </article>
        
    </div>
<?php $this->endContent(); ?>