<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alejandro Becerra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <?php
    include('models/consumer.php');
    include('models/address.php');

    use starFish\model\consumer;
    use starFish\model\address;

    ?>
</head>
<body>


<div class="container">
    <br>
    <form action="controllers/consumer/create.php" method="post">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Alejandro" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Becerra" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="25" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="...." required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <br>

    <div class="row col-sm-12">


        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Age</th>
                <th scope="col">Last Address</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $consumers = new consumer\Consumer();
            foreach ($consumers::findAll() as $id => $consumer) {


                ?>
                <tr id="<?php echo $consumer->id; ?>">


                    <th scope="row"> <?php echo $consumer->id; ?></th>
                    <td> <?php echo $consumer->firstName; ?></td>
                    <td> <?php echo $consumer->lastName; ?></td>
                    <td> <?php echo $consumer->age; ?></td>
                    <td> <?php
                        $address = address\Address::findWithConsumerId($consumer->id);
                        echo $address[0]->address;
                        ?></td>
                    <td><i class="fas fa-trash" style="color:red; cursor: pointer"
                           onclick="deleteConsumer(<?php echo $consumer->id; ?>)"></i></td>


                </tr>
            <?php } ?>

            </tbody>
        </table>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="js/delete.js">
</script>
</body>
</html>