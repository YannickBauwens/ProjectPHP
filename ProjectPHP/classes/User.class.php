<?php

    include_once ("includes/db.inc.php");

    class User{
        private $m_sFirstname;
        private $m_sLastname;
        private $m_sEmail;
        private $m_sPassword;

        public function getMSFirstname()
        {
            return $this->m_sFirstname;
        }

        public function setMSFirstname($m_sFirstname)
        {
            $this->m_sFirstname = $m_sFirstname;
        }

        public function getMSLastname()
        {
            return $this->m_sLastname;
        }

        public function setMSLastname($m_sLastname)
        {
            $this->m_sLastname = $m_sLastname;
        }

        public function getMSEmail()
        {
            return $this->m_sEmail;
        }

        public function setMSEmail($m_sEmail)
        {
            $this->m_sEmail = $m_sEmail;
        }

        public function getMSPassword()
        {
            return $this->m_sPassword;
        }

        public function setMSPassword($m_sPassword)
        {
            $this->m_sPassword = $m_sPassword;
        }

        public function Register(){
            global $conn;

            $statement = $conn->prepare("INSERT INTO User(firstname, lastname, email, password) 
                                         VALUES (:firstname, :lastname, :email, :password)");
            $statement->bindValue(":firstname", $this->getMSFirstname());
            $statement->bindValue(":lastname", $this->getMSLastname());
            $statement->bindValue(":email", $this->getMSEmail());
            $statement->bindValue(":password", $this->getMSPassword());

            $options = [
                'cost'=> 12
            ];
            $password = password_hash($this->getMSPassword(), PASSWORD_DEFAULT, $options);
            $statement->bindValue(":password", $password);
            $statement->execute();

            $_SESSION['email'] = $this->getMSEmail() ;
        }

        public function Login(){
            global $conn;

            $p_password = $this->getMSPassword();

            $statement = $conn->prepare("SELECT * FROM User where email = :email LIMIT 1");
            $statement->execute( array( ":email"=>$this->getMSEmail() ) );

            if($statement->rowCount() == 1)
            {
                $currentUser = $statement->fetch(PDO::FETCH_ASSOC);
                $hash = $currentUser['password'];
                $_SESSION['email'] = $currentUser['email'];

                if ( password_verify($p_password, $hash)) {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function checkIfUserExists(){
            $db = new Db();
            $conn = $db->connect();
            $data = $conn->query("SELECT * FROM users WHERE id = ". $this->Id);
            if($data->rowCount() == 0){
                return false;
            }else{
                return true;
            }
        }

    }