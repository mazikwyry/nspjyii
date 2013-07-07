<?php $this->beginContent('//layouts/main'); ?>
    <div class="left">
         <?php $this->widget('application.components.Menu'); ?>
    </div>
    
    <div class="right">
        
        <?php echo $content; ?>
    
    
    </div>
<?php $this->endContent(); ?>