 <h2 class="title text-center"><?php echo $categoryName ?></h2>
         <ul>
             <?php foreach ($categoryNews as $NewsList): ?>
                 <li><a href="/news/<?php echo $NewsList['id_news'] ?>"><?php echo  $NewsList['title'] ?></a></li>
             <?php endforeach;?>
         </ul>
 <!-- Постраничная навигация -->
 <?php echo $pagination->get(); ?>

