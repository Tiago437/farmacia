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

	const cadForm = document.getElementById("formcad");

	if(cadForm){
		cadForm.addEventListener("submit", async (e) =>{
			e.preventDefault();

			const dadosForm = new FormData(cadForm);

			const dados=await fetch("cadastrar.php", {
				method: "POST",
				body: dadosForm
			})

			const resposta=await dados.json();
			console.log(resposta);

if(resposta['status']) {
 Swal.fire({
  position: 'top',
  icon: 'success',
  title: resposta['msg'],
  showConfirmButton: false,
  timer: 1500
})
 setInterval(function() {window.open("additem.php","_self")},2000);
 }else{
 Swal.fire({
  position: 'top',
  icon: 'error',
  title: resposta['msg'],
  showConfirmButton: false,
  timer: 1500
  })

}

});

}