<?php 
include_once 'modalAutorizacija.php';
?>
		<script src="<?php echo $putanjaApp; ?>js/vendor/jquery.js"></script>
		<script src="<?php echo $putanjaApp; ?>js/foundation.min.js"></script>
		<script src="<?php echo $putanjaApp; ?>js/md5.js"></script>
		<script>
			$(document).foundation();
			$(function() {

			$("#autorizacija").click(
							function() {
								$("#poruka").html("");
								if($("#email").val().trim().length==0){
									$("#poruka").html("Email obavezno");
									return; //Shor Curcuit
								}
								if($("#lozinka").val().trim().length==0){
									$("#poruka").html("Lozinka obavezno");
									return; //Shor Curcuit
								}
								$.ajax({
											type : "POST",
											url : "autoriziraj.php",
											data : "email=" + $("#email").val()
													+ "&lozinka="
													+ MD5($("#lozinka").val()),
											dataType : "html",
											success : function(msg) {
												if (msg == "true") {
													window.location = "administracija/nadzornaPloca.php";
												}
												else {
													$("#poruka").html("Neispravna kombinacija korisničkog imena i lozinke");
												}
											}
                      
										});
								return false;
							});

		});
		</script>
