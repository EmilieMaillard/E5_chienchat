<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");

    if (!isset($_GET['id']))
        header("location:index.php");
    else
        $idA = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCC | Animaux</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <div class="container p-3 bg-light">

        <!-- En tête de la page -->
        <div class="row">
            <div class="col-12 col-sm-9 align-self-center">
                <h1>Chiens Chats et compagnie</h1>    
            </div>
            <div class="col-12 col-sm-3">
                <img src="assets/images/logoCCC.png" alt="logoCCC" id="logoCCC">
            </div>
        </div>
        
        <!-- Formulaire d'édition -->
        <?php
            $animal = getAnimal($idA);
        ?>

        <h3 class="p-4">Modification d'un animal</h3>
        <form action="controller/editA.php" method="post">
        <input type="hidden" name="idA" value="<?php echo $idA; ?>">
        <div class="row">
                <div class="col form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $animal['name']; ?>" required>
                    <label for="name">Nom</label>
                </div>
                <div class="col">
                    <input type="radio" name="gender" id="male" value="M" class="form-check-input" <?php if ($animal['gender'] == 'M') echo 'checked'; ?>>   
                    <label for="male" class="form-label">Mâle</label>
                    </div>
                <div class="col">
                    <input type="radio" name="gender" id="female" value="F" class="form-check-input" <?php if ($animal['gender'] == 'F') echo 'checked'; ?>>
                    <label for="female" class="form-label">Femelle</label>
                </div>
                <div class="col form-floating mb-3">
                     <select name="careTaker" id="careTaker" class="form-select" required>
                        <?php
                        $personnel = getPeople();
                        foreach ($personnel as $personne) {
                            echo "<option value='".$personne['idP']."'";
                            if ($animal['careTaker'] == $personne['idP']) echo ' selected';
                            echo ">".$personne['firstname']." ".$personne['lastname']."</option>";
                        }
                        ?>
                    </select>
                    <label for="careTaker" class="form-label">Personne en charge</label>
                </div>
        </div>
        <div class="row py-4">
            <div class="col form-floating mb-3">
                <select name="species" id="species"  class="form-select" required>
                    <option value="" disabled selected>Espèce</option>
                    <option value="Chat" <?php if ($animal['species'] == 'Chat') echo ' selected'; ?>>Chat</option>
                    <option value="Chien" <?php if ($animal['species'] == 'Chien') echo ' selected'; ?>>Chien</option>
                </select>
                <label for="species" class="form-label">Espèce</label>
            </div>
            <div class="col form-floating mb-3">
                <input type="text" name="breed" id="breed" class="form-control" value="<?php echo $animal['breed']; ?>" required>
                <label for="breed">Race</label>
            </div>
            <div class="col form-floating mb-3">
                <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo dateToUS($animal['birthday']); ?>" required>
                <label for="birthday" class="form-label">Date de naissance</label>
            </div>
        </div>
            <input type="submit" value="Modifier" class="btn btn-primary mb-3">
        </form>
    </div>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vendor/fontawesome-free-5.15.3-web/css/all.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>