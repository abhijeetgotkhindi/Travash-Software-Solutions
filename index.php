<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple Login Form UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section class="main-content" style="padding:30px;">
		<div class="page-content" style="background-color: #3DA88A;padding: 30px;margim-bottom:10rem;">
			<div class="login-card container d-flex rounded-lg overflow-hidden bg-white" style="margin-bottom:8rem;">
				<div class="login-message d-none d-sm-none d-md-flex flex-column justify-content-center p-4">
					<h1><div id="main">Our Philosophy - </div>Quality Care and Rest</h1>
				</div>
				<form method="post" enctype="multipart/form-data">
				<div class="login-body">
					<div class="login-body-wrapper mx-auto bg-light" style="padding:30px;">
						<div class="form-group">
							<input class="form-control form-control-lg" placeholder="Section Title" name="title" id="title" required />
						</div>
						<div id="content_div" class="card bg-light text-white" style="padding:10px;">
						<div class="form-group custom-file">
							<input id="customFile" type="file" name="image[]" id="image" accept="image/png, image/gif, image/jpeg" class="form-control form-control-lg custom-file-input" required>
							<label for="customFile" class="custom-file-label">Image Upload</label>
						</div>
						<div class="form-group" style="margin-top:17px;">
							<textarea class="form-control form-control-lg" placeholder="Description" name="description[]" id="description" required></textarea>
						</div>
						</div>
						<div id="newRow"></div>				
						<button id="addRow" type="button" style="margin:10px 0px 10px 0px" class="btn btn-success btn-circle btn-sm float-right"><i class="fa fa-plus" style="    font-size: 2rem;"></i></button>
						<button  style="margin-top:17px;" class="btn btn-primary btn-block btn-lg">SUBMIT</button>
						
					</div>
					 
				</div>
				</form>
			</div>
		</div>
		<img src="img/graphic-shape.svg" style="width: 100%;margin-top: -132px;"/>
		
		<div class="featured-services">
		<?php
$output = '';
	 if(isset($_FILES['image']) && isset($_POST['description'])){
		//exit;
		
		if (isset($_FILES['image'])) {
                $myFile = $_FILES['image'];
                $fileCount = count($myFile["name"]);     
                }
		if(isset($_POST['description'])){
			$description = $_POST['description'];
		}
		
		
		$output = '<div class="container">
					<h3 id="title_show">'.$_POST['title'].'</h3><div class="featured-services-grids">';
					for ($i = 0; $i < $fileCount; $i++) {
						move_uploaded_file($myFile["tmp_name"][$i], "img/".$myFile["name"][$i]);
						
						$output .='<div class="col-md-3 featured-services-grid" style="word-break: break-word;">
										<div class="featured-services-grd" style="height: 500px;">
											<span aria-hidden="true"><img style="width:100px;height:100px;" src="img/'. $myFile["name"][$i].'" style="width: 100%;"/></span>
											<p id="description_show" style="overflow: auto;height: 350px;">'.$description[$i].'</p>
										</div>
									</div>';
					}
				$output .='<div class="clearfix"> </div>
					</div></div>';
		
	 }
?>
		<?php echo $output; ?>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
        // add row
		let i = 1;
        $("#addRow").click(function () {
			if(i < 4){
            var html = '';
				html += '<div id="content_div" class="card bg-light text-white" style="padding:10px;">';
				html += '<button type="button" id="removeRow" class="close" data-dismiss="modal" aria-label="Close"><span  class="float-right" aria-hidden="true">&times;</span></button>';
				html += '<div class="form-group custom-file">';
				html += '<input id="customFile" type="file" name="image[]" id="image" accept="image/png, image/gif, image/jpeg" class="form-control form-control-lg custom-file-input" required>';
				html += '<label for="customFile" class="custom-file-label">Image Upload</label>'
				html += '</div>'
				html += '<div class="form-group" style="margin-top:17px;">'
				html += '	<textarea class="form-control form-control-lg" placeholder="Description" name="description[]" id="description" required></textarea>'
				html += '</div></div>';
            $('#newRow').append(html);
			i++;
			}
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#content_div').remove();
        });
    </script>
</body>
</html>