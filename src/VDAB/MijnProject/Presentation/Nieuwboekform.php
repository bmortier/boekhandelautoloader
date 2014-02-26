<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boeken</title>
        <style>
            table{border-collapse:collapse;}
            td, th{ border: 1px solid black; padding:3px; }
            th { background-color: #ddd;}
        </style>
    </head>
    <body>
        <h1>Nieuw boek toevoegen</h1>
        <?php
        
        if(isset($error) && $error == "titleexists"){
            ?>
        <p style="color: red">Titel bestaat al</p>
        <?php
        }
        ?>
                <form method="post" action ="voegboektoe.php?action=process">

        <table>
            <tr>
                <td>Titel:</td>
                <td>
                    <input type="text" name="txtTitel">
                </td>
            </tr>
            <tr>
                <td>Genre:</td>
                <td>
                    <select name="selGenre">
                        <?php
                        foreach($genreLijst as $genre) {
                            ?>
                        <option value="<?php print($genre->getID());?>">
                        <?php print($genre->getOmschrijving());?></option> 
                        <?php
                        } 
                        ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type ="submit" value="Toevoegen">
                </td>
            </tr>
        </table>
                </form>
            
            
            
         


    </body>
</html>