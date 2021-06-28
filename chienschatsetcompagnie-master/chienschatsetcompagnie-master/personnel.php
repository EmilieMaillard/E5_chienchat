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
    <title>CCC | Personnel</title>
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
                            <a class="nav-link" aria-current="page" href="index.php">Animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Personnel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Tableau des animaux -->
        <h3 class="p-4">Liste du personnel</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Statut</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $dbParams = getDbParams();
                $people = getPeople();
                foreach($people as $person) {
            ?>
                <tr>
                    <th scope="row"><?php echo $person['lastname']; ?></th>
                    <td><?php echo $person['firstname']; ?></td>
                    <td><?php echo $person['phone']; ?></td>
                    <td><?php echo ($person['status'] == 'B')?'Bénévole':'Salarié'; ?></td>
                    <td>
                        <a href="editPerson.php?id=<?php echo $person['idP']; ?>""><i class="far fa-edit px-4"></i></a>
                        <a href="controller/deleteP.php?id=<?php echo $person['idP']; ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>   
            <?php
                }
            ?>
            </tbody>
        </table>

        <!-- Formulaire de saisie -->
        <h3 class="p-4">Ajout d'une personne</h3>
        <form action="controller/addP.php" method="post">
        <div class="row">
                <div class="col form-floating mb-3">
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                    <label for="lastname">Nom</label>
                </div>
                <div class="col form-floating mb-3">
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                    <label for="firstname">Prénom</label>
                    </div>
                <div class="col form-floating mb-3">
                    <input type="text" name="phone" id="phone" class="form-control" required>
                    <label for="phone">Téléphone</label>
                </div>
                <div class="col form-floating mb-3">
                     <select name="status" id="status" class="form-select" required>
                        <option value="" disabled selected>Choisissez</option>
                        <option value="B">Bénévole</option>
                        <option value="S">Salarié</option>
                    </select>
                    <label for="status">Statut</label>
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