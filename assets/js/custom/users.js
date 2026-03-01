const urlUser= "../controlador/ctrlUsers.php";
async function newUser(){
  document.getElementById("footerModal").innerHTML = "";
    try {    
    const res = await axios.post(urlUser,{accion:"new"}).then(function(res){
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Nuevo usuario";
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

async function indexUsers(){
    document.getElementById("principal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
    try {    
    const res = await axios.post(urlUser,
      {accion:"load"}).then(function(res){
        if (res.data) {
            document.getElementById("principal").innerHTML = res.data;
        } else {
        alert('Error generando el listado: ' + (res.data.error || 'Desconocido'));
        }
    });
  } catch (err) {
    console.error(err);
  }
}

async function addUser(){
  document.getElementById("footerModal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
  try {    
      id = document.getElementById("id").value;
      name = document.getElementById("name").value;
      role = document.getElementById("role").value;
      status = document.getElementById("status").value;
      institucionId = document.getElementById("institucionId").value;
      password = document.getElementById("password").value;
    const res = await axios.post(urlUser,
        {accion:"add",
          id:id,
          name:name,
          role:role,
          status:status,
          institucionId:institucionId,
          password:password
        }
      ).then(function(res){
        if (res.data) { 
          Swal.fire({
              text: res.data.mensaje,
              icon: res.data.icono,
              allowOutsideClick: false, 
              timer: 1500,
              showConfirmButton: false
          }).then(() => {
            indexUsers(); 
            document.getElementById("footerModal").innerHTML = "";
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

async function editUser(id){
  document.getElementById("footerModal").innerHTML = "";
    try {    
    const res = await axios.post(urlUser,{accion:"edit",id:id}).then(function(res){
        if (res.data) {
            
            document.getElementById("modalTitle").innerHTML = "Editar usuario";
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

async function updateUser(oldId){
  document.getElementById("footerModal").innerHTML = `<div class="d-flex justify-content-center">
  <div class="spinner-border text-primary m-5" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>`;
  try {       
      id = document.getElementById("id").value;
      name = document.getElementById("name").value;
      role = document.getElementById("role").value;
      status = document.getElementById("status").value;
      institucionId = document.getElementById("institucionId").value;
      password = document.getElementById("password").value;
    const res = await axios.post(urlUser,
        {accion:"update",
          oldId: oldId,  
          id:id,
          name:name,
          role:role,
          status:status,
          institucionId:institucionId,
          password:password
        }
      ).then(function(res){
        if (res.data) {           
          Swal.fire({
              title: "¡Hecho!",
              text: res.data.mensaje,
              icon: res.data.icono,
              allowOutsideClick: false, 
              timer: 1500,
              showConfirmButton: false
          }).then(() => {
            indexUsers();
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


function deleteUser(id){
  Swal.fire({
        title: "Eliminar usuario",
        text: "¿Deseas continuar con la eliminación del usuario?",
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
            axios.post(urlUser, {
                accion: "delete",
                id: id
            })
            .then(res => {
                Swal.fire({
                    text: res.data.mensaje,
                    icon: res.data.icono,
                    allowOutsideClick: false, 
                    icon: "success",        
                    preConfirm: () => {
                        indexUsers();
                    }
                });// fin de swal
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });//fin axios 1           
        }
    });
}