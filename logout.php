
<?php 


require_once('xmlHandler.php');
//move once over
if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

            //make variables and move

// create the chatroom xml file handler as same in lab however additional features have to be carried out to check each
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    //exit while moving ahead as well
    exit;
}
            //make variables and move

//this is to ensure correct functions are reached to and functioning is substantial and perfect all in all. great news


//creat additional files for checking logout to ensure correct method is done and move from time to time cookie namenew is given as $namenew to check
$namenew = $_COOKIE["name"];

$xmlh->openFile();

//get user and move around
$get_new_user = $xmlh->getChildNodes("user");

//get from xml charoom
$newuserE = $xmlh->getElement("users");


if($get_new_user == null) {
    //unused variable for checking and moving
    //move all the way freely
   $newvarunused=1;

}

else {
    //go through each and check
    foreach ($get_new_user as $hellotouser) {

        $nameuser = $xmlh->getAttribute($hellotouser, "name");

        if ($nameuser == $namenew){

            $remfile = $xmlh->getAttribute($hellotouser, "filepath");

            unlink($remfile);

            $xmlh->removeElement($newuserE, $hellotouser);
            
        }
    }
}


            //make variables and move

//save the file and move it to xmlh
$xmlh->saveFile();
//set cookies and ensure everything else is done correctly
setcookie("name", "");
//keep checking
$ghvar=1;
$ghvar2=1;
$ghvar3=1;

//move it back to another
header("Location: login.html");

?>
