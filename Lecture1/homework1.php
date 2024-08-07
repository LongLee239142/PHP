<!DOCTYPE html>
<html>
<head>
    <style>
        .large-text {
            font-size: 30px;
            color: black;
            font-weight: bold;
        }

        .small-text {
            font-size: 18px;
            color: blue;
        }
    </style>
</head>
<body>
    <?php
    $txt1 = "Personal Information ";
    $txt2 = "First and Last Name: ";
    $txt3 = "Age: ";
    $txt4 = "Career: ";
    $txt5 = "Address: ";
    $txt6 = "Email: ";
    $txt7 = "Phone Number:";
    $name = "<span>   LongLee  </span>";
    $age  = "<span>   22  </span>";
    $career = "<span>   Programmer  </span>";
    $address = "<span>   Hanoi, VietNam  </span>";
    $email = "<span>   longlee@gmail.com  </span>";
    $phone = "<span>   09123456789  </span>";
    $className = 'large-text';
    print "<p class=" . $className . ">" . $txt1 . "</p>";
    $className = 'small-text';
    $text1 = "<b class =" . $className . ">" . $txt2 . "</b>";
    print "<p>". $text1.$name ."</p>";
    $text2 = "<b class =" . $className . ">" . $txt3 . "</b>";
    print "<p>". $text2.$age ."</p>";
    $text3 = "<b class =" . $className . ">" . $txt4 . "</b>";
    print "<p>". $text3.$career ."</p>";
    $text4 = "<b class =" . $className . ">" . $txt5 . "</b>";
    print "<p>". $text4.$address ."</p>"; 
    $text5 = "<b class =" . $className . ">" . $txt6 . "</b>";
    print "<p>". $text5.$email ."</p>"; 
    $text5 = "<b class =" . $className . ">" . $txt6 . "</b>";
    print "<p>". $text5.$email ."</p>"; 
    ?>
</body>
</html>