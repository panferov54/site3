<?php
class Tools{
   static public function connect($host="localhost:8889",$user="root",$pass="root",$dbname="shop"){

      //PDO(PHP data object)- механизм взаимодействия с СУБД
       //ПДО позволяет облегчить рутинные задачи при выполнение запросов и содержит защитные механизмы при работе с субд


       //определим DSN - сведения для подключения к БД
        $cs="mysql:host=$host;dbname=$dbname;charset=utf8";
        //массив опций для создания PDO
       $option=[
           PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
           PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
       ];


       try {
           $pdo=new PDO($cs,$user,$pass,$option);
           return $pdo;

       }catch (PDOException $e){
           echo $e->getMessage();
           return false;
       }
    }
};

class Customer {
    public $id;
    public $login;
    public $pass;
    public $roleid;
    public $discount;
    public $total;
    public $imagepath;

    function __construct($login,$pass,$imagepath,$id=0){
        $this->login=trim($login);
        $this->pass=trim($pass);
        $this->imagepath=$imagepath;
        $this->id=$id;

        $this->total=0;
        $this->discount=0;
        $this->roleid=2;
    }

    function register(){
        if ($this->login===''||$this->pass===''){
            echo '<h3 class="text-danger">заполните все поля</h3>';
            return false;
        }
        if (strlen($this->login)<3||strlen($this->login)>32||strlen($this->pass)>64){
            echo "<h4 class='text-danger'>не корректрна длина полей</h4>";
            return false;

        }
$this->intoDb();
        return true;

    }

    function intoDb(){
        try {
            $pdo=Tools::connect();
            //подготовим запрос на добавление польхователя
            $ps=$pdo->prepare("INSERT INTO customers(login,pass,roleid,discount,total,imagepath) values (:login,:pass,:roleid,:discount,:total,:imagepath)");
           //разименовывание объекта this и преобразование к массиву
           $ar=(array)$this;
           array_shift($ar);//удаляем первый элемент массива
        $ps->execute($ar);

        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
};

class Item {
    public $id;
    public $itemname;
    public $catid;
    public $pricein;
    public $pricesale;
    public $info;
    public $rate;
    public $imagepath;
    public $action;

    function __construct($itemname,$catid,$pricein,$pricesale,$info,$imagepath,$rate=0,$action=0,$id=0)
    {
        $this->id=$id;
        $this->itemname=$itemname;
        $this->catid=$catid;
        $this->pricein=$pricein;
        $this->pricesale=$pricesale;
        $this->info=$info;
        $this->rate=$rate;
        $this->imagepath=$imagepath;
        $this->action=$action;
    }

    function intoDb(){

        try {
            $pdo=Tools::connect();
            $ps=$pdo->prepare("insert into items(itemname,catid,pricein,pricesale,info,rate,imagepath,action) values (:itemname,:catid,:pricein,:pricesale,:info,:rate,:imagepath,:action)");
        $ar=(array)$this;
            array_shift($ar);
            $ps->execute($ar);
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    static function fromDb($id){
        try {
            $pdo=Tools::connect();
            $ps=$pdo->prepare("select * from items where id=?");
        $ps->execute([$id]);
        $row=$ps->fetch();
        $item= new Item($row['itemname'],$row['catid'],$row['pricein'],$row['pricesale'],$row['info'],$row['imagepath'],$row['rate'],$row['action'],$row['id']);
     return $item;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //метод формирования списка товаров
  static function getItems($catid=0){
       try {
           $pdo=Tools::connect();
          //если категория не выбрана, то показываем все товары
           if ($catid===0){
               $ps=$pdo->query("select * from items");

           } else {
               //если catid есть, то фильтруем по нему
               $ps=$pdo->prepare("select * from items where catid=?");
               $ps->execute([$catid]);
           }
           while ($row=$ps->fetch()){
               $item= new Item($row['itemname'],$row['catid'],$row['pricein'],$row['pricesale'],$row['info'],$row['imagepath'],$row['rate'],$row['action'],$row['id']);
              //создаем массив экземпляров класса Item
               $items[]=$item;
           }
           return $items;
       }catch (PDOException $e){
           echo $e->getMessage();
           return false;
       }

   }

    //  метод отрисовки товаров
    function drawItem(){
        echo '<div class="col-sm-6 col-md-3  item-card m-3 bg-info text-white box-shadow" style="border-radius: 40px;" id="divItem">';
        //шапка товара
echo '<div class="m-1 bg-dark">';
echo "<a href='pages/iteminfo.php?name={$this->id}' target='_blank' class='m-2 float-left text-white'>$this->itemname</a>";
echo "<span class='mr-2 float-right'>$this->rate</span>";
        echo '</div>';
        //изображение товара
        echo '<div class="mt-4 item-card__img">';
echo "<img src='{$this->imagepath}' alt='image' class='img-fluid' style='max-height: 400px'>";
        echo '</div>';
        //цена товара
        echo '<div class="mt-1 item-card__price bg-warning w-50 text-center" style="border-radius: 45px">';
      echo "<span class='lead text-white'>$this->pricesale $</span>";
        echo '</div>';
        //описание товара
        echo '<div class="mt-1 item-card__info ">';
        echo '<h6>Описание товара:</h6>';

        echo '<p class="float-left">&quot;</p>';

        echo "<span class='lead '> $this->info </span>";

        echo '<br>';
        echo '<p class="float-right">&quot;</p>';
        echo '</div>';
        //кнопка добавления в корзину
        echo '<div class="mt-3 text-center ">';
       // $ruser="cort_";
        $ruser='cart_'.$this->id;
        echo "<button class='btn btn-primary btn-lg w-75 btn-block mb-3 mx-auto' data-toggle='modal' data-target='#productAdd' onclick=createCookie('".$ruser."','".$this->id."') style='white-space: normal;'>Добавить в корзину</button>" ;

        echo '</div>';


        echo '</div>';
    }
function drawItemCart(){
        echo '<div class="row m-2 bg-light" style="border-radius: 40px;">';
echo "<span class='col-1 ml-3 mt-2'>$this->id</span>";
    echo "<img src='{$this->imagepath}' alt='image' class='col-1 img-fluid'>";
    echo "<span class='col-3'>$this->itemname</span>";
    echo "<span class='col-3'>$this->pricesale $</span>";
    $ruser='cart_'.$this->id;

    echo "<button class='btn btn-danger text-uppercase my-auto' onclick=eraseCookie('".$ruser."') style='max-height: 100px'>удалить</button>";
    echo '</div>';
}
static function addCategory(){
    try {

        $pdo=Tools::connect();
        $catval=$_POST['addcat'];
        $ps=$pdo->prepare("insert into categories(category) VALUES (?)");

        $ps->execute($catval);

        echo '<script>location.href=location.href;</script>';
    }catch (PDOException $e){
        echo $e->getMessage();
        return false;
    }
}
function sale(){
    try {
        $pdo=Tools::connect();
        $upd="update customers set total=total+? where login=?";
        $ps=$pdo->prepare($upd);
        $login='admin';
        $ps->execute([$this->pricesale,$login]);
        //добавиьт записть в таблицу
        $ins="insert into sales(customername,itemname,pricein,pricesale,datasale) values(?,?,?,?,?)";
        $ps=$pdo->prepare($ins);
        $ps->execute([$login,$this->itemname,$this->pricein,$this->pricesale,@date("Y/m/d H:i:s")]);
        return $this->id;

    }catch (PDOException $e){
        echo $e->getMessage();
        return false;
    }
}
static function SMTP($id_result){
        require_once ("PHPMailer/PHPMailerAutoload.php");
        $mail=new PHPMailer;
        //настройка протокола SMTP
        $mail->CharSet="UTF-8";
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Host='smtp.gmail.com';
        $mail->Port=465;
        $mail->Username=MAIL;
        $mail->Password=PASS;
}

}

class Category {
    public $id;
    public $category;

    function __construct($category, $id=0)
    {
        $this->id = $id;
        $this->category = $category;
    }

    function intoCategory() {
        try {
            $pdo = Tools::connect();
            $ps =$pdo->prepare("INSERT INTO categories(category) VALUES (:category)");
            $ar =(array)$this;
            array_shift($ar);
            $ps->execute($ar);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}