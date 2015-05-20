<section class="sec">
<?php
echo '<a href="?view=news"><h3><<<Назад</h3></a>';
foreach($name_cat as $row)
        {  
        ?>
    <section>   
         <?php
           echo $row->name();
           echo $row->img();
           echo $row->content();
           ?> 
    </section>
         <?php
           }
      


   ?>
   </section>
<section class="comment">
    <header class="section_header">
            Оставить комментарий        
    </header>
    <div class="comment_form">
        <form action="/comments_ajx/addcomment" id="comment_form">
        <textarea id="textarea_comments" name="body" data-max-chars="2500" limit="2500" data-original-title="Осталось символов  2478"></textarea>
        <br>
        </form>
    </div>
    <header class="section_header">
                <i></i>Комментарии (
                
                <?php
                 echo count($comments);
                ?>
                )
            </header>
    <?php
        foreach($comments as $row)
        {  
        ?>
    <section>
        <div class="commen">
        <div class="author_info">
            <div class="author_name">
                <?php
           echo $row->name();
           ?>           
            </div>
            <div class="vertical_line">
                |
            </div>
            <div class="author_date">
	            <?php
           echo date("Y-m-d H:i:s", $row->datatime());
           ?>             </div>
         
        </div>
        <div class="comment_text">
        <div class="comment_border_margin">
            <?php
           echo $row->comment();
           ?>      </div>
    </div>
    </div>
    </section>
         <?php
           }
    ?>
</section>
