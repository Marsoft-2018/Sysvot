async function newStudent(){
    const url= "../controlador/ctrlAlumnos.php";
    try {    
    const res = await axios.post(url,{accion:"new"}).then(function(res){
        console.log(res.data);
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Nuevo estudiante";
            document.getElementById("bodyForm").innerHTML = res.data;

        } else {
        alert('Error generando el formulario: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}

async function addStudent(){
    const url= "../controlador/ctrlAlumnos.php";
    document.getElementById("footerModal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
    try {    
    const res = await axios.post(url,{accion:"add"}).then(function(res){
        console.log(res.data);
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Nuevo estudiante";
            document.getElementById("bodyForm").innerHTML = res.data;

        } else {
        alert('Error generando el formulario: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}