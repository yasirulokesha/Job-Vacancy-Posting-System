<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Post a job</title>
</head>

<body>
    <?php


    $error = 0;

    if (isset($_POST["apply_type1"])) {
        $application1 = $_POST["apply_type1"]; // Post type
    } else if (isset($_POST["apply_type2"])) {
        $application2 = $_POST["apply_type2"]; // Mail type
    } else {
        $application1 = "";
        $application2 = "";
    }



    if (isset($_POST["positionID"])) {
        $id = $_POST["positionID"];
        $idlen = strlen($id);

        if ($idlen != 7) {
            echo "<p>Check the position ID. Position ID must have 5 strings.</p>";
            $error = 1;
        } else if (!preg_match("/^PID\d{4}$/", $id)) {
            echo "<p>Check the position ID. ID must have to start with PID and 4 unique numbers.</p>";
            $error = 1;
        }
    } else {
        echo "Enter the position id!";
        $error = 1;
    }

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $title = $_POST["title"];
        $titlelen = strlen($title);

        if ($titlelen > 20) {
            echo "<p> Title should be between 1 and 20 in string length";
            $error = 1;
        } elseif (!preg_match("/^[a-zA-Z0-9,.! ]*$/", $title)) {
            echo "<p> Title must only be alphanumeric characters";
            $error = 1;
        }
    } else {
        echo "<p>Please fill in title!</p>";
        $error = 1;
    }

    if (isset($_POST["description"]) && !empty($_POST["description"])) {
        $description = $_POST["description"];
        $descriptionclength = strlen($description);

        if ($descriptionclength > 250) {
            echo "<p>Description should be no more than 250 characters</p>";
            $error = 1;
        }
    } else {
        echo "<p>Please write a description!</p>";
        $error = 1;
    }

    if (isset($_POST["closeDate"]) && !empty($_POST["closeDate"])) {
        $date =  $_POST["closeDate"];
        if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{2}$/", $date)) {
            echo "<p>Please enter date in valid date format dd/mm/yy </p>";
            $error = 1;
        }
    } else {
        echo "<p>Please enter the closing date</p>";
        $error = 1;
    }

    if (!isset($_POST["position"]) && empty($_POST["position"])) {
        echo "<p>Please select a postion</p>";
        $error = 1;
    } else {
        $position = $_POST["position"];
    }

    if (!isset($_POST["contract"]) && empty($_POST["contract"])) {
        echo "<p>Please select a contract</p>";
        $error = 1;
    } else {
        $contract = $_POST["contract"];
    }

    if (!isset($_POST["location"]) && empty($_POST["location"])) {
        echo "<p>Please select location</p>";
        $error = 1;
    } else {
        $location = $_POST["location"];
    }

    if (!isset($_POST["apply_type1"]) && !isset($_POST["apply_type2"])) {
        echo "<p>Please select application type!</p>";
        $error = 1;
    }


    if ($error == 0) {

        $filename = "../../data/jobposts/jobs.txt";
        $directory = "../../data/jobposts/";

        if (!(file_exists($directory))) {
            umask(0007);
            mkdir($directory, 02770);
        }

        if (file_exists($filename)) {
            $onedata = array();
            $itemdata = array();
            $handle = fopen($filename, "r");
            while (!feof($handle)) {
                $onedata = fgets($handle);
                if ($onedata != "") {
                    $data = explode("\t", $onedata);
                    $itemdata[] = $data[0];
                }
            }
            fclose($handle);
            $newdata = !(in_array($id, $itemdata));
        } else {
            $newdata = true;
        }

        if ($newdata) {

            $handle = fopen($filename, "a");

            if (empty($application1)) {
                $data = $id . "\t" .  $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contract . "\t" .  $application2 . "\t" . $location . "\n";
            } else {
                $data = $id . "\t" .  $title . "\t" . $description . "\t" . $date . "\t" . $position . "\t" . $contract . "\t" .  $application1 . "\t" . $location . "\n";
            }

            $file = fopen($filename, "a");

            fwrite($file, $data);
            echo "<p>Job posted successfully!</p>";
            fclose($file);
        } else {
            echo "<p>The position ID is exists!</p>";
        }
    }
    ?>
    <a href="/cos30020/s104060309/assign1/index.php">Return to the home page!</a>
</body>

</html>