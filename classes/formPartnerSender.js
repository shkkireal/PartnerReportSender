$(document).ready(function($) {
	


	$("#PartnerLid").submit(function() { return false; });

		
		$("#send").on("click", function(){
			var nameval  = $("#name").val();
			var emailval  = $("#email").val();
			var epbval  = $("#epb").val();
			var telefonval  = $("#telefon").val();
			var acceptval    = document.getElementById('accept');
			var namelen    = nameval.length;
			var emaillen    = emailval.length;
			var epblen      = epbval.length;
			var telefonlen    = telefonval.length;
			var validate    = 0;
		    
							
		    console.log(telefonlen);
			
			
			if(namelen < 8) {
				
				$("#name").removeClass("is-valid");
				$("#name").addClass("is-invalid");
				console.log(namelen);

				
				validate--;
				
			}
			else{
				$("#name").removeClass("is-invalid");
				$("#name").addClass("is-valid");
				validate++;
				
			}
			
		    if(emaillen < 4) {
				$("#email").removeClass("is-valid");
				$("#email").addClass("is-invalid");
				console.log(emaillen);
			    validate--;
			}
			else{
				
				 var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                 var valid = re.test(emailval);
				 if (valid){
				$("#email").removeClass("is-invalid");
				$("#email").addClass("is-valid");
				validate++;
				 }
				 else {
					 $("#email").removeClass("is-valid");
				     $("#email").addClass("is-invalid");
					 validate--;
				 }
			}
			if(epblen < 16) {
				$("#epb").removeClass("is-valid");
				$("#epb").addClass("is-invalid");
				console.log(epblen);
			validate--;
			}
			else{
				$("#epb").removeClass("is-invalid");
				$("#epb").addClass("is-valid");
				validate++;
				
			}
			if(telefonlen < 11) {
				
				$("#telefon").removeClass("is-valid");
				$("#telefon").addClass("is-invalid");
				console.log(telefonlen);
			validate--;
			}
			else{
				
				$("#telefon").removeClass("is-invalid");
				$("#telefon").addClass("is-valid");
				validate++;
				
			}
			if(acceptval.checked) {
				
				$("#accept").removeClass("is-invalid");
				$("#accept").addClass("is-valid");
				console.log("acc on");
				validate++;
				
			}
			else{
				$("#accept").removeClass("is-valid");
				$("#accept").addClass("is-invalid");
				
			validate--;
				
			}
					
			
			console.log("validate");
				console.log(validate);
			if(validate == 5) {
				
				console.log("mailed");
				$("#send").replaceWith("<em>отправка...</em>");
				
				$.ajax({
					type: 'POST',
					url: 'http://card.profatom.ru/partners/PartnerMailFormSender.php',
					data: $("#PartnerLid").serialize(),
					success: function(data) {
					    
						if(data == "true") {
						
						
							$("#PartnerLid").fadeOut("fast", function(){
								$(this).before("<p><strong>Ваша заявка отправлена. <p>В скором времени с Вами обязательно свяжутся. <p>Через 5 секунд Вы будете перенаправлены на главную страницу нашего сайта card.profatom.ru</a></strong></p>");
								 var delay = 5000;
                                 setTimeout("window.location.href='http://www.card.profatom.ru'", delay);

							});
						}
					}
				});
			}
		});
});