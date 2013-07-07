<div class="one_comment">
    <?php echo $data->content; ?>
    <br/>
    <span class="author_date"><?php echo $data->author; ?>, <?php echo substr($data->date_added, 8 ,2)."/".substr($data->date_added, 5 ,2)."/".substr($data->date_added, 0 ,4); ?></span>
</div>