$(document).ready(function($) {
	

	$("#PartnerLid").submit(function() { return false; });

		
		$("#send").on("click", function(){
			var nameval  = $("#name").val();
			var emailval  = $("#email").val();
			var epbval  = $("#epb").val();
			var telefonval  = $("#telefon").val();
			var acceptval    = $("#accept").val();
			var namelen    = nameval.length;
			var emaillen    = emailval.length;
			var epblen      = epbval.length;
			var telefonlen    = telefonval.length;
		    
							
		
			
			
			if(namelen < 4) {
				$("#name").addClass("error");
				
			}
		
					
			
			
			if(namelen >= 4) {
				
				console.log(namelen);
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