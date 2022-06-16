<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./woju.css">
</head>

<body>
    <?php for ($i = 0;$i < 5;$i++): ?>
    <div id="tabelle">
        <h2 id="<?php echo $i ?>-Wochenname"></h2>
        <table>
            <tr>
                <th style="width: 10%;">Datum</th>
                <th style="width: 20%;">Thema</th>
                <th style="width: 35%;">Meine Arbeiten</th>
                <th style="width: 35%;">Meine Reflexion</th>
            </tr>
            <tr>
                <td rowspan="4" id="<?php echo $i ?>-Date"></td>
                <td id="<?php echo $i ?>-Thema1"></td>
                <td id="<?php echo $i ?>-Text1"></td>
                <td rowspan="4" id="<?php echo $i ?>-Reflexion"></td>
            </tr>
            <tr>
                <td id="<?php echo $i ?>-Thema2"></td>
                <td id="<?php echo $i ?>-Text2"></td>
            </tr>
            <tr>
                <td id="<?php echo $i ?>-Thema3"></td>
                <td id="<?php echo $i ?>-Text3"></td>
            </tr>
            <tr>
                <td id="<?php echo $i ?>-Thema4"></td>
                <td id="<?php echo $i ?>-Text4"></td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <?php endfor; ?>
    <script>
    const getWeekday = (weekNum, year, day) => {
        const weekday = new Date(year, 0, (1 + (weekNum - 1) * 7));
        while (weekday.getDay() !== day) {
            weekday.setDate(weekday.getDate() - 1);
        }
        return weekday;
    }
    var work = ["BBW ", "BMS ", "ZLI ", "ZLI ", "ZLI "]
    for (var i = 0; i < 5; i++) {
        let Wochenname = document.getElementById(i + "-Wochenname")
        let date = document.getElementById(i + "-Date")
        let reflex = document.getElementById(i + "-Reflexion")
        let thema1 = document.getElementById(i + "-Thema1")
        let thema2 = document.getElementById(i + "-Thema2")
        let thema3 = document.getElementById(i + "-Thema3")
        let thema4 = document.getElementById(i + "-Thema4")
        let text1 = document.getElementById(i + "-Text1")
        let text2 = document.getElementById(i + "-Text2")
        let text3 = document.getElementById(i + "-Text3")
        let text4 = document.getElementById(i + "-Text4")
        let dudu = window.location.search.slice(1).replace(/\+/g, ' ').split("&").map(search => search.split("="));
        console.log(dudu)
        date.appendChild(document.createElement("br"))
        date.appendChild(document.createTextNode(work[i]))
        dudu.forEach(element => {
            console.log(element[0], element[1]);
            if (element[0] == "Weekname") {
                Wochenname.appendChild(document.createTextNode("Woche " + element[1]))
                var weekday = getWeekday(parseInt(element[1]) + 1, 2022, i + 1);
                date.appendChild(document.createTextNode(weekday))
            }
            if (element[0] == i + "-thema1") {
                thema1.appendChild(document.createTextNode(element[1]))
                if (element[1] != "") {
                    text1.appendChild(document.createTextNode("*" + element[1] + " gemacht"))
                }
            } else if (element[0] == i + "-thema2") {
                thema2.appendChild(document.createTextNode(element[1]))
                if (element[1] != "") {
                    text2.appendChild(document.createTextNode("*" + element[1] + " gemacht"))
                }
            } else if (element[0] == i + "-thema3") {
                thema3.appendChild(document.createTextNode(element[1]))
                if (element[1] != "") {
                    text3.appendChild(document.createTextNode("*" + element[1] + " gemacht"))
                }
            } else if (element[0] == i + "-thema4") {
                thema4.appendChild(document.createTextNode(element[1]))
                if (element[1] != "") {
                    text4.appendChild(document.createTextNode("*" + element[1] + " gemacht"))
                }
            } else if (element[0] == i + "-text1.1" || element[0] == i + "-text1.2" || element[0] == i +
                "-text1.3" || element[0] == i + "-text1.4") {
                if (element[1] != "") {
                    console.log()
                    text1.appendChild(document.createElement('br'));
                    text1.appendChild(document.createTextNode("    -" + element[1]))
                }
            } else if (element[0] == i + "-text2.1" || element[0] == i + "-text2.2" || element[0] == i +
                "-text2.3" || element[0] == i + "-text2.4") {
                if (element[1] != "") {
                    text2.appendChild(document.createElement('br'));
                    text2.appendChild(document.createTextNode("-" + element[1]))
                }
            } else if (element[0] == i + "-text3.1" || element[0] == i + "-text3.2" || element[0] == i +
                "-text3.3" || element[0] == i + "-text3.4") {
                if (element[1] != "") {
                    text3.appendChild(document.createElement('br'));
                    text3.appendChild(document.createTextNode("-" + element[1]))
                }
            } else if (element[0] == i + "-text4.1" || element[0] == i + "-text4.2" || element[0] == i +
                "-text4.3" || element[0] == i + "-text4.4") {
                if (element[1] != "") {
                    text4.appendChild(document.createElement('br'));
                    text4.appendChild(document.createTextNode("-" + element[1]))
                }
            } else if (element[0] == i + "-like") {
                if (element[1] != "") {
                    reflex.appendChild(document.createTextNode(element[1] +
                        " hat mir diese Woche sehr gefallen. "))
                }
            } else if (element[0] == i + "-dontlike") {
                if (element[1] != "") {
                    reflex.appendChild(document.createTextNode(element[1] +
                        " hat mir diese Woche nicht so gefallen. "))
                }
            } else if (element[0] == i + "-Reflex") {
                if (element[1] != ""){
                    reflex.appendChild(document.createTextNode(element[1]))
                }
            } else {}
        })
    };
    </script>
</body>

</html>