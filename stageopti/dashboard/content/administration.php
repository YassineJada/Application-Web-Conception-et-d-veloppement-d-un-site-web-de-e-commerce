<!doctype html>
<html >

<head>

   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">

    <script src="https://kit.fontawesome.com/4cd5ad855e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
        <?php   include("headerdash.php")    ?>


            <section class="stat">
                
            <div >
            <form action="../php/adduser.php" method="POST" >
            <div class="form-inline" >
                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Jane Doe" name="fnom">


                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input type="email" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="@Email" name="email">
                         
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">@</div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name ="user">
                        </div>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">#</div>
                            <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password" name="password">
                        </div>
                        

                        <div class="col">
                                    <select class="form-control form-control-lg" name="type" required>
                                            <option value="super" >super</option>
                                            <option value="normal">normal</option>
                                                 
                
                                     </select>
                      </div>

                        
            </div>
            <div align="center" >
            <button type="submit" class="btn btn-primary" name="sub">Submit</button>
            </div>
            </form>         
            </div>
                                            

                    
            </section>

            <section class="stat" >
                    
            <table class="table table-hover">
                    <tr>
                    <th scope="col">User Name  :</th>
                    <th scope="col">Nom: :</th>
                    <th scope="col">Email :</th>
                    <th scope="col">Droite :</th>
                  
                    
                    <th scope="col" columnspan =2>Action</th>
                    


                    </tr>

                    <?php


                    




                    foreach($admin as $com  ){
                    ?>

                    <tr>
                    <td><?php   echo $com[0] ?></td>
                    <td><?php   echo $com[1] ?></td>
                    <td><?php   echo $com[2] ?></td>
                    <td><?php   echo $com[3] ?></td>
                    

                    <?php   
                    if($com[3] == 'super') {
                        
                    ?>
                        <td><a class="btn btn-dark" href="../php/commandprocess.php?username=<?php echo $com[0]; ?>" >supprimé </a></td>
                    <?php   
                    } 
                    ?>
                                        

                    </tr>

                    <?php

                    }
                    
                    ?>

                    </table>
              
            </section>


        </div>



</section>
    
</body>

</html>