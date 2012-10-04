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
							<option value="5" >5 Stars</option>
						</select>
						</div> 

			<button type="button" id="btnPrevQuestion" class="btn btn-small btn-primary">Prev Question</button>			
			<button type="button" id="btnNextQuestion" class="btn btn-small btn-primary">Next Question</button>
			<button type="button" id="btnSendAnswer" class="btn btn-small btn-primary pull-right">Send All Answers</button>
</div>

<script>
		var currentQuestion = 0;
		var solveAnswers;
		var solveRatings;



		//load first question
		$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');

		for(i=0; i < serverStatus.NUMQ; i++){
			solveAnswers[i] = 1;
			solveRatings[i] = 3;
		}


		//Bind listeners
		$('#btnNextQuestion').click(solveNextQuestion);
		$('#btnPrevQuestion').click(solvePrevQuestion);
		$("#btnSendAnswer").click(sendAnswers);

		$("#solveCorrectAns").change(setCorrectAnswer);
		$("#solveRating").change(setRating);



		console.log("\n Number of questions: " + serverStatus.NUMQ);

		
		//Init first question
		$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');

		function solveNextQuestion(){

			console.log("\nTrying to load question " + currentQuestion);

			if(currentQuestion < serverStatus.NUMQ -1){

				currentQuestion++;				
				$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');


				console.log('\n solveCorrectAns: ' + $("#solveCorrectAns").val());

				sAns = $("#solveCorrectAns").children();
				$(sAns[ solveAnswers[currentQuestion] -1]).attr('selected', true);

					console.log('\nsAns ' + $(sAns[ solveAnswers[currentQuestion] -1]).val());


					sRats = $("#solveRating").children();
					$(sRats[ solveRatings[currentQuestion] -1]).attr('selected', true);

				
			}

			

		}

		function solvePrevQuestion(){

			console.log("\nTrying to load question " + currentQuestion);

			if(currentQuestion > 0){
				currentQuestion--;				
				$("#solveQuestionBody").load(serverIp + serverQuestionsUri + '/' + currentQuestion + '.html');
				console.log("\nLoading question " + currentQuestion);

					sAns = $("#solveCorrectAns").children();
					$(sAns[ solveAnswers[currentQuestion] -1]).attr('selected', true);
					


					sRats = $("#solveRating").children();
					$(sRats[ solveRatings[currentQuestion]  -1]).attr('selected', true);


			}

			
		}


		function sendAnswers(){

			var msg = {
			"TYPE": "ANSWER",
			"NAME": userName,
			"MYANSWER": solveAnswers,
			"MYRATING": solveRatings,
			"IP": myIp
			};

			$.post(serverIp  + userMsg,{MSG: JSON.stringify(msg)})
			.success(function(){
				alert('Questions sent');
			})
			.error(function(){
				alert('Questions not sent');
			});

			alert(JSON.stringify(msg));

			$('#main-menu').load('views/wait.php');

		}

		function setCorrectAnswer(){
			solveAnswers[currentQuestion] = $("#solveCorrectAns").val();

		}

		function setRating(){
			solveRatings[currentQuestion] = $("#solveRating").val();
		}




</script>