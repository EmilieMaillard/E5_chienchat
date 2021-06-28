<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php"); 
    require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
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
        
        <!-- Menu de navigation -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="personnel.php">Personnel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Tableau des animaux -->
        <h3 class="p-4">Liste des animaux</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Espèce</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Race</th>
                    <th scope="col">En charge</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $dbParams = getDbParams();
                $animals = getAnimalsWithCaretaker();
                foreach($animals as $animal) {
            ?>
                <tr>
                    <th scope="row"><?php echo $animal['name']; ?></th>
                    <td><?php echo $animal['species']; ?></td>
                    <td><?php echo $animal['gender']; ?></td>
                    <td><?php echo $animal['birthday']; ?></td>
                    <td><?php echo $animal['breed']; ?></td>
                    <td><?php echo $animal['firstname']." ".$animal['lastname']; ?></td>
                    <td>
                        <a href="editAnimal.php?id=<?php echo $animal['idA']; ?>""><i class="far fa-edit px-4"></i></a>
                        <a href="controller/deleteA.php?id=<?php echo $animal['idA']; ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>   
            <?php
                }
            ?>
            </tbody>
        </table>

        <!-- Formulaire de saisie -->
        <h3 class="p-4">Ajout d'un animal</h3>
        <form action="controller/addA.php" method="post">
        <div class="row">
                <div class="col form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" required>
                    <label for="name">Nom</label>
                </div>
                <div class="col">
                    <input type="radio" name="gender" id="male" value="M" class="form-check-input" checked>   
                    <label for="male" class="form-label">Mâle</label>
                    </div>
                <div class="col">
                    <input type="radio" name="gender" id="female" value="F" class="form-check-input">
                    <label for="female" class="form-label">Femelle</label>
                </div>
                <div class="col form-floating mb-3">
                     <select name="careTaker" id="careTaker" class="form-select" required>
                        <option value="" disabled selected>Choisissez</option>
                        <?php
                        $personnel = getPeople();
                        foreach ($personnel as $personne) {
                            echo "<option value='".$personne['idP']."'>".$personne['firstname']." ".$personne['lastname']."</option>";
                        }
                        ?>
                    </select>
                    <label for="careTaker" class="form-label">Personne en charge</label>
                </div>
        </div>
        <div class="row py-4">
            <div class="col form-floating mb-3">
                <select name="species" id="species"  class="form-select" required>
                    <option value="" disabled selected>Choisissez</option>
                    <option value="Chat">Chat</option>
                    <option value="Chien">Chien</option>
                </select>
                <label for="species" class="form-label">Espèce</label>
            </div>
            <div class="col form-floating mb-3">
                <input type="text" name="breed" id="breed" class="form-control" required>
                <label for="breed">Race</label>
            </div>
            <div class="col form-floating mb-3">
                <input type="date" name="birthday" id="birthday" class="form-control" required>             
                <label for="birthday" class="form-label">Date de naissance</label>
            </div>
        </div>
        <input type="submit" value="Ajouter" class="btn btn-primary mb-3">
        </form>
    </div>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vendor/fontawesome-free-5.15.3-web/css/all.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>