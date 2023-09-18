<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Search a Job</title>
</head>

<body>
    <h1>Job Vacancy Posting System</h1>
    <form action="searchjobprocess.php" method="get">
        <div class="_input">
            <label>Title :</label>
            <input name="title" type="text" placeholder="Job Title" />
        </div>
        <div class="_input">
            <label>Position :</label>
            <input name="position" type="radio" value="fullTime" /> Full Time
            <input name="position" type="radio" value="partTime" /> Part Time
        </div>
        <br />
        <div class="_input">
            <label>Contract :</label>
            <input name="contract" type="radio" value="onGoing" /> On-going
            <input name="contract" type="radio" value="fixed" /> Fixed Term
        </div>
        <br />
        <div class="_input">
            <label>Application by :</label>
            <input name="apply_type1" type="checkbox" value="post" /> Post
            <input name="apply_type2" type="checkbox" value="mail" /> Mail
        </div>
        <br />
        <div class="_input">
            <label>Location :</label>
            <select name="location">
                <option selected disabled>---</option>
                <option value="ACT" name="ACT">ACT</option>
                <option value="NSW" name="NSW">NSW</option>
                <option value="NT" name="NT">NT</option>
                <option value="QLD" name="QLD">QLD</option>
                <option value="SA" name="SA">SA</option>
                <option value="TAS" name="TAS">TAS</option>
                <option value="VIC" name="VIC">VIC</option>
                <option value="WA" name="WA">WA</option>
            </select>
        </div>
        <button type="submit">Search</button>
    </form>
    <a href="/cos30020/s104060309/assign1/index.php">Return to Home Page</a>
</body>

</html>