<?php
	class User extends Conexion{
		public $oldId;
		public $id;
		public $name;
		public $password;
		public $role;
		public $status;
  		public $institucionId;//Hasta aqui son los campos de la tabla
		public $fullName;
		public $email;
		public $address;
		public $phone;
		public $cargo;
		
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

		public function list(){
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
		
		public function load(){
			$this->sql ="SELECT * FROM users WHERE id=?";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->execute();				
				$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
				return $datos;
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function add(){
			$this->sql ="INSERT INTO users(id, password, name, role, status, institucionId) VALUES(?,?,?,?,?,?)";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->bindParam(2,$this->password);
				$stm->bindParam(3,$this->name);
				$stm->bindParam(4,$this->role);
				$stm->bindParam(5,$this->status);
				$stm->bindParam(6,$this->institucionId);
                return $stm->execute();
			} catch (Exception $e) {
                return false;
			}
		}

		public function update(){
			$this->sql ="UPDATE `users` SET id=?, `role`=?, `name`=?, `status`=?, `password`=? WHERE `id` = ?";
			
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->bindParam(2,$this->role);
				$stm->bindParam(3,$this->name);
				$stm->bindParam(4,$this->status);
				$stm->bindParam(5,$this->password);
				$stm->bindParam(6,$this->oldId);
				return $stm->execute();
			} catch (Exception $e) {
				return false;
			}
		}

		public function disabled(){
			$this->sql ="UPDATE t_users SET status = 2 WHERE id_name = '".$this->id."' ";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function delete(){
			$this->sql ="DELETE FROM users WHERE id= ?";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				return $stm->execute();
			} catch (Exception $e) {
				return false;
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