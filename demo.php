<!DOCTYPE html>
<html>
<head>
    <title>LinkedIn Login Integration</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
   
    </style>
    
</head>
<body>
<div class="container" style="margin-top:10px" >
<?php
//ini_set('display_errors', true);


    session_start();
    $config['base_url']             =   'http://demo.webtutplus.com/linkdin/auth.php';
    $config['callback_url']         =   'http://demo.webtutplus.com/linkdin/demo.php';
    $config['linkedin_access']      =   '751spmsdqg2wez';
    $config['linkedin_secret']      =   'lgx1Olpzqv7Q9u0h';
    include_once "linkedin.php";
   
    
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;
   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];
        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);
        $_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->access_token     =   unserialize($_SESSION['oauth_access_token']);
   }  
    # You now have a $linkedin->access_token and can make calls on behalf of the current member
    $xml_response = $linkedin->getProfile("~:(id,first-name,last-name,headline)");
   $xml_response1 = $linkedin->getProfile("~:(picture-url)");





    //echo '<pre>';
    //echo 'My Profile Info';
 //echo $xml_response; 
$pic=simplexml_load_string($xml_response1);// or die("Error: Cannot create object");
//print_r($pic);

$profile = simplexml_load_string($xml_response);




//print_r($profile);

$a = (string)$profile->id;
$b = (string)$profile->{'first-name'};
$c = (string)$profile->{'last-name'};
$d = (string)$profile->headline;





$url = (string)$pic->{'picture-url'};


?>
<h2 class="bg-info" style="text-align:center">Congrates You have logged in by Linkdin</h2>
<h3> First Name :- <?php echo $b; ?> </h3>
<h3> Last Name :- <?php echo $b; ?> </h3>
<p>  <?php echo $d; ?> </p>





<img src="<?php echo $url; ?>" />


<?php 
echo '<br />';
echo '</pre>';



echo '<h2 class="bg-success" style="text-align:center">'.'Users who used our  login in past'.'</h2>';
echo '<br>';

//$conn=mysqli_connect('localhost','webtutplus','webtutplus','webtut_social');
$conn=mysqli_connect('localhost','root','25011994','webtutplus_social');

if(!$conn){
echo "not connected";
}

$sql = "SELECT * FROM linkdin WHERE first_name = '$b'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $query="INSERT INTO `linkdin`( `first_name`, `last_name`, `head_line`,`url`) 
    VALUES ('$b','$c','$d','$url')";

    //echo $query."<br />";

    $result=mysqli_query($conn,$query);

    if($result){
    }else{

    echo mysqli_error($conn);
    }

}



$query1='select * from linkdin';
$result1=mysqli_query($conn,$query1);

if(!result){

echo mysqli_error($conn);
}
?>

<table class="table table-striped">


<?php
while($row=mysqli_fetch_assoc($result1))
{
echo "<tr>";
echo "<td><img src='".$row['url']."' /></td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['last_name']."</td>";
echo "<td>".$row['head_line']."</td>";
echo '</tr>';
}





?>


</table>


</div>
</body>
</html>
 