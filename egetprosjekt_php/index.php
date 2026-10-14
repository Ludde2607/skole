<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="været.php">Været</a></li>
    </ul>
    </header>
    <main>
        <div>
            <form action="includes/datahandling.inc.php" method="post">
                <input type="text" name="by_navn" placeholder="bynavn">
                <input type="text" name="vær" placeholder="vær">
                <input type="int" name="temp" placeholder="tempratur">
                
                <button>TEST</button>
            </form>
        </div>
    </main>
</body>
</html>