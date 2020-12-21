<?php
// СУПЕРГЛОБАЛЬНЫЙ МАССИВ - $_GET  - доступен на всем вашем домене
//$name=$_GET['name'];
//$country=$_GET['country'];
//$city=$_GET['city'];
//echo "Name is: $name <br>";
//echo "Country is: $country <br>";
//echo "City is: $city <br>";

?>

<form action=""method="get">
    <label for="name">Your name:
        <input type="text" name="name" id="name">
    </label>
    <label for="country">Your country:
        <input type="text" name="country" id="country">
    </label>
    <label for="city">Your city:
        <input type="text" name="city" id="city">
    </label>
    <input type="submit" value="Send">
</form>

<?php
echo "<h1> your input name is =".$_GET['name']."</h1>";
