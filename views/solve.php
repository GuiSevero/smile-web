<div id="solveQuestion" class="well well-small">
				<div class="form_description">
					<h2>Solve Questions</h2>
					<p>Select the correct answer and send to teacher.</p>
				</div>	
			<iframe id="solveQuestionFrame" src="" height="300" scrolling="auto" frameborder="0"></iframe><br>
				
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
			<button type="button" id="btnNextSolveQuestion" class="btn btn-small btn-primary">Next Question</button>
			<button type="button" id="btnSendAnswer" class="btn btn-small btn-primary">Send All Answers</button>
</div>