<?php
session_start();

$firstn=isset($_SESSION['name']);
$secondn=!empty($_SESSION['name']);
//constant checker to ensure that entered name matches perfectly
if ($firstn) {
    if($secondn){
    header("Location: client.php");
}

}
$ndndnddn=1;
$moucontrol=0;

//check if method ==post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //create file path based on choice
    
    // $usmane = $_POST['name'];

    if (isset($_FILES['movier'])) {

        $additionext = end(explode('.', $_FILES['movier']['name']));
        //give addresspfile for checking
        $addresspfile = 'images/' . $_POST['name'] . '.' .$additionext;
        $moucontrol1=0;

        if (!move_uploaded_file($_FILES['movier']['tmp_name'], $addresspfile)) {
            header("Location: error.html");
            $moucontrol2=0;

        }

    }
    else {
        header("Location: error.html");
        //exit when this occurs instead of saying
        exit;

    }

    require_once('xmlHandler.php');

    // create the chatroom xml file handler
    $xmlh = new xmlHandler("chatroom.xml");
    //recheck the whole case
    $newnottouch=false;
    $getoneplus=true;
    
    if (!$xmlh->fileExist()) {

        header("Location: error.html");
        //exit the whole
        exit;

    }

    $dfo=1;
    // open the existing XML file
    $xmlh->openFile();

    // get the 'users' element
    $users_element = $xmlh->getElement("users");

    // create a 'user' element
    $user_element = $xmlh->addElement($users_element, "user");

    // add the user name
    $xmlh->setAttribute($user_element, "name", $_POST["name"]);


    $xmlh->setAttribute($user_element, "filepath", $addresspfile);

    // save the XML file
    $xmlh->saveFile();

    // set the name to the cookie
        setcookie("name", $_POST["name"]);
        //change name to post
        $moucontrol4=0;

    $_SESSION['name'] = $_POST["name"];


    header("Location: client.php");
}
?>