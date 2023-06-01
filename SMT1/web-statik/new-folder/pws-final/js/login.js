function login () {
	var x = "election";
	var z = 3 ;
	var username = prompt("masukan username : ");
	while (username){
		var password = prompt("masukan sandi : \nAnda memiliki "+ z +" kali kesempatan");
		if (password == x) {
			window.open("index.html");
			}
		if (z == 1) {
			break;}
		z--;
	}
	alert("akun anda kami blokir");
}