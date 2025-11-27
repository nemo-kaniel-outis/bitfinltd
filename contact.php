<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/views/Segments.php");
Segments::header();

if(isset($_POST["message"])) {
    $sender = "admin@bfltd.net";
    
    $headers = "From: $sender \r\n";
    $headers .="Reply-To: $sender \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8\r\n";
    
    $email = htmlentities($_POST["email"]);
    $name = htmlentities($_POST["name"]);
    $message = htmlentities($_POST["message"]);
    mail($sender, "Message from: $email", "<b>From:</b> $name.<br /><b>Email:</b> $email.<br /><br /><b>Message:</b><br />$message", $headers);
    echo <<<HTML
        <script>
            alert("Mail sent");
        </script>
HTML;
}
?>

<div class="contact_us">
    <form method="post" action="">
        <h1 style="margin-bottom:-2px">Contact Us:</h1><hr/>
            We are just a click away :)
        <input type="text" name = "name" placeholder="Name: Example: John Smith" class="input" required/>    
        <input type = "text" name = "email" placeholder = "Email: abc@example.com" class="input" required/>
        <textarea class="textarea" name="message" placeholder="Enter Text" required></textarea><br/>
        <button type="submit" class="button">Send <i class="fa fa-telegram"></i> </button>
    </form>
            
    <br />
            
    <div>
        <i class="fa fa-whatsapp"></i> +447760306954 <br />
        <i class="fa fa-telegram"></i> +39 3501650390 <br />
        <i class="fa fa-mail"></i> support@bitfinanceinvestment.com
    </div>

    <br />

    <div>
    <b style="border-bottom:2px solid #fff">WE ARE ACTIVE ON SOCIAL MEDIA:</b> <br /><br />
        <a href='https://instagram.com/brae_sokolski?igshid=YmMyMTA2M2Y=' style='color:#fff'><i class="fa fa-instagram"></i> instagram</a> <br /><br />   
        <a href='https://m.me/Brae.Sokolski' style='color:#fff'> <i class="fa fa-facebook"></i> facebook</a> <br /><br />  
        <a href='https://t.me/+39 3501650390' style='color:#fff'> <i class="fa fa-telegram"></i> telegram</a> <br /><br />
        <a href='https://wa.me/447760306954' style='color:#fff'> <i class="fa fa-whatsapp"></i> whatsApp</a> <br /><br /> 
    </div>
</div>


<?php
Segments::footer();
?>


<!--


-->