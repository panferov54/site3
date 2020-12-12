<?php
class User{
    private $gender;
    public function setGender($gender){
        //делаем валидацию данных
        if($gender!=='male' and $gender!=='female'){
          throw new Exception('Selectet Male or Female');
        }
        $this->gender=$gender;
    }
    public function getGender(){
return "Your gender is : ".$this->gender;
    }
}
$user=new User;
//$user->gender='mail';

//зададим значение через сеттер
$user->setGender('female');
echo $user->getGender();