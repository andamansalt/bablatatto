<?php include('db_connect.php'); ?>
<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Babla.tattoostudio</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col loginbrand">
                <main class="form-signin w-100 m-auto">
                    <form action="forgot-password.php" method="post" autocomplete="">
                        <h1 class="h3 mb-3 fw-normal" style="text-align:center; font-size:60px; margin-left:-40%">Babla.tattoostudio</h1>
                        <h1 class="h3 mb-3 fw-normal">ลืมรหัสผ่าน?</h1>
                        <p>กรุณากรอก E-mail ของคุณ</p>
                        <?php
                        if(count(array($errors)) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 

                                    if (is_array($errors) || is_object($error))
                                    {
                                        foreach ($errors as $error)
                                        {
                                            echo $error;
                                            echo $email;
                                        }
                                    }
                                    // foreach($errors as $error){
                                    //     echo $error;
                                    // }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                        <div class="form-floating" style="margin-bottom: 5%;">
                            <input type="e-mail" class="form-control" style="border-radius: 25px; border:solid #7A7676;" name="email"  value="<?php echo $email ?>" required>
                            <label for="email">E-mail</label>
                        </div>

                        
                        <button class="w-100 btn btn-lg btn-secondary" style="border-radius: 25px;" type="submit" name="check-email">ดำเนินการต่อ</button>
                        
                    
                    </form>

                </main>
            </div>
        </div>

       
</body>

</html>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>