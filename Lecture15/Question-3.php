<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form action="" method="post">
        Please enter a day of the week: </br>
        <input type="text" name="weekdays" value="<?php echo isset($_POST['weekdays']) ? $_POST['weekdays'] : ''; ?>">
        <br><br>
        <input type="submit" name="submit" value="Go">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $weekdays = $_POST['weekdays'];
        switch ($weekdays) {
            case "Monday":
                echo "Laugh on Monday, laugh for danger.";
                break;
            case "Tuesday":
                echo "Laugh on Tuesday, kiss a stranger.";
                break;
            case "Wednesday":
                echo "Laugh on Wednesday, laugh for a letter.";
                break;
            case "Thursday":
                echo "Laugh on Thursday, something better.";
                break;
            case "Friday":
                echo"Laugh on Friday, laugh for sorrow.";
                break;
            case "Saturday":
                echo"Laugh on Saturday, joy tomorrow.";
                break;
            default:
                echo "Nothing";
        }
    }
    ?>
</body>

</html>