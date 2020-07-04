<?php        

include 'AutoLoader.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to a library of Yorkshire Films! </h1>
        <h2> This is brought to you by The Yorkshire Puddings </h2>
        <h3> 140g plain flour, 4 eggs, 200ml milk, and 5 ambitious coders </h3>

        <h2> Lily was here....</h2>
        <h2> So was Claire...</h2>
       
        <p style="text-align:center;"> Yorkshire. </p>

        <p style="text-align:center;"> We gave the world Yorkshire Tea, the Bronte sisters, stainless steel, Wensleydale cheese, Sean Bean, and most gloriously of all, the Yorkshire pudding.</p>

        <p style="text-align:center;"> You’d think we could rest on our laurels after that, but we kept on pushing boundaries like an old man rolling down a hill in a tin bath. </p>

        <p style="text-align:center;"> Here you’ll find some of examples of the talent and beauty to be found in this amazing region. The films available to borrow from this library have all been filmed or based in Yorkshire. Some are gritty and dark, some wild and romantic, some shocking and funny, but all are great examples of why Yorkshire is brilliant.</p>
        
         <h3> Amrita showed up and scratched her head </h3>
         <h3> Amrita take2</h3>
    <marquee><h3> Gabby spun around for a bit </h3></marquee>
        
        <?php        
        //Testing if AutoLoader function has worked
        $member1 = new Member("p.sue", "Peggy","Sue" , "email@things.com", "21-02-1990" , "01826482736");
        $film1 = new Film("Rita Sue and Bob Too", "93", "18", "1982", "Available", "0", "Alan Clarke", "Comedy", "Bradford");
        
        
        echo $member1->getTel().PHP_EOL;
        echo $member1->Welcome();
        echo $member1 ->borrowedmem();
        echo $film1->getfilmtitle();
        //end of Autoloader test - this can be removed

        ?>
    </body>
</html>
