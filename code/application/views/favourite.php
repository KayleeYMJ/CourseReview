<style>
div h2{
	text-align:center;
	margin-top:30px;
}
.card{
	margin: 10px auto;
	text-align:center;
  width: 500px;
}
.card-body{
  text-align:left;
}

.card-footer button {
  float:right;
}
.item{
  list-style:none; 
}
</style>

<div>
	<h2> Collection </h2>
  <?php 
    foreach ($items as $value) {
    echo 
      "<li class='item'>
        <div class='card'>
          <div class='card-body'>
            <h5 class='card-title'>".$value['author'].":</h5>
            <h6 class='card-text'>".$value['content']."</h6>
            <h8>".$value['course_id']." - ".$value['time']."</h8>  
          </div>
        <div class='card-footer'>
          <a href='".base_url()."favourite/delete/".$value['review_id'].''."'><button type='button' class='btn btn-outline-secondary'>cancal</button></a>
        </div>
      </li>";
    }
  ?>
</div>
