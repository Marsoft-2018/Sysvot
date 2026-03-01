
const urlCandidates= "../controlador/ctrlCandidatos.php";
async function newCandidate(candidateType){
  document.getElementById("footerModal").innerHTML = "";
  document.getElementById("bodyForm").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
    try {    
    const res = await axios.post(urlCandidates,{accion:"new", candidateType: candidateType}).then(function(res){
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Nuevo candidato";
            document.getElementById("bodyForm").innerHTML = res.data;
            $('#show-hide-candidate').DataTable({
                responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
                },
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.3.7/i18n/es-ES.json',
                }
            });

        } else {
        alert('Error generando el formulario: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}

async function indexCandidates(){
    document.getElementById("principal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
    try {    
    const res = await axios.post(urlCandidates,
      {accion:"load"}).then(function(res){
        if (res.data) {
            document.getElementById("principal").innerHTML = res.data;
            $('#show-hide-res').DataTable({
                responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
                }
            });
        } else {
        alert('Error generando el listado: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}

async function addCandidates(){
  document.getElementById("footerModal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
  const form = document.getElementById("formularioSeleccionCandidatos");
  const formData = new FormData(form);

  formData.append("accion", "add");

  try {
    const response = await axios.post(urlCandidates, formData, {
        headers: {
            "Content-Type": "multipart/form-data"
        }
    });
    Swal.fire({
      text: response.data.mensaje,
      icon: response.data.icono,
      position: 'top-end', // Cambia la posición (top, top-end, bottom, etc.) [1]
      toast: true, // Opcional: estilo tipo toast
      showConfirmButton: false,
      timer: 5000,
      // Asegura que esté por encima del backdrop del modal
      customClass: {
        container: 'swal-override'
      },
      didOpen: (toast) => {
        // Asegurar z-index superior al del modal de bootstrap (normalmente 1050+)
        toast.parentElement.style.zIndex = '9999'; 
      },
      animation: true
    });
    indexCandidates();
    document.getElementById("footerModal").innerHTML ="";
  } catch (error) {
      console.error(error);
  }
}

async function editCandidate(id){
  document.getElementById("footerModal").innerHTML = "";
    try {    
    const res = await axios.post(urlCandidates,{accion:"edit",id:id}).then(function(res){
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Editar candidato";
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

async function updateCandidate(oldId){
  document.getElementById("footerModal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
  try {       
      id = document.getElementById("id").value;
      firstName = document.getElementById("firstName").value;
      secondName = document.getElementById("secondName").value;
      firstLastName = document.getElementById("firstLastName").value;
      secondLastName = document.getElementById("secondLastName").value;
      grade = document.getElementById("grade").value;
      group = document.getElementById("group").value;
      gender = document.getElementById("gender").value;
    const res = await axios.post(urlCandidates,
        {accion:"update",
          oldId: oldId,  
          id:id,
          firstName:firstName,
          secondName:secondName,
          firstLastName:firstLastName,
          secondLastName:secondLastName,
          grade:grade,
          group:group,
          gender:gender
        }
      ).then(function(res){
        if (res.data) {           
                    Swal.fire({
              title: "¡Hecho!",
              text: "El candidato se guardó satisfactoriamente",
              icon: "success",
              allowOutsideClick: false, 
              timer: 1500,
              showConfirmButton: false
          }).then(() => {
            indexCandidate();
          }); 

        } else {
        alert('Error al tratar de actualizar el registro: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
    alert('Error al generar PDF. Asegúrate de tener DOMPDF instalado y configurado.');
  }
}

function deleteCandidate(id){
  Swal.fire({
        title: "Eliminar candidato",
        text: "¿Deseas continuar con la eliminación del candidato?, recuerda que eliminar un candidato puede eliminar sus votos",
        icon: "error",
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
            axios.post(urlCandidates, {
                accion: "delete",
                id: id
            })
            .then(response => {
                Swal.fire({
                    title: response.data,
                    allowOutsideClick: false, 
                    icon: "success",        
                    preConfirm: () => {
                        indexCandidates();
                    }
                });// fin de swal
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });//fin axios 1           
        }
    });
}

async function newCandidateStep2(candidateType){

  let contenedor = document.querySelector("#bodyForm"); 
    // o el ID real donde están los checkbox

    let seleccionados = [];

    contenedor.querySelectorAll(".chk-candidato:checked:not(:disabled)").forEach(chk => {
        seleccionados.push(chk.value);
    });

    console.log(seleccionados);

    if (seleccionados.length === 0) {
      Swal.fire({
        title: 'Sin datos!',
        text: 'Seleccione al menos un candidato',
        icon: 'error',
        position: 'top-end', // Cambia la posición (top, top-end, bottom, etc.) [1]
        toast: true, // Opcional: estilo tipo toast
        showConfirmButton: false,
        timer: 5000,
        // Asegura que esté por encima del backdrop del modal
        customClass: {
          container: 'swal-override'
        },
        didOpen: (toast) => {
          // Asegurar z-index superior al del modal de bootstrap (normalmente 1050+)
          toast.parentElement.style.zIndex = '9999'; 
        },
        animation: true
      });
      return;
    }
    document.getElementById("footerModal").innerHTML = "";
    document.getElementById("bodyForm").innerHTML = `<div class="d-flex justify-content-center">
    <div class="spinner-border text-primary m-5" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>`;
    try {    
    const res = await axios.post(urlCandidates,{accion:"newStep2", candidateType: candidateType,candidates:seleccionados}).then(function(res){
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Nuevo candidato paso 2";
            document.getElementById("bodyForm").innerHTML = res.data;
            


        } else {
        alert('Error generando el formulario: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
  }
}

function activarPreviewImagen(input,id) {
  const file = input.files[0];
  if (!file) return;

  if (!file.type.startsWith("image/")) {
    Swal.fire({
      title: 'Imagen no válida!',
      text: 'Seleccione una imagen válida',
      icon: 'error',
      position: 'top-end', // Cambia la posición (top, top-end, bottom, etc.) [1]
      toast: true, // Opcional: estilo tipo toast
      showConfirmButton: false,
      timer: 5000,
      // Asegura que esté por encima del backdrop del modal
      customClass: {
        container: 'swal-override'
      },
      didOpen: (toast) => {
        // Asegurar z-index superior al del modal de bootstrap (normalmente 1050+)
        toast.parentElement.style.zIndex = '9999'; 
      },
      animation: true
    });
    input.value = "";
    return;
  }

  if (file.size > 2 * 1024 * 1024) {
    Swal.fire({
      title: 'Imagen no válida!',
      text: 'La imagen no debe superar 2MB',
      icon: 'error',
      position: 'top-end', // Cambia la posición (top, top-end, bottom, etc.) [1]
      toast: true, // Opcional: estilo tipo toast
      showConfirmButton: false,
      timer: 5000,
      // Asegura que esté por encima del backdrop del modal
      customClass: {
        container: 'swal-override'
      },
      didOpen: (toast) => {
        // Asegurar z-index superior al del modal de bootstrap (normalmente 1050+)
        toast.parentElement.style.zIndex = '9999'; 
      },
      animation: true
    });
    
    input.value = "";
    return;
  }

  const reader = new FileReader();

  reader.onload = function(e) {
      const preview = document.getElementById("preview-" + id);
      preview.src = e.target.result;
      preview.style.display = "block";
  };

  reader.readAsDataURL(file);
}
