<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<style type="text/css">
		#home-background{
			background-color:#BBD1FF !important;
			text-align:center;
			padding-bottom: 20px;
		}
		#home-background>h1{
			padding: 40px 0;
		}
		.form-inline{
			width:20px;
			margin-left: 620px;
			margin-top: 30px;
		}
		#search-button{
			margin-left: 65px;
			margin-top:25px;
			margin-bottom:40px;
		}
		.form-control{
			text-align: center;
		}
		.course-list{
			background-color:#FFF1BE;
			text-align:center;
			padding: 40px 20px;
			margin: 20px 20px;
			border-radius: 10px;
			font-size:20px;
		}
		.course-list p{
			padding-top: 10px;
	
		}
		.course-list:hover{
			background-color:#FFE894;
		}
		.course-list-div{
			margin-top: 40px;
		}
		#to-log-in{
			padding-bottom:50px;
		}
		#atuo-search{
			text-align:center;
			width:800px;
			margin: 0px auto;
		}
		.card-body {
			display:none;
			padding: 0 40;
			margin-left: -14px;
		}
		#search{
			padding: 10px 20px;
			text-align:center;
			width:400px;
			display:block;
			margin: 0px auto;
		}
	</style>
</head>
<body>
	<div id='home-background'>
	    <h1>Welcome to Course Review</h1>
        <?php if($this->session->userdata('logged_in')) : ?>
            <h4>  Dear customer <?php echo $this->session->userdata('username'); ?>
        <?php endif; ?>
		<?php if(!$this->session->userdata('logged_in')) : ?>
            <h4 id='to-log-in'> Log in to explore more functions</h4>
        <?php endif; ?>
	    
		<?php if($this->session->userdata('logged_in')) : ?>
		<form class="form-inline" >
            <?php echo form_open('ajax'); ?>
            <input class="form-control" type="search" id="search_text" placeholder="INFS3202" name="search" >
            <button class="btn btn-outline-primary" type="button" id="search-button" data-toggle="collapse" data-target="#search-co" aria-expanded="false" aria-controls="collapseExample"> search </button>
            <?php echo form_close(); ?>
		</form> 
		<?php endif; ?>

		<div class="container" id='collapseExample'>
			<div class="collapse" id="search-co">
			    <h4>guess you want..</h4>
				<div class="card card-body" id="search">	
				</div>
			</div>
	    </div>
	</div>
	<div class='container course-list-div'>
		<div class="row">
		    <div class='col-sm course-list'>
			    <p> INFS3202 </p>
		    </div>
			<div class='col-sm course-list'>
			    <p> DECO7140 </p>
		    </div>
			<div class='col-sm course-list'>
			    <p> INFS7900 </p>
		    </div>
		</div>
		<div class="row">
		    <div class='col-sm course-list'>
			    <p> DECO7180 </p>
		    </div>
			<div class='col-sm course-list'>
			    <p> DECO7250 </p>
		    </div>
			<div class='col-sm course-list'>
			    <p> INFS7903 </p>
		    </div>
		</div>
	</div>
</body>

<script>
	// fetch auto atuocompletion data
    $(document).ready(function(){
    load_data();
        function load_data(query){
            $.ajax({
            url:"<?php echo base_url(); ?>ajax/fatch",
            method:"GET",
            data:{query:query},
            success:function(response){
                $('#result').html("");
                if (response == "" ) {
                    $('#result').html(response);
                }else{
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        var items=[];
                        $.each(obj, function(i,val){
                            items.push($("<div onclick='fill("+ " \" "+ val.course_id + "\" "+ " )' >  "+ val.course_id +" </div>" ));
                    });
                    $('#result').append.apply($('#result'), items);         
                    }else{
                    $('#result').html("Please try other key words");
                    }; 
                };
            }
        });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != ''){
                load_data(search);
            }else{
                load_data();
            }
        });
    });

	// search 
	$(document).ready(function(){
	get_search();
        function get_search(query){
            $.ajax({
            url:"<?php echo base_url(); ?>ajax/fatch",
            method:"GET",
            data:{query:query},
            success:function(response){
                $('#search').html("");
                if (response == "" ) {
                    $('#search').html(response);
                }else{
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        var items=[];
                        $.each(obj, function(i,val){
                            items.push($("<a href='" + "<?php echo base_url(); ?>result/show_result/" + val.course_id + "'>" + "<h6>" + val.course_id + ' ' +val.course_title + "</h6>" + "</a>"));
                    });
                    $('#search').append.apply($('#search'), items);         
                    }else{
                    $('#search').html("Please try other key words");
                    }; 
                };
            }
        });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != ''){
                get_search(search);
            }else{
				get_search();
            }
        });
    });


	// fill search box
	function fill(course_id) {
		var fill_text = document.getElementById('search_text');
		fill_text.value = course_id;
		console.log(course_id);
	}
</script>

</html>
