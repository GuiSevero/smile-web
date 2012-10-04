<form>
<div id="makeQuestion" class="well well-small">
			
				<h2>Create Question</h2>
				<p>Create your questions here.</p>
			
					<label class="description"  for="qtnBody">Question Body </label>

					<div class="row-fluid">
						<div class="span12">
							<textarea id="qtnBody" name="qtnBody" class="text-area" rows="10" required></textarea><br>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">

							<label class="description" for="qtnAnsText1">Option 1 </label>
							<div>
								<!-- <input id="qtnAnsText1" name="qtnAnsText1" class="element text large" type="text" maxlength="255" value="" required/>  -->
								<textarea id="qtnAnsText1" name="qtnAnsText1" class="text-area" rows="3" cols="50" required></textarea>
							</div> 
					
							<label class="description" for="qtnAnsText2">Option 2 </label>
							<div>
								<!-- <input id="qtnAnsText2" name="qtnAnsText2" class="element text large" type="text" maxlength="255" value="" required/> -->
								<textarea id="qtnAnsText2" name="qtnAnsText2" class="text-area" rows="3" cols="50"  required></textarea>
							</div> 
					
							<label class="description" for="qtnAnsText3">Option 3 </label>
							<div>
								<!-- <input id="qtnAnsText3" name="qtnAnsText3" class="element text large" type="text" maxlength="255" value="" required/> -->
								<textarea id="qtnAnsText3" name="qtnAnsText3" class="text-area" rows="3" cols="50" required></textarea>
							</div> 
					
							<label class="description" for="qtnAnsText4">Option 4 </label>
							<div>
								<!-- <input id="qtnAnsText4" name="qtnAnsText4" class="element text large" type="text" maxlength="255" value="" required/> -->
								<textarea id="qtnAnsText4" name="qtnAnsText4" class="text-area" rows="3" cols="50" required></textarea>
							</div> 
						
							<label class="description" for="element_6">Correct Answer </label>
							<div>
							<select class="select-answer" id="correctAns" name="correctAns"> 
								<option value="1" >Option 1</option>
								<option value="2" >Option 2</option>
								<option value="3" >Option 3</option>
								<option value="4" >Option 4</option>
							</select>
							</div> 
				
							<input id="btnSend" class="btn btn-small btn-success" type="button" name="submit" value="Send" />
				

						</div>
						<div class="span6">
							<div id="searchcontrol"></div>
						</div>
					</div> <!-- /row-fluid -->
				
					
		</div>
</form>
<script>
	console.log('Loaded make page\n Binded buttons');
	$('#btnSend').click(sendQuestion);
	$('#btnGoogle').click(googleSearch);
	$('#searchcontrol').hide();
	
	var keyFunction = function(ed) {
            	ed.onKeyUp.remove(keyFunction);
            	setTimeout(googleSearch,3000); 	
        	};

	//Load the tinyMCE text editor
	var ed = tinyMCE.init({
        mode : "exact",
        elements : "qtnBody",
         width : "100%",
        theme : "simple",   //(n.b. no trailing comma, this will be critical as you experiment later)
          setup : function(ed) {
        		// Display an alert onclick
       			ed.onKeyUp.add(keyFunction);
    	 }
	});

	function googleSearch(){	
			var ed = tinyMCE.get('qtnBody');
			$.post('sobek.php', {texto: $(ed.getContent()).text()}, sobekCallBack );
			ed.onKeyUp.add(keyFunction);
			

		}

        
        function sobekCallBack(data) {
          // Create a search control
          var searchControl = new google.search.SearchControl();

          // Add in a full set of searchers     
          searchControl.addSearcher(new google.search.ImageSearch());     
          searchControl.addSearcher(new google.search.WebSearch());
          
          // tell the searcher to draw itself and tell it where to attach
          searchControl.draw(document.getElementById("searchcontrol"));

          searchControl.setSearchCompleteCallback(this, function(){
          	console.log('google callback');
          	//$('.gs-image > img').draggable();
          	$('#searchcontrol').show('slow');
          	
          });
      
          // execute an inital search
          if(data != '')
          		searchControl.execute(data);
          	else
          		searchControl.execute($('#qtnBody').val());

          
        }        


     function sendQuestion(){
		var msg = {
		"TYPE": "QUESTION",
		"NAME": userName,
		"Q": 	tinyMCE.get('qtnBody').getContent(),
		"O1":  $('#qtnAnsText1').val(),
		"O2":  $('#qtnAnsText2').val(),
		"O3":  $('#qtnAnsText3').val(),
		"O4":  $('#qtnAnsText4').val(),
		"A":  $('#correctAns').val(),
		"IP": myIp
		};
	
		
		$.post(serverIp + userMsg,{MSG: JSON.stringify(msg)})
		.success(function(){
			alert('Question sent');
		})
		.error(function(){
			alert('Question not sent');
		});
		
	}

</script>