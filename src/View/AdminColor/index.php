<br>
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li class="active">Управление цветом</li>
    </ol>
</div>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="color_bg">Head</label>
        <input type="color" id="color_head" name="head" value="<?php echo $color['head'];?>" class="form-control"/>
    </div>
    <input type="submit" value="Ok" class="btn btn-success"/>
</form>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="color_bg">Body</label>
        <input type="color" id="color_head" name="body" value="<?php echo $color['body'];?>" class="form-control"/>
    </div>
    <input type="submit" value="Ok" class="btn btn-success"/>
</form>

