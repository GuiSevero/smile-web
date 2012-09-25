<div id="makeQuestion" class="well well-small">
			
				<h2>Create Question</h2>
				<p>Create your questions here.</p>
			
					<label class="description"  for="qtnBody">Question Body </label>
					<div class="row-fluid">
						<div class="span6">
							
							<textarea id="qtnBody" name="qtnBody" class="text-area" rows="10"  required></textarea><br>
							<input id="btnGoogle" class="btn btn-small btn-info" type="button" name="google" value="Sobek Recomendation" /><br>
							

							<label class="description" for="qtnAnsText1">Option 1 </label>
							<div>
								<input id="qtnAnsText1" name="qtnAnsText1" class="element text large" type="text" maxlength="255" value="" required/> 
							</div> 
					
							<label class="description" for="qtnAnsText2">Option 2 </label>
							<div>
								<input id="qtnAnsText2" name="qtnAnsText2" class="element text large" type="text" maxlength="255" value="" required/> 
							</div> 
					
							<label class="description" for="qtnAnsText3">Option 3 </label>
							<div>
								<input id="qtnAnsText3" name="qtnAnsText3" class="element text large" type="text" maxlength="255" value="" required/> 
							</div> 
					
							<label class="description" for="qtnAnsText4">Option 4 </label>
							<div>
								<input id="qtnAnsText4" name="qtnAnsText4" class="element text large" type="text" maxlength="255" value="" required/> 
							</div> 
						
							<label class="description" for="element_6">Correct Answer </label>
							<div>
							<select class="element select medium" id="correctAns" name="correctAns"> 
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

<script>
	console.log('Loaded make page\n Binded buttons');
	$('#btnSend').click(sendQuestion);
	$('#btnGoogle').click(googleSearch);
	$('#searchcontrol').hide();
	

	//Load the tinyMCE text editor
	tinyMCE.init({
        mode : "exact",
        elements : "qtnBody",
        theme : "simple"   //(n.b. no trailing comma, this will be critical as you experiment later)
	});

</script>