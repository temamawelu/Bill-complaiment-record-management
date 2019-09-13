
<?php
$k="foo*bar*baz";
if(preg_match('/(foo)\*(bar)\*(baz)/', $k, $matches)){
	print_r($matches);
echo$matches[0]."<br>";
echo$matches[1]."<br>";
echo$matches[2]."<br>";
echo$matches[3]."<br>";
}else{
	echo "sorry bra";
}
/*
$my_email = "taveeeeee*gmail*com";
if (preg_match("/^[a-zA-Z._-]+\*[a-zA-Z-]+\*[a-zA-Z.]{2,5}$/", $my_email)){
$match=split('\*', $my_email);
	echo'<pre>';
	print_r($my_email);exit;
	//echo $match[0];
}

else
{
  echo "$my_email is NOT a valid email address";
}*/

echo "<br>";
// repérer le nom de l'hôte dans l'URL
preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.php.net/index.html", $matches);
$host = $matches[1];

// repérer les deux derniers segments du nom de l'hôte
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "Le nom de domaine est : {$matches[0]}\n";

echo "<br>";
$my_text="I-Love-You";

$my_array  = preg_split("/ (I)\-(Love)\-(You)/", $my_text);

        echo$my_array[0];echo "<br>";
        echo$my_array[1];echo "<br>";
        echo$my_array[2];echo "<br>";
       
print_r($my_array );
echo "<br>";


$date="2012-09-12";
$aa=preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
if ($aa) {
  
        echo$date[0];
    }else{
         echo"sss";
    }
echo "<br>";

    $my_email = "name@company@com";
    $ax=preg_match("/^[a-zA-Z]+@[a-zA-Z-]+@[a-zA-Z]{2,5}$/", $my_email,$m);
if ($ax) {
	echo$m[1];echo "<br>";
	echo$m[1];echo "<br>";echo$m[2];echo "<br>";echo$m[3];echo "<br>";
echo "$my_email is a valid email address";
}
else
{
  echo "$my_email is NOT a valid email address";
}


?>