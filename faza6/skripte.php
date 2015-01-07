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
								var podaci = {email: $("#email").val(), lozinka: MD5($("#lozinka").val())};
								$.ajax({
											type : "POST",
											url : "autoriziraj.php",
											data : "podaci=" + JSON.stringify(podaci),
											success : function(msg) {
												var odgovor= $.parseJSON(msg);
												if (odgovor.status) {
													window.location = odgovor.stranica;
												}
												else {
													$("#poruka").html(odgovor.poruka);
												}
											}
                      
										});
								return false;
							});

		});
		</script>