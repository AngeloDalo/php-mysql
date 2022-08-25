<?php

include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM persone WHERE nome LIKE '{$input}%' OR cognome LIKE '{$input}%' OR email LIKE '{$input}'";
    $result = mysqli_query($con, $query);
    // $result = mysqli_query($con,"SELECT FROM persone WHERE nome LIKE '{$input}%' OR cognome LIKE '{$input}%' OR email LIKE '{$input}'");

    if(mysqli_num_rows($result) > 0){?>
        
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Cognome</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $cognome = $row['cognome'];
                    $email = $row['email'];

                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $cognome; ?></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <?php
    } else {
       echo "<h6 class='text-danger text-center mt-3'>No data Found </h6>"; 
    }
}

?>