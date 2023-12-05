<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error { color: #FF0000; }
    </style>
</head>

<body>

    <?php
    $nameErr = $nimErr = $classErr = $emailErr = $genderErr = $websiteErr = $addressErr = "";
    $name = $nim = $class = $email = $gender = $comment = $website = $address = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["nim"])) {
            $nimErr = "Nim is required";
        } else {
            $nim = test_input($_POST["nim"]);
            // Validate nim as needed
        }

        if (empty($_POST["class"])) {
            $classErr = "Class is required";
        } else {
            $class = test_input($_POST["class"]);
            // Validate class as needed
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
            // Additional validation for address if needed
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>FORM VALIDATION</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Nim: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error">* <?php echo $nimErr; ?></span>
        <br><br>
        Class: <input type="text" name="class" value="<?php echo $class; ?>">
        <span class="error">* <?php echo $classErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Address: <input type="text" name="address" value="<?php echo $address; ?>">
        <span class="error">* <?php echo $addressErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Default:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Nim: " . $nim . "<br>";
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Input:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Nim: " . $nim . "<br>";
        echo "Class: " . $class . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Address: " . $address . "<br>";
    }
    ?>

</body>

</html>
