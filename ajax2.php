function trinti_faila_sut(kint,sk){
if (confirm("Ar tikrai norite ištrinti failą?") == true) {
             $.ajax({
                    type: 'POST',
                    url: 'trinti_faila_sut.php',
                    cache: false,
                    async: false,
                    data: kint,
                    success: function(msg){	      				
									 $('#fl_sut'+sk).remove();																	
                                 },
                                 error: function (XMLHttpRequest, textStatus, errorThrown) {
									alert('Įvyko klaida: ' + textStatus);
                                }
					});
   }				
  }
  
  function dadeti(kint,talp_viet,sk){
			skaicius = parseInt($(sk).val()) + 1;
//alert(skaicius); 		    
			$(sk).val(skaicius);
	       // alert($(sk).val());			
             $.ajax({
                    type: 'POST',
                    url: 'funkcijos.php',
                    cache: false,
                    async: false,
                    data: kint+skaicius,
                    success: function(msg){
									$(talp_viet).append(msg);
                                 },
                                 error: function (XMLHttpRequest, textStatus, errorThrown) {
									alert('Įvyko klaida: ' + textStatus);
                                }
					});
  }
  
  
  
  function trinti(elementas){
            $('.'+elementas).remove();
	} 
	
	
	 function verifyFile(vardas)	 
        {
		var ffname;
		ffname=vardas.value.toLowerCase();    
		 if(ffname.search(/\.(jpg|jpeg|png|bmp|pdf)$/) == -1) {	
          alert("Blogas failo plėtinys!");		  
         return false;
          }
         return true;
              }


function ajax2(url, variables, destination){
        return_variable = 'true';
            $.ajax({
                type: 'POST',
                url: url,
                cache: false,
                async: false,
                data: variables,               
                success: function(msg){	
                if ((/^error: /.test(msg)) || (/^Error/.test(msg)))
                    {
                    alert(msg.replace(/^error: /, ' '));
                    return_variable = 'false';
                    }
                    else{
                    if (destination == 0)
                        {
                        return_variable = 'true';
                        return return_variable;
                        }
                        else if (destination == undefined)                  // "undefined" negalima rašyti kabutėse, nes jei kabutės, tai neveiks
                            alert(msg);
                        else {
                            destination = '#' + destination;
                            $(destination).html(msg);
                            }
                            return_variable = 'true';
                            }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {                        
                            alert('Įvyko klaida: ' + textStatus);
                            return_variable = 'false';
                            }
                   });
                  return return_variable;
}
