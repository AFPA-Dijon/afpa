<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaires</title>
</head>
<body>
    <?php var_dump($_POST)?>
    
    <form action="formulaires.php" method="post">
        <input type="text" name="nom" value = "<?php echo (isset($_POST['nom']))? $_POST['nom']: ''; ?>"/>
        <input type="email" name="email" value = "<?php echo (isset($_POST['nom']))? $_POST['nom']: ''; ?>"/>
        <select name="select">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="volvo">Volvo</option>
        </select>
        
        <label for="">Choix</label>
        <input type="checkbox" name="check1"/>
        <input type="submit" value="Submit"/>
    </form>
    
    <?php if(isset($_POST['nom'])): ?>
    <p>
        <?= $_POST['nom'] ?>
    </p>
    <?php endif; ?>
    
</body>
</html>