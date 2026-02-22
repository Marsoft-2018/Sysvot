function Voto1Hecho(idCandidato,codest,candidatoNumeroTarjeton){
    Swal.fire({
        title: "CONFIRMA TU VOTO",
        text: "¿Está seguro de votar por el candidato # "+candidatoNumeroTarjeton+"?",
        icon: "info",
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: "#216F21",
        cancelButtonColor: "#d33",
        confirmButtonText: `
          <i class="fa fa-thumbs-up"></i> Si
        `,
        cancelButtonText: `
          <i class="fa fa-thumbs-down"></i> No
        `,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post('../controlador/ctrlVotos.php', {
                accion: "RegistrarVoto",
                idcandidato: idCandidato,
                idest: codest,
                tipo: "Personero"
            })
            .then(response => {
                Swal.fire({
                    title: "¡Listo voto Hecho! Ahora vas a elegir al contralor",
                    allowOutsideClick: false, 
                    icon: "success",        
                    preConfirm: () => {
                        axios.post('votos/tarjetonContralor.php', { idest: codest })
                        .then(response => {
                            document.getElementById('principal').innerHTML = response.data;
                        })
                        .catch(error => {
                            console.error('Error en la solicitud:', error);
                        });//fin axios 2
                        
                    }
                });// fin de swal
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });//fin axios 1           
        }
    });
}

function VotoHecho(idCandidato,codest,candidatoNumeroTarjeton){
    Swal.fire({
        title: "CONFIRMACIÓN",
        text: "¿Está seguro de votar por el candidato # "+candidatoNumeroTarjeton+"?",
        icon: "warning",
        showCancelButton: true,
        allowOutsideClick: false, 
        confirmButtonColor: "#216F21",
        cancelButtonColor: "#DD6B55",
        confirmButtonText: `
          <i class="fa fa-thumbs-up"></i> Si
        `,
        cancelButtonText: `
          <i class="fa fa-thumbs-down"></i> No
        `,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post("../controlador/ctrlVotos.php", {
                accion: "RegistrarVoto",
                idcandidato: idCandidato,
                idest: codest,
                tipo: "Contralor"
            })
            .then(response => {
                Swal.fire({
                    title: "¡Hecho!",
                    text: "Su voto ha sido registrado. Gracias por usar SISVOT.",
                    icon: "success",
                    allowOutsideClick: false, 
                    timer: 3500,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '../index.php';
                });
            })
            .catch(error => {
                Swal.fire("Error", "Hubo un problema al registrar el voto.", "error");
                console.error("Error en la solicitud:", error);
            });
        } else {
            Swal.fire({
                title: "¡Voto Cancelado!",
                text: "Puede volver a elegir si lo desea...",
                icon: "info",
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                document.getElementById("bloquear").style.display = 'none';
            });
        }
    });
}

function logear() {
    const form = document.getElementById('frmLogin');
    const formData = new FormData(form);

    axios.post('controlador/ctrlValidacion.php', formData)
        .then(response => {
            const data = response.data;            
            if (data["status"] == 1) {
                window.location = "vistas/main.php";
            } else {
                window.location = "vistas/no_auto.php";                 
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
    
    return false;
}

function administrar(pagina) {
    document.getElementById("principal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
    const accion = 'cargar';

    axios.post("../controlador/ctrl" + pagina + ".php", new URLSearchParams({ accion: accion }))
        .then(response => {
            document.getElementById("principal").innerHTML = response.data;
            if(pagina =='Alumnos'){
                // [ Immediately Show Hidden Details ]
                $('#show-hide-res').DataTable({
                    responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: ''
                    }
                    }
                });
            }
            // if (typeof $('.dataTable').DataTable === 'function') {
            //     $('.dataTable').DataTable();
            // }
        })
        .catch(error => {
            console.error(error);
        });
}


function cerrar(){
	var ventanac = document.getElementById("vent");
	ventanac.style.display="none";	
}

function abrir(){
	var ventanac = document.getElementById("vent");
	ventanac.style.display="block";	
}
function foto(archivo){
	alert ("La foto seleccionada es: "+archivo);	
}

function cambiarFoto2(id){     
    var datosFormulario = new FormData(document.getElementById('cambioFoto'));
    datosFormulario.append('accion','cambiarFotoEstudiante');
    $.ajax({
        url:'Config/ajustesSedes.php',
        type:'post',
        data:datosFormulario,
        cahe:false,
        contentType:false,
        processData:false
    }).done(function(respuesta){
        alertify.error('La funcion cambio de foto falló por un error desconocido');
       $("#mostrarMensajeImagen").html(respuesta);
    });
}//No funciona problema con elevento onsubmit del formulario


function contarVotos(op) {
    console.log("Opcion: " + op);
    document.getElementById("principal").innerHTML = "";

    var accion = "contar";
    if (op == 2) {
        accion = "Abstencion";
    }
    
    if (op == 3) {
        accion = "Participacion";
    }

    axios.post('../controlador/ctrlVotos.php', {accion: accion})
    .then(function(response) {
        document.getElementById("principal").innerHTML = response.data;
    })
    .catch(function(error) {
        console.log('Error: ' + error);
    });
}

function tarjetonPdf(op) {
    let apiPdf= "";
    if(op == 1){
        apiPdf = '../vistas/votos/reportes/tarjetonPdf.php';
    }else if(op == 2){
        apiPdf = '../vistas/votos/reportes/tarjetonPersoneroPdf.php';
    }else if(op == 3){
        apiPdf = '../vistas/votos/reportes/tarjetonContralorPdf.php';
    }
  try {    
    const res =  axios.post(apiPdf).then(function(res){
        console.log(res.data.status);
        if (res.data && res.data.status === 'success') {
        const url = res.data.url;
        window.open(url, '_blank');
        } else {
        alert('Error generando PDF: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}


function actaPdf(op) {
    let apiPdf= "";
    if(op == 1){
        apiPdf = '../vistas/votos/reportes/actaFinal.php';
    }else if(op == 2){
        
    }else if(op == 3){
       
    }
  try {    
    const res =  axios.post(apiPdf).then(function(res){
        console.log(res.data.status);
        if (res.data && res.data.status === 'success') {
        const url = res.data.url;
        window.open(url, '_blank');
        } else {
        alert('Error generando PDF: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}

function alerta(){
    Swal.fire({
      title: ' ',
        html:   '<div style="text-align:left;font-size:1.5em;line-height: 3em;padding:10px;">'+
                'Autor:<br>Ing. Jose Alfredo Tapia Arroyo.<br>' +
                '</div>',
      imageUrl: 'image/Sisvot_P.png',
      imageWidth: 400,
      imageHeight: 200,
      animation: true
    })
}

function controlVotacion(estado) {
    var accion = "controlVotacion";
    
    axios.post('../controlador/ctrlVotos.php', {
        accion: accion,
        estado: estado
    })
    .then(function(response) {
        Swal.fire({
            title: "¡Hecho!",
            text: '' + response.data,
            timer: 3500,     
            type: 'success'
        });
    })
    .catch(function(error) {
        console.log('Error: ' + error);
    });
}