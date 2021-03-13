
/* Using pure xmlHttp with no ajax, no jquery
*/
var xhr=createXmlHttpObject();

// Arrays to store messages 
var successes = [];
var errors = [];


// allow for Microsoft variation
function createXmlHttpObject(){
	if(window.XMLHttpRequest){
		xmlHttp=new XMLHttpRequest();
	}else{
		xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	return xmlHttp;
}

function insertResponse() {
	
	if(xhr.readyState==4 && xhr.status==200){
		// translate from text to JSON
		var jsObj = JSON.parse(xhr.responseText);
		
		jsObj.forEach(function(item, index) {
			if(typeof item['success'] !== 'undefined' && item['success'] !== null) 
				successes.push(item['success']);
			if(typeof item['failure'] !== 'undefined' && item['failure'] !== null) 
				errors.push(item['failure']);
		});
		displayMessages();
	}
}


function insertuser() {
	
	validateInput();
	if (errors.length < 1){
			// scrap the data from the html document
		var user = document.getElementsByName('username')[0].value;
		var email = document.getElementsByName('email')[0].value;
		var password = document.getElementsByName('password')[0].value;
		var passwordconf = document.getElementsByName('passwordConf')[0].value;

		var url = "http://127.0.0.1/quiz/api/insertuser.php";
		
		// build JSON message to send
		var jsonString = JSON.stringify({'username':user, 'password':password, "email":email} );
		
		if(xhr.readyState==0 || xhr.readyState==4){
			//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/open
			xhr.open('POST', url ,true);  // true is asynchronous
			// set MIME type and character set to match that in insertuser.php
			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			// set callback function that will respond to the listener being triggered
			xhr.onreadystatechange=insertResponse;
			// send message
			xhr.send(jsonString);
		}
	}
}

function displayMessages() {
	if (successes.length > 0) {
		successStr = "<div class='alert alert-success'>";
		for( i = 0; i < successes.length; i++) {
			successStr += "<li>" + successes[i] + "</li>";
		}
		successStr += "</div>";
		document.getElementById("alert-success").innerHTML = successStr;
	} else {
		document.getElementById("alert-success").innerHTML = "";
	}
	
	if(errors.length > 0 ) {
		failureStr = "<div class='alert alert-danger'>";
		for( i = 0; i < errors.length; i++) {
			failureStr += "<li>" + errors[i] + "</li>";
		}
		failureStr += "</div>";
		document.getElementById("alert-danger").innerHTML = failureStr;
	} else {
		document.getElementById("alert-danger").innerHTML = "";
	}
}

function clearMessages() {
	document.getElementById("alert-success").innerHTML = "";
	document.getElementById("alert-danger").innerHTML = "";
}

function validateInput() {
	// scrap the data from the html document
	var user = document.getElementsByName('username')[0].value;
	var email = document.getElementsByName('email')[0].value;
	var password = document.getElementsByName('password')[0].value;
	var passwordconf = document.getElementsByName('passwordConf')[0].value;
	
	/* Note: if( value ) { }
		will evaluate to true if value is not:
			null
			undefined
			NaN
			empty string ("")
			0
			false
	*/
	switch(event.target.name) {
		case 'username':
			if (!user) {
				errors.push("Username cannot be nothing");
			}
			break;
		case 'email':
			if (!email) {
				errors.push("Email cannot be nothing");
			}
			break;
		case 'password':
			if (!password) {
				errors.push("Password cannot be nothing");
			}
			break;
		case 'passwordConf':
			if (!passwordconf) {
				errors.push("Confirmed password cannot be nothing");
			} else if (password !== passwordconf) {
				errors.push("Password and Confirmed password do not match");
			}
			break;
	}
	
	displayMessages();
}	

// --Insert Quiz Functions ------------

function insertQuiz() {
	validateQuizInput();
	if (errors.length < 1){
		// scrap the data from the html document
		var quiz = document.getElementsByName('quizName')[0].value;

		var url = "http://127.0.0.1/quiz/api/insertQuiz.php";
		
		// build JSON message to send
		var jsonString = JSON.stringify({'quizName':quiz} );
		
		if(xhr.readyState==0 || xhr.readyState==4){
			//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/open
			xhr.open('POST', url ,true);  // true is asynchronous
			// set MIME type and character set to match that in insertuser.php
			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			// set callback function that will respond to the listener being triggered
			xhr.onreadystatechange=insertResponse;
			// send message
			xhr.send(jsonString);
		}
	}
}

function insertQuizResponse() {
	
	if(xhr.readyState==4 && xhr.status==200){
		// translate from text to JSON
		var jsObj = JSON.parse(xhr.responseText);
		
		jsObj.forEach(function(item, index) {
			if(typeof item['success'] !== 'undefined' && item['success'] !== null) 
				successes.push(item['success']);
			if(typeof item['failure'] !== 'undefined' && item['failure'] !== null) 
				errors.push(item['failure']);
		});
		displayMessages();
	}
}

function validateQuizInput() {
	// scrap the data from the html document
	var quiz = document.getElementsByName('quizName')[0].value;
	
	switch(event.target.name) {
		case 'quizName':
			if (!quiz) {
				errors.push("Quiz name cannot be nothing");
			}
	}
	
	displayMessages();
}	

// --Insert Quiz Question Function ---------------

function insertQuestion() {

	if (errors.length < 1){
		// scrap the data from the html document
		var quiz = document.getElementsByName('quizName')[0].value;
		var question = document.getElementsByName('questionName')[0].value;

		var url = "http://127.0.0.1/quiz/api/insertQuestion.php";
		
		// build JSON message to send
		var jsonString = JSON.stringify({'quiz':quiz, 'question':question} );
		
		if(xhr.readyState==0 || xhr.readyState==4){
			//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/open
			xhr.open('POST', url ,true);  // true is asynchronous
			// set MIME type and character set to match that in insertuser.php
			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			// set callback function that will respond to the listener being triggered
			xhr.onreadystatechange=insertResponse;
			// send message
			xhr.send(jsonString);
		}
	}
}

// --Insert Quiz Question Answer Function -----------------

function insertAnswer() {

	if (errors.length < 1){
		// scrap the data from the html document
		var question = document.getElementsByName('quizQuestion')[0].value;
		var ans = document.getElementsByName('questionAnswer')[0].value;

		var url = "http://127.0.0.1/quiz/api/insertAnswer.php";
		
		// build JSON message to send
		var jsonString = JSON.stringify({'quizQuestion':question, 'questionAnswer':ans} );
		
		if(xhr.readyState==0 || xhr.readyState==4){
			//https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/open
			xhr.open('POST', url ,true);  // true is asynchronous
			// set MIME type and character set to match that in insertuser.php
			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			// set callback function that will respond to the listener being triggered
			xhr.onreadystatechange=insertResponse;
			// send message
			xhr.send(jsonString);
		}
	}
}
