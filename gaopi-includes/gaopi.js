function $(i) {
	return document.getElementById(i);
}

function toggleHide(e) {
	b=e.parentNode;
	if(b.className=="Hidden") {
		b.className="";
		$("textContent").className="";
		e.innerHTML="&lt;";
		if($("startDiapo")) {
			$("startDiapo").style.display="";
		}
	} else {
		b.className="Hidden";
		$("textContent").className="Hidden";
		e.innerHTML="&gt;";
		if($("startDiapo")) {
			$("startDiapo").style.display="none";
		}
	}
}

function toggleDiapo() {
	if($("diapo").style.display=="block") {
		$("diapo").style.display="";
		$("diapoControls").style.display="";
		goToDiapo(0);
	} else {
		$("diapo").style.display="block";
		$("diapoControls").style.display="block";
	}
}

function goToDiapo(n) {
	$("diapo").style.top=(0-(100*n))+"%";
	currentn=n;
	$("diapoProgress").innerHTML=currentn+1;
}
var nofd=0;
var currentn=0;
function countDiapos() {
	var diapos=$("diapo").getElementsByTagName("div");
	for(var i=0;i<diapos.length;i++) {
		if(diapos[i].className=="diapo") {
			nofd++;
		}
	}
	$("nofd").innerHTML=nofd;
}
function previousDiapo() {
	if(!currentn) {
		currentn=nofd-1;
	} else {
		currentn--;
	}
	goToDiapo(currentn);
}
function nextDiapo() {
	if(currentn==(nofd-1)) {
		currentn=0;
	} else {
		currentn++;
	}
	goToDiapo(currentn);
}