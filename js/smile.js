
		var serverStatus;
		var uri = '/JunctionServerExecution/current/MSG/smsg.txt';
		var userStatusUri = "/JunctionServerExecution/current/MSG/";
		var serverQuestionsUri = "/JunctionServerExecution/current/";
		var userMsg = '/JunctionServerExecution/pushmsg.php';
		var url;
		var serverIp;
		var userName;
		var myIp;
		var getStatusId;
		var oldStatus;
		var currentSolve;
		var solveAnswers;
		var solveRatings;

		var solveObject;
		var serverStatusObject;
		var jRequest;
		
		
      $(function(){
	  	
		//Prepara todos os parametros
		getParameters();

		//Bind buttons
		$('#disconnect').click(disconnect);

		/*
		$('#btnSendAnswer').click(sendAnsewrs);

		$('#btnNextSolveQuestion').click(nextSolveQuestion);
		$("#solveCorrectAns").change(setCorrectAnswer);
		$("#solveRating").change(setRating);
		*/

		//Retrieve a previous execution
		
		var jqxhr = $.getJSON(serverIp + userStatusUri, function(data){

			//Set the username
			userName = data.NAME;


			}).error(function(){
				//O usuário nao tinha execucao antiga
				
			}).success(function(){

				getStatusId = setInterval(getStatus, 1500);
				switchStatus(serverStatus);
				$('#userStatus').html(userName);
				
				
			});
		
		
		
		init();
		
        
      });

      function init(){
      	
		$('#main-menu').load('views/login.php');
		console.log('Loading login page');
		console.log('Getting Parameters: \n My IP: ' + myIp + '\nServer IP: ' + serverIp + '\nUsername: ' + userName );
		
      }

      function getParameters(){
      		
      		myIp = $('#myIp').val();
			userStatusUri += myIp + ".txt";
			serverIp = 'http://' + $('#serverIp').val();
			url = serverIp + uri;
			userName = $('#userName').val();


      }
	  
	  function getStatus(){
	  			//Salva status antigo
	  			if(serverStatus != null){
	  				oldStatus = serverStatus.TYPE;
	  			}

			var jqxhr = $.getJSON(url, function(data){
				
				//Seta o status do servidor
				serverStatus = eval(data);


				//Mostra o Status
				$('#status').html(data.TYPE);

				switchStatus(data.TYPE);

				serverStatus = eval(data);
			}).error(function(){
				$('#userStatus').html('Connecting...');
			}).success(function(){
				$('#userStatus').html(userName);
			});

			
	  }
		  
		  
	  function switchStatus(stat){
		  
		  	  //Verifica se mudou de estado
		  	  if(stat == oldStatus)
		  	  	return;

			  if(stat == "WAIT_CONNECT"){
			  	$('#main-menu').load('views/wait.php');
			  }
			  
			  if(stat == "START_MAKE"){
				$('#main-menu').load('views/make.php');
				
			  }

			  if(stat == "START_SOLVE"){
				$('#main-menu').load('views/solve.php');

				
				if(serverStatus.NUMQ > 0){
					currentSolve = 0;
					$('#solveQuestionFrame').attr('src', serverQuestionsUri + currentSolve + '.html');
					solveRatings = new Array(serverStatus.NUMQ);
					solveAnswers = new Array(serverStatus.NUMQ);
					for(i=0; i<serverStatus.NUMQ; i++){
						solveRatings[i] = 3;
						solveAnswers[i] = 1;
					}
				}

			  }
			  
		  
	  	  
	  }
	  
	  
	  function sendInitialMsg(){
	   var msg = {"TYPE": "HAIL", "NAME": userName, "IP": myIp };
		$.post(serverIp + userMsg,{MSG: JSON.stringify(msg)} );
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


	function nextSolveQuestion(){

			if(confirm("Is option " + $('#solveCorrectAns').val() + " your final answer for this question?")){
				
				//effect
				$('#solveQuestionFrame').hide('slow').show('slow');

				if(currentSolve < serverStatus.NUMQ){
					currentSolve++;
					if(currentSolve == serverStatus.NUMQ -1){
						$('#btnNextSolveQuestion').hide('slow');
						$('#btnSendAnswer').show('slow');
					}

					$('#solveQuestionFrame').attr('src', serverQuestionsUri + currentSolve + '.html');				
					
				}

				
					
			}
			
			

			
	}

	function connect(){
			
			console.log('Connect Trigger');

			
			console.log('Loading Make Menu');

			userName = $('#userName').val();
			if(userName != ''){
				console.log('Getting username: ' + userName);
			
				getStatusId = setInterval(getStatus, 1500);
			
				//Manda uma msg inicial
				sendInitialMsg(); 	
			}else{
				alert('Username cannot be empty');
			}
			
	}

	function disconnect(){
		clearInterval(getStatusId);
			$('#main-menu').load('views/login.php');
	}


	function setCorrectAnswer(){
		solveAnswers[currentSolve] = $("#solveCorrectAns").val();

	}

	function setRating(){
		solveRatings[currentSolve] = $("#solveRating").val();
	}

	function sendAnsewrs(){

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

		function googleSearch(){	

			$.post('sobek.php', {texto: $(tinyMCE.get('qtnBody').getContent()).text()}, sobekCallBack );

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
        
 