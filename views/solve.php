<div id="solveQuestion" class="span12 well well-small">
				<div class="form_description">
					<h2>Solve Questions</h2>
					<p>Select the correct answer and send to teacher.</p>
				</div>	
			<div id="solveQuestionBody"></div>
				
						<label class="description" for="solveCorrectAns">Correct Answer </label>
						<div>
						<select class="element select medium" id="solveCorrectAns" name="solveCorrectAns"> 
							<option value="1" selected >Option 1</option>
							<option value="2" >Option 2</option>
							<option value="3" >Option 3</option>
							<option value="4" >Option 4</option>
						</select>
						</div> 

						<label class="description" for="solveCorrectAns">Rating</label>
						<div>
						<select class="element select medium" id="solveRating" name="solveCorrectAns"> 
							<option value="1" >1 Star</option>
							<option value="2" >2 Stars</option>
							<option value="3" selected>3 Stars</option>
							<option value="4" >4 Stars</option>
						</select>
						</div> 
			<button type="button" id="btnNextQuestion" class="btn btn-small btn-primary">Next Question</button>
			<button type="button" id="btnSendAnswer" class="btn btn-small btn-primary">Send All Answers</button>
</div>

<script>
		var currentQuestion = 0;


		//Bind listeners
		$('#btnNextQuestion').click(solveNextQuestion);
		$("#solveCorrectAns").change(setCorrectAnswer);
		$("#solveRating").change(setRating);
		$("#btnSendAnswer").change(sendAnswers);

		
		//Disable the next question button if needed
		if(this.currentQuestion + 1  == serverStatus.NUMQ){
				$('#btnNextQuestion').addClass('disabled');
			}


		//Init first question
		$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');

		function solveNextQuestion(){

			if(this.currentQuestion < serverStatus.NUMQ){
				this.currentQuestion++;
				//$("#solveQuestionFrame").attr('src', serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');
				$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');
			}

			if(this.currentQuestion  == serverStatus.NUMQ){
				$('#btnNextQuestion').addClass('disable');
			}

		}
		

</script>