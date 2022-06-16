<?php
    $username = "root";
    $password = "";
    $db = "wochenjournal_db";

    $connectdb =  new mysqli('localhost', $username, $password, $db) or die("Not able to connect");

    $days = ["Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="script.js"></script>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Neues Journal erstellen
    </button>
    <!-- Modal -->
    <form action="./prog.php" method="get">
    <input type="text" placeholder="Geben sie die Woche ein" id="text" name="Weekname">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">wochenjournal ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FOR EACH-->
                        <?php for ($i = 0;$i < 5;$i++): ?>
                        <p><?php echo $days[$i]?></p>
                        <input type="text" name="<?php echo $i ?>-thema1" placeholder="Thema 1">
                        <br>
                        <br>
                        <input type="text" name="<?php echo $i ?>-text1.1" placeholder="Text 1">
                        <input type="text" placeholder="Text 2" name="<?php echo $i ?>-text1.2">
                        <input type="text" placeholder="Text 3" name="<?php echo $i ?>-text1.3">
                        <input type="text" placeholder="Text 4" name="<?php echo $i ?>-text1.4">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-thema2" placeholder="Thema 2" id="theme2">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-text2.1" placeholder="Text 1">
                        <input type="text" placeholder="Text 2" name="<?php echo $i ?>-text2.2">
                        <input type="text" placeholder="Text 3" name="<?php echo $i ?>-text2.3">
                        <input type="text" placeholder="Text 4" name="<?php echo $i ?>-text2.4">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-thema3" placeholder="Thema 3" id="theme3">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-text3.1" placeholder="Text 1">
                        <input type="text" placeholder="Text 2" name="<?php echo $i ?>-text3.2">
                        <input type="text" placeholder="Text 3" name="<?php echo $i ?>-text3.3">
                        <input type="text" placeholder="Text 4" name="<?php echo $i ?>-text3.4">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-thema4" placeholder="Thema 4" id="theme4">
                        <br><br>
                        <input type="text" name="<?php echo $i ?>-text4.1" placeholder="Text 1">
                        <input type="text" placeholder="Text 2" name="<?php echo $i ?>-text4.2">
                        <input type="text" placeholder="Text 3" name="<?php echo $i ?>-text4.3">
                        <input type="text" placeholder="Text 4" name="<?php echo $i ?>-text4.4">
                        <br>
                        <br>
                        <input type="text" placeholder="Hat mir nicht gefallen" id="dontlike"
                            name="<?php echo $i ?>-dontlike">
                        <input type="text" placeholder="Hat mir gefallen" id="like" name="<?php echo $i ?>-like">
                        <input type="text" placeholder="Noch mehr zu sagen" id="like" name="<?php echo $i ?>-Reflex">
                        <br>
                        <br>
                        <br>
                        <?php endfor; ?>
                        <button type="submit">los</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mehr()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div id="screen">
    </div>
    <p id="ab1"></p>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>

    function mehr() {
        const divi = document.createElement('div');
        const h2 = document.createElement('p');
        const but = "<button onclick=delet(this) class=del>delete</button>";
        const butter = "<button onclick=edit(this) class=edit>edit</button>";
        const haxt = document.getElementById("text").value;
        const text = document.createTextNode("Woche " + haxt);
        const print = document.getElementById('screen');
        h2.appendChild(text);
        divi.appendChild(h2);
        divi.insertAdjacentHTML("beforeend", but);
        divi.insertAdjacentHTML("beforeend", butter);
        print.appendChild(divi);
        console.log("hi")
    }

    function delet(element) {
        console.log(element);
        let parent = element.parentElement;
        console.log(parent);
        parent.remove();
    }

    function edit(element) {
        let parent = element.parentElement;
        console.log(parent)
        let child = parent.children;
        let chili = parent.getElementsByTagName('p')[0].innerHTML;
        console.log(chili);
        let puting = "<input type=text placeholder=" + chili + " class=input>";
        let bubier = "<button onclick=save(this) class=save>save</button>";
        let del = child[1];
        console.log(child[2]);
        child[2].remove();
        child[0].remove();
        parent.insertAdjacentHTML("beforeend", puting);
        parent.appendChild(del);
        parent.insertAdjacentHTML("beforeend", bubier);
    }

    function save(element) {
        let papa = element.parentElement;
        console.log(papa)
        let child = papa.children;
        let ptag = document.createElement('p');
        let bedit = "<button onclick=edit(this) class=edit>edit</button>";
        let haxe = child[0].value;
        console.log(haxe);
        let texto = document.createTextNode("Woche " + haxe);
        let del = child[1];
        child[2].remove();
        child[1].remove();
        child[0].remove();
        ptag.appendChild(texto);
        papa.appendChild(ptag);
        papa.appendChild(del);
        papa.insertAdjacentHTML("beforeend", bedit);

    }
    </script>
</body>

</html>