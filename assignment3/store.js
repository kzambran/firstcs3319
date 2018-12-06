window.onload=function(){
	prepareListener;
}
function prepareListener(){
	var droppy;
	droppy=document.getElementById("pickastore");
	droppy.addEventListener("change", getArt);
}function getArt(){
	this.form.submit();
}