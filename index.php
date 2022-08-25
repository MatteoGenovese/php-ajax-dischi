<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php
        include __DIR__ . '/db.php';
    ?>

    <header>
        <img src="./imgs/spotify.png" alt="spotify-logo">

    </header>
    <main>
        <section>

            <div class="container">
                <label for="genre">Choose genre:</label>
                <select name="genre" id="genre" v-model="inputSelect" @change="$emit('search', inputSelect)">
                    <?php foreach ($genres as $key => $genre) {
                    ?>
                        <option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
                    <?php  }; ?>
                </select>
            </div>

            <div class="container d-flex flex-wrap p-5 card-container">
                <?php foreach ($discs as $key => $disc) {
                    # code...
                ?>
                    <div class="card">
                        <div class="img-container">
                            <img src="<?php echo $disc['poster']; ?>" alt="">
                        </div>
                        <h2><?php echo $disc['title']; ?> </h2>
                        <h3>
                            <?php echo $disc['author']; ?>
                            <br>
                            <?php echo $disc['year']; ?>
                        </h3>
                    </div>
                <?php   } ?>
            </div>
        </section>

    </main>

    </div>
    <script src="./scripts/script.js"></script>

</body>

</html>