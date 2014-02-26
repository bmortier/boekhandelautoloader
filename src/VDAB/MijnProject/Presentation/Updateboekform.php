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
        <h1>Boek bijwerken</h1>
        <?php
        if(isset($error) && $error == "titleexists"){
         ?>
        <p style="color: red">Titel bestaat al</p>
                <?php
        }
                 ?>

       
        <form method="post" action ="updateboek.php?action=process&id=<?php print($boek->getId());?>">

        <table>
            <tr>
                <td>Titel:</td>
                <td>
                    <input type="text" name="txtTitel" value="<?php print($boek->getTitel());?>">
                </td>
            </tr>
            <tr>
                <td>Genre:</td>
                <td>
                    <select name="selGenre">
                        <?php
                        foreach($genreLijst as $genre) {
                            if($genre->getID() == $boek->getGenre()->getID){
                                $selWaarde = " selected ";
                            } else {$selWaarde = "";
                        }
                            ?>
                        
                        <option value="<?php print($genre->getID());?> " <?php print($selWaarde);?>>
                        <?php print ($genre->getOmschrijving());?>
                        </option>
                        <?php
                        }
                        
                        ?>
                    </select>
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