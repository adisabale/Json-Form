<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Json Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto mt-5">
<div class="col-12 col-lg-5 mx-auto">
<form method="post" action="">
<?php
$data = ($_POST['jsondt']);
$data = json_decode($data);
$keys = array_column($data->fields, 'order');
array_multisort($keys, SORT_ASC, $data->fields);

foreach($data->fields as $field){
 if($field->type=="dropdown"){?>
    <div class="form-floating mb-3 mt-3">
	<select name="<?=$field->key?>"  class="form-control" <?=$field->isRequired? "required" : " "?> <?=$field->isReadonly ? "readonly" : " "?>>
		<?php foreach($field->items as $item){?>
		   <option value="<?=$item->value?>"><?=$item->text?></option>
	    <?php } ?>
	</select>
	<label><?=$field->label?></label>
	</div>
 	<?php }else{?>
	<div class="form-floating mb-3 mt-3">
	<input type="<?=$field->type?>"  class="form-control" placeholder="<?=$field->label?>" name="<?=$field->key?>" <?=$field->isRequired? "required" : " "?> <?=$field->isReadonly ? "readonly" : " "?> >
	<label><?=$field->label?><?= $field->unit ? "(".$field->unit.")":" " ?></label>
	</div>
<?php } } ?>
<input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
</form>
</div>
</body>
</html>