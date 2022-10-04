function checkForm(){
	lejosTotal = document.getElementById("lejos_total").value;
	lejosSenha = document.getElementById("lejos_senha").value;

	cercaTotal = document.getElementById("cerca_total").value;
	cercaSenha = document.getElementById("cerca_senha").value;

	biMultiTotal = document.getElementById("bi_multi_total").value;
	biMultiSenha = document.getElementById("bi_multi_senha").value;

	if(lejosTotal > 0 && lejosSenha > 0){
		document.getElementById("lejos_saldo").value = lejosTotal - lejosSenha;
	}else{
		if(lejosSenha == 0){
			document.getElementById("lejos_saldo").value = "";
		}
	}

	if(cercaTotal > 0 && cercaSenha > 0){
		document.getElementById("cerca_saldo").value = cercaTotal - cercaSenha;
	}else{
		if(cercaSenha == 0){
			document.getElementById("cerca_saldo").value = "";
		}
	}

	if(biMultiTotal > 0 && biMultiSenha > 0){
		document.getElementById("bi_multi_saldo").value = biMultiTotal - biMultiSenha;
	}else{
		if(biMultiSenha == 0){
			document.getElementById("bi_multi_saldo").value = "";
		}
	}
}