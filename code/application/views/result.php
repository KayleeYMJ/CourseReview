<style>
	#title{
		margin-top: 40px;
        text-align:center;
	}
	#login-form div{
		margin-top: 30px;
	}
    .card-header{
        background-color: #E3EBFC;
        border-bottom: 0px;
    }
    .text-primary {
    color: #000000 !important;
    }
    #course-info{
       position:absolute;
        margin-left: 80px;
        margin-top: 130px;
        border: dashed 3px;
    }
    #course-info div h6{
        margin: 20px 0;
    }
    #course-info div h4{
        text-align:center;
    }
    #update-file{
        background-color: #FFEEB0;
    }
    #reorder{
      float:right;
      margin-right:300px;
      margin-top:30px
    }
    #add_review{
      position: fixed;
      z-index:10;
      right:50px;
      top: 400px;
      border-radius: 50px;
      padding:20px 20px;
    }
    #good_icon{
      width:30px;
      margin-left:20px;

    }
    #bad_icon{
      width:27px;
      margin-left:20px;

    }
    #shopping_icon{
      width:30px;
      margin-right: 25px;
    }
    #review-list{
      list-style-type: none;
      margin-left: 450px;
      margin-top:100px;
    }
    #review-list li{
      margin: 20px 0;
    }
    #review-list li div{
      width: 600px;
    }
    .outstanding{
      background:#FFEEB0;
    }
    .card-footer img{
      float:right;
    }
    .pay-outstanding{
      background:#FFEEB0;
      text-align: center;
    }
    .pay-outstanding:hover {
      background:#FFE894;
    }
    #icon-review{
      margin-top: -20px;
      margin-bottom:20px;
    }
    .count{
      margin-top: -20px;
      margin-left: 50px;
      font-size: 15px;
    }
    #multiple{
      position: absolute;
      margin-top: 560px;
      margin-left: 80px;
    }
    #update-file:hover {
      background:#FFE894;
    }
</style>

<h1 id='title'>  <?php echo $course_id." ".$course_title ?> </h1>

<!-- course info -->
<div class="card border-primary mb-3" style="max-width: 18rem;" id="course-info">
  <div class="card-header">
      <h4>Course Information</h4>
  </div>
  <div class="card-body text-primary">
    <h6 class="card-text">Lecture:  Tony Chen</h6>
    <h6 class="card-text">Semester Available: Semester 1</h6>
    <h6 class="card-text">Pre-Requisites: CSSE7030, INFS7900, DECO7140</h6>
  </div>
</div>


<!-- add review -->
<button type="button" class="btn btn-outline-primary" id='add_review' data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  Add <br> Review
</button>

<!-- review list -->
<div>
<ul id='review-list'>
  <!-- show all reviews -->
  <?php 
    foreach ($reviews as $value) {
      $div = 
      "<li>
        <div class='card'>
          <div class='card-body'>
            <h5 class='card-title'>".$value['author'].":</h5>
            <p class='card-text'>".$value['content']."</p>
            <p>".$value['time']."</p>
          </div>
        <div class='card-footer'>
          <a href='".base_url()."result/add_shopping/".$value['review_id']."/".$course_id."'><img src='".base_url()."assets/img/collection.png' alt='delete' id='shopping_icon'> </a>
        </div>
      </li>";
      echo $div;
    }
  ?>
  </ul>
</div>

<!-- add review modal -->
<?php echo form_open(base_url().'result/add_review/'.$course_id); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author name: </label>
            <input type="text" class="form-control" name="author"  id="recipient-name" value="<?php echo $this->session->userdata('username'); ?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Edit Review: </label>
            <textarea class="form-control" id="message-text" placeHolder='Edit review' name="content"></textarea> 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"  οnclick="javascript:Upload();">Submit</button>
      </div>
     
    </div>
  </div>
</div>
<?php echo form_close(); ?>

<!-- dropdown -->
<script>
  var item = document.querySelector('.dropdown-menu');
  var button = document.querySelector('.order-button');
    item.onclick = function() {
      button.className = 'btn btn-primary dropdown-toggle order-button'; 
    }
</script>

<!-- reference from https://stackoverflow.com/questions/34261365/retain-scrollbar-position-even-after-reloading-using-javascript -->
<script>
$(window).scroll(function() {
  sessionStorage.scrollTop = $(this).scrollTop();
});

$(document).ready(function() {
  if (sessionStorage.scrollTop != "undefined") {
    $(window).scrollTop(sessionStorage.scrollTop);
  }
});
</script>