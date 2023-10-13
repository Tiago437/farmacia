	function showdia(i){

		var dia=document.getElementById("diario");
		var mes=document.getElementById("mensal");
		var ano=document.getElementById("anual");

		switch(i){
		case 1:
		document.getElementById("diario").removeAttribute("hidden");
		mes.setAttribute("hidden","hidden");
		ano.setAttribute("hidden","hidden");
		break;
		case 2:
		document.getElementById("mensal").removeAttribute("hidden");
		dia.setAttribute("hidden","hidden");
		ano.setAttribute("hidden","hidden");
		break;
		case 3:
		document.getElementById("anual").removeAttribute("hidden");
		mes.setAttribute("hidden","hidden");
		dia.setAttribute("hidden","hidden");
		break;
	}

		
	}