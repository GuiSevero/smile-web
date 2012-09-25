<!DOCTYPE html>
<html>
  <head>
    <title>SMILE Web</title>
    <link rel="stylesheet" type="text/css" href="styles/core.css"/>
	<meta charset="ISO-8859-1">
    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
  </head>

  <body>
	<p id="status"></p>
    <p id="userStatus"></p>
   
	
	<div id="loginScreen">
		<h1>Smile Desktop</h1>
		<label for="serverIp">Server IP</label><br>
		<input type="text" id="serverIp" size="30" value="http://localhost"/><br>
		<label for="serverIp">Username</label><br>
		<input type="text" id="userName" size="30" value="username"/><br>		
		<input type="hidden" id="myIp" size="30" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"/><br>
		
		<button type="button" id="btnConnect">Connect</button>
	</div>
	
	<div id="makeQuestion">
		<h1>Create Question</h1>
		<label for="qtnTitle">Question Title</label><br>		
		<input type="text" id="qtnTitle" size="30" value="Title"/><br>
		<label for="qtnBody">Question Body</label><br>
		<textarea id="qtnBody" rows="10" cols="20"></textarea>
		<br>
		<label for="qtnAnsText1">Answer 1</label><br>
			<input type="text" id="qtnAnsText1" size="30" value="Answer 1"/><br>
		<label for="qtnAnsText2">Answer 2</label><br>
			<input type="text" id="qtnAnsText2" size="30" value="Answer 2"/><br>
		<label for="qtnAnsText3">Answer 3</label><br>
			<input type="text" id="qtnAnsText3" size="30" value="Answer 3"/><br>
		<label for="qtnAnsText4">Answer 4</label><br>
			<input type="text" id="qtnAnsText4" size="30" value="Answer 4"/><br>
		<label for="correctAns">Choose an Answer</label><br>
		<select id="correctAns">
			<option value="1">Answer 1</option>
			<option value="2">Answer 2</option>
			<option value="3">Answer 3</option>
			<option value="4">Answer 4</option>
		</select>
		
		
		
		<br>
		<button type="button" id="btnSend">Send</button>
	</div>


	
	<div id="solveQuestion">
		<iframe id="solveQuestionFrame" src="" height="800"></iframe><br>
		<select id="solveCorrectAns">
				<option value="1">Answer 1</option>
				<option value="2">Answer 2</option>
				<option value="3">Answer 3</option>
				<option value="4">Answer 4</option>
			</select>
		<button type="button" id="btnLoadQuestion">Load Question</button>
		<button type="button" id="btnSendAnswer">Send</button>
	</div>

  </body>
</html>
