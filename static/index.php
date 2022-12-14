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
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <div id="app">

        <header>
            <img src="../imgs/spotify.png" alt="spotify-logo">
        </header>


        <main>
            <section>

                <div id="genre-select-container" class="container">
                    <label for="genreSelect">Choose the music genre: </label>
                    <select v-model="selectedMusicGenre" name="genreSelect" id="genre-select" @change="getCardsAfterGenreSelectClick(selectedMusicGenre)">
                        <option value="all genres" selected>All genres</option>
                        <option v-for="(genre,index) in genreList" :key="index" :value="genre.toLowerCase()">
                            {{genre.substring(0,1).toUpperCase() + genre.substring(1) }}
                        </option>
                    </select>
                </div>

                <div id="music-card-container" class="container d-flex flex-wrap p-5">
                    <div class="music-card" v-for="card in cards">
                        <div class="img-container">
                            <img :src="card.poster" alt="">
                        </div>
                        <h2>{{card.title}}</h2>
                        <h3>
                            {{card.author}}
                            <br>
                            {{card.year}}
                        </h3>
                    </div>
                </div>

            </section>
        </main>

    </div>

    <script src="../scripts/script.js"></script>
</body>

</html>