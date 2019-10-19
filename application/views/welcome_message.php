<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pendaftaran</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/form/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/form/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<?php if($this->session->flashdata('success')){ ?>  
		     <div class="alert alert-success">  
		       <a href="<?php echo base_url(); ?>" class="close" data-dismiss="alert">&times;</a>  
		       <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
		     </div>
		     <?php } else if($this->session->flashdata('error')){ ?>  
		     <div class="alert alert-danger">  
		       <a href="<?php echo base_url(); ?>" class="close" data-dismiss="alert">&times;</a>  
		       <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
		     </div>  
		      <?php } ?>  
			<form action="<?php echo base_url(). 'welcome/tambah_aksi'; ?>" method="post" class="contact100-form validate-form" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Pendaftaran Lembaga
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Nama Lembaga *</span>
					<input class="input100" type="text" name="nm_lembaga" id="nm_lembaga" placeholder="Masukan Nama Lembaga">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Nama Pimpinan *</span>
					<input class="input100" type="text" name="nm_pimpinan" id="nm_pimpinan" placeholder="Masukan Nama Pimpinan">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Telepon</span>
					<input class="input100" type="text" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" id="email" placeholder="Masukan email">
				</div>


				<div class="wrap-input100 validate-input bg1 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Alamat</span>
					<textarea class="input100" name="alamat" id="alamat" placeholder="Masukan Alamat"></textarea>
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Upload Dokumen</span>
					<input type="file" name="fotopost">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!-- Upload File -->

	<script src=<?php echo base_url()."application/scripts/jquery.js" ?> type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.deletefile').click(function(e) {
		        e.preventDefault();
		        var id = $(this).parent().attr('id');
		        var parent = $(this).parent();
		        $.ajax({
			       	type: "POST",
	      		 	url: "<?php echo base_url() ?>index.php/upload/deleteFile/"+id,
		            success: function() {
		                parent.slideUp(300,function() {
		                    parent.remove();
							$('.message').remove();
		                });
		            }
		        });
		    });
		});
		$(window).bind("load", function() {  
	       window.setTimeout(function() {  
	         $(".alert").fadeTo(500, 0).slideUp(500, function() {  
	           $(this).remove();  
	         });  
	       }, 500);  
     	});  
	</script>

</body>
</html>
