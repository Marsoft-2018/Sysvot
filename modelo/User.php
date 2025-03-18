<?php
	class User extends Conexion{
		public $id;
		public $name;
		public $password;
		public $fullName;
		public $email;
		public $address;
		public $phone;
		public $cargo;
		public $role;
		public $status;
		
		private $sql;

		public function login() {
			$con = 0;
			$this->sql = "SELECT * FROM students Where id= ? AND `password` = ? AND status='No ha votado'";
			$datos = array();
            $datos['status'] = [0];

			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindparam(1, $this->id);
				$stm->bindparam(2, $this->password);
				$stm->execute();
				$num = $stm->fetchAll(PDO::FETCH_ASSOC);
				foreach ($num as $key => $value) {
					$_SESSION['institucion'] = $value['institucionId'];
					$_SESSION['id'] = $value['id'];
					$_SESSION['fullName'] = $value['firstName']." ".$value['secondName']." ".$value['firstLastName']." ".$value['secondLastName'];
					$_SESSION['role'] = $value['role'];
            		$datos['status'] = [1];
            		$con = 1;
				}

				if($con == 0){					
					$this->sql = "SELECT * FROM users WHERE id = ? AND password = ? AND status = 'Activo'";
					try {
						$stm = $this->Conexion->prepare($this->sql);
						$stm->bindParam(1, $this->id);
						$stm->bindParam(2,$this->password);
						$stm->execute();
						$num = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($num as $value) {
							$_SESSION['institucion'] = $value['institucionId'];
							$_SESSION['id'] = $value['id'];
							$_SESSION['fullName'] = $value['name'];
							$_SESSION['role'] = $value['role'];
            				$datos['status'] = [1];
						}
					} catch (Exception $e) {
						echo "Error en la validacion. ".$e;
					}
				}
				return $datos;
			} catch (Exception $e) {
				echo "Error en la validacion. ".$e;
			}

			if($con == 0){
				return false;
			}
		}

		public function listar(){
			$this->sql ="SELECT * FROM users ORDER BY id";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();				
				$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
				return $datos;

			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function agregar(){
			$this->sql ="INSERT INTO t_users(name, password, role, fullName, email, address, phone, cargo) VALUES(?,?,?,?,?,?,?,?)";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->bindParam(2,$this->password);
				$stm->bindParam(3,$this->role);
				$stm->bindParam(4,$this->fullName);
				$stm->bindParam(5,$this->email);
				$stm->bindParam(6,$this->address);
				$stm->bindParam(7,$this->phone);
				$stm->bindParam(8,$this->cargo);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function actualizar(){
			if ($this->role == "Profesor") {
				$this->sql ="UPDATE profesores SET name=?, email=?, address=?, phone=? WHERE id = '".$this->id."' AND status = 1";
			}elseif($this->role == "Administrador"){
				$this->sql ="UPDATE t_users SET name=?, role=?, fullName=?, email=?, address=?, phone=?, cargo=? WHERE id_name = '".$this->id."' AND status = 1";		
			}

			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->bindParam(2,$this->role);
				$stm->bindParam(3,$this->fullName);
				$stm->bindParam(4,$this->email);
				$stm->bindParam(5,$this->address);
				$stm->bindParam(6,$this->phone);
				$stm->bindParam(7,$this->cargo);
				$stm->execute();
				echo "Se guardaron los datos con éxito, debe reiniciar la sesión para que tengan efecto";
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function desactivar(){
			$this->sql ="UPDATE t_users SET status = 2 WHERE id_name = '".$this->id."' ";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function eliminar(){
			$this->sql ="DELETE FROM t_users WHERE id= ?";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function setDatos($us, $pass){
			$this->id = $us;
			$this->password = SED::encryption($pass);
		}

		public function validarActivacion(){
			require ("Institucion.php");
			$obj = new Institucion();
			return $obj->validarActivacion($_SESSION['role']);
		}

	}
// 	include ("../Controleadores/encript.php");	
// 	 $objUsu = new fullName_User();
// 	 $objUsu->setDatos('Admin','123456');
// 	 $objUsu->login();

// 	$objUsu->validarActivacion();
// ?>