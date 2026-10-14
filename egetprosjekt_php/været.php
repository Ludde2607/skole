
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
        <div class="toptext">

        </div>
        <div class="senter_hoved_box">
            <div class="sokebox">
                
                <input type="text" placeholder="Bynavn" spellcheck="false">
                <button><img src="bilder/sokeknapp.png" alt="søkeknap"></button>
            
            </div>
            <div class="vaeret">
                <img class="vaerikon" src="bilder/regn.png" >
                <h3 class="temp">22°C</h3>
                <h3 class="by">Oslo</h3>
                <div class="vaer-detaljer">
                    <div class="vindbox">
                        <img src="bilder/vind.png">
                        <h4 class="vind-hastighet">10 m/s</h4>
                    </div>
                    <div class="vindbox">
                        <img src="bilder/nord.png" class="vindikon">
                        <h4 class="vind-retning">10°N</h4>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <h3>Tidligere søk:</h3>
            <p>By navn</p>
            <p>Temp</p>
            <p>Været</p>
        </div>
    </main>

<script>
    const apiKey = "88a7d484e8b32ee4f96763cd1318a1b6";
    const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";
    
    const sokeBox = document.querySelector(".sokebox input")
    const sokeKnapp = document.querySelector(".sokebox button")
    const vaerIkon = document.querySelector(".vaerikon")
    const vindIkon = document.querySelector(".vindikon")

    async function checkWeather(by) {
        const response = await fetch(apiUrl + by + '&appid=' + apiKey);
        var data = await response.json();

        console.log(data);

        document.querySelector(".by").innerHTML = data.name;
        document.querySelector(".temp").innerHTML = data.main.temp + "°C";
        document.querySelector(".vind-hastighet").innerHTML = data.wind.speed + "m/s";
        document.querySelector(".vind-retning").innerHTML = data.wind.deg + "°N";

        if (data.weather[0].main == "Clear"){
            vaerIkon.src = "bilder/sol.png";
        }
        else if (data.weather[0].main == "Clouds"){
            vaerIkon.src = "bilder/simp-sky.png";
        }
        else if (data.weather[0].main == "Rain"){
            vaerIkon.src = "bilder/regn.png";
        }
        else if (data.weather[0].main == "Drizzle"){
            vaerIkon.src = "bilder/smol-regn.png";
        }
        else if (data.weather[0].main == "Mist"){
            vaerIkon.src = "bilder/simp-sky.png";
        }
        else if (data.weather[0].main == "Fog"){
            vaerIkon.src = "bilder/simp-sky.png";
        }
        else if (data.weather[0].main == "Snow"){
            vaerIkon.src = "bilder/sno.png";
        }
        else if (data.weather[0].main == "Thunderstorm"){
            vaerIkon.src = "bilder/torden.png";
        }
        
        
        vindIkon.style.transform = 'rotate(' + data.wind.deg + 'deg)';

        


    }

    async function saveData(data) {
        const vaerData = {
            by_navn: data.name,
            vær: data.weather[0],
            temp: data.main.temp.main
            
        };
        
        try {
            const response = await fetch("includes/datahandling.inc.php", { 
                method: "post", 
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(vaerData)
            });

            const resultat = await response.text();
            console.log("Database-respons: ", resultat);

        } catch (error) {
            console.error("Feil ved lagring til database: ", error);
            
        }
        
    
        
    }

    sokeKnapp.addEventListener("click", ()=>{
        checkWeather(sokeBox.value)
    })

    checkWeather();
</script>


</body>
</html>