function StartQuestion() {
	var div0 = document.getElementsByClassName("div");
	div0.style.display = "none";
}

function QuestionSuivante(i, idQ){
	var list = document.getElementsByName(idQ);
	var NoSelect = 0;
	for (var u = 0; u < list.length; u++) {
		if (list[u].checked==true) {
			NoSelect=1;        
			var div1 = document.getElementById(i);
			div1.style.display = "none";
			i++;
			var div2 = document.getElementById(i);
			div2.style.display = "block";
    	}
	}                      
}

function QuestionFin(i, idQ){
	var btn =document.getElementById("btn_fin");
	var list = document.getElementsByName(idQ);
	var NoSelect = 0;
	for (var u = 0; u < list.length; u++) {
		if (list[u].checked==true) {
			btn.setAttribute('type', 'submit');
    	}
	} 
}

function QuestionPre(i){
	var div1 = document.getElementById(i);
	div1.style.display = "none";
	i--;
	var div2 = document.getElementById(i);
	div2.style.display = "block";
}

