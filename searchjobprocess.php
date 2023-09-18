<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Search results</title>
</head>

<body>
    <h1>Job Vacancy Information</h1>
    <?php

    $filename = "../../data/jobposts/jobs.txt";


    echo "<h2>Search keyword: {$_GET["title"]}</h2>";

    if (isset($_GET["title"])) {

        $key = strtolower($_GET["title"]);

        $position = "";
        $contract = "";
        $application = "";
        $location = "";

        if (isset($_GET["position"])) {
            $position = $_GET["position"];
        }
        if (isset($_GET["contract"])) {
            $contract = $_GET["contract"];
        }
        if (isset($_GET["apply_type1"]) || isset($_GET["apply_type2"])) {
            if (isset($_GET["apply_type1"])) {
                $application = $_GET["apply_type1"];
            }
            if (isset($_GET["apply_type2"])) {
                $application = $_GET["apply_type2"];
            }
            if (isset($_GET["apply_type1"]) && isset($_GET["apply_type2"])) {
                $application = "";
            }
        }
        if (isset($_GET["location"])) {
            $location = $_GET["location"];
        }

        if (file_exists($filename)) {
            $onedata = array();
            $matchedData = array();
            $handle = fopen($filename, "r");
            while (!feof($handle)) {
                $onedata = fgets($handle);
                if ($onedata != "") {
                    $data = explode("\t", $onedata);
                    if ($key == strtolower($data[1])) {
                        if ($position == $data[4] || $position == "") {
                            if ($contract == $data[5] || $contract == "") {
                                if ($application == $data[6] || $application == "") {
                                    if ($location == preg_replace("@\n@", "", $data[7]) || $location == "") {
                                        $matchedData[] = $onedata;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (count($matchedData) == 0) {
                echo "<p>No jobs are found for matching criteria!</p>";
            } else {
                // Task 8 - Sorted by the date
                usort($matchedData, function ($a, $b) {
                    $rdata1 = explode("\t", $a);
                    $rdata2 = explode("\t", $b);
                    $date1 = $rdata1[3];
                    $date2 = $rdata2[3];
                    if (strtotime($date1) > strtotime($date2)) {
                        return -1;
                    } else if (strtotime($date1) < strtotime($date2)) {
                        return 1;
                    } else {
                        return 0;
                    }
                });
            }

            foreach ($matchedData as $datarow) {
                $data = explode("\t", $datarow);
                echo
                "<div class='post'>
                <h3>Position Id: </h3>$data[0]<br/>
                <h3>Job Title: </h3>$data[1]<br/>
                <h3>Description: </h3>$data[2]<br/>
                <h3>Closing Date: </h3>$data[3]<br/>
                <h3>Position: </h3>$data[4]<br/>
                <h3>Application by: </h3>$data[6]<br/>
                <h3>Location: </h3>$data[7]
                </div>";
            }

            fclose($handle);
        } else {
            echo "<p>Please check the posted jobs!</p>";
        }
    } else {
        echo "<p>Check the entered value!</p>";
    }
    ?>
    <a href="/cos30020/s104060309/assign1/index.php">Return to the home page!</a>
</body>

</html>