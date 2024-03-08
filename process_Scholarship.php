<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Form</title>
</head>
<body>
    <?php
// Defining the displayRequired() function.
    function displayRequired($fieldName) {
        echo "<p style='color: red;'>The field \"$fieldName\" is required! </p>";
    }
// Defining the validateInput() function.
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
        // Empty form field brings us here.
            displayRequired($fieldName);
            ++ $errorCount;
            $retval = "";
        } else {
        // Clean input when empty == false.
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return $retval;
    }
// defining the redisplayForm() function
    function redisplayForm($firstName, $lastName) {
        ?>
        <h2 style="text-align:center">Scholarship Form</h2>
        <form name="scholarship" action="process_Scholarship.php" method="post" style="text-align: center;">
            <label for="fName">First Name:</label>
            <input type="text" name="fName" id="fName" value="<?php echo $firstName;?>" />
            <br/>
            <br/>
            <label for="lName">Last Name:</label>
            <input type="text" name="lName" id="lName" value="<?php echo $lastName;?>" />
            <br/>
            <br/>
            <p>
                <input type="reset" value="Clear Form" />&nbsp; &nbsp;
                <input type="submit" name="Submit" value="Send Form" />
            </p>
        </form>
        <?php
    }

    $errorCount = 0;
    $firstName = validateInput($_POST["fName"], "First Name");
    $lastName = validateInput($_POST["lName"], "Last Name");
    
    if($errorCount > 0) {
        echo "<p>Please use the BACK button to return to the form and refill the data!</p>";
        redisplayForm($firstName, $lastName);
    } else {
        echo "<p>The you for filling out the schocalrship form, $firstName $lastName!</p>";
    }




    ?>
</body>
</html>