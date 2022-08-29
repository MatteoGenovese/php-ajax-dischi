const app = new Vue({

    el: '#app',

    data: {
        cards: [],
        cardsFiltered: [],
        genreList: [],
        selectedMusicGenre: "all genres",
    },


    methods: {

        getCards: function(genre = "") {
            axios.get('../controller/controller.php' + genre)
                .then((response) => {
                    this.cards = response.data.data;
                    console.log(response.data.data);
                    this.searchGenreToDisplay();
                })
                .catch((error) => {
                    console.warn(error);
                });
        },

        searchGenreToDisplay: function() {
            this.genreList = [];
            this.cards.forEach(card => {
                if (!(this.genreList.includes(card.genre.toLowerCase())))
                    this.genreList.push(card.genre.toLowerCase());
            });
            console.log(this.genreList);
        },

        getCardsAfterGenreSelectClick: function(genre) {
            this.getCards('?genre=' + genre);
        },

    },


    created: function() {
        this.getCards();
    }
})