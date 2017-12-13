function merci(button){
		alert("Merci d'avoir dit "+button.firstChild.data);
}

function bouger(balise){
	balise.style.left=Math.ceil(Math.random()*window.innerWidth);
	balise.style.top=Math.ceil(Math.random()*window.innerHeight);

}
