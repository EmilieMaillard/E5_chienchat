<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");

    if (!isset($_GET['id']))
        header("location:index.php");
    else
        $idP = $_GET['id'];
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
            $person = getPerson($idP);
        ?>

        <h3 class="p-4">Modification d'une personne</h3>
        <form action="controller/editP.php" method="post">
        <input type="hidden" name="idP" value="<?php echo $idP; ?>">
        <div class="row">
                <div class="col form-floating mb-3">
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $person['lastname']; ?>" required>
                    <label for="lastname">Nom</label>
                </div>
                <div class="col form-floating mb-3">
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $person['firstname']; ?>" required>
                    <label for="firstname">Prénom</label>
                    </div>
                <div class="col form-floating mb-3">
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $person['phone']; ?>" required>
                    <label for="phone">Téléphone</label>
                </div>
                <div class="col form-floating mb-3">
                     <select name="status" id="status" class="form-select" required>
                        <option value="B" <?php if ($person['status'] == 'B') echo 'selected'; ?>>Bénévole</option>
                        <option value="S" <?php if ($person['status'] == 'S') echo 'selected'; ?>>Salarié</option>
                    </select>
                    <label for="status">Statut</label>
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