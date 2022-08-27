const app = new Vue({
    el: '#app',
    data: {
        dataStoraged: false,
        cards: [],
        cardsFiltered: [],
        genreList: [],
        selectedGenre: "all",

    },
    methods: {
        getCards: function(genre = "") {
            axios.get('../controller/controller.php' + genre)
                .then((response) => {
                    this.cards = response.data.data;
                    console.log(response.data.data);
                    if (this.dataStoraged == false) {
                        this.searchGenreToDisplay();
                    }
                    this.dataStoraged = true;
                })
                .catch((error) => {
                    console.warn(error);
                });
        },
        searchGenreToDisplay: function() {
            this.genreList.push('all')
            this.cards.forEach(card => {
                if (!(this.genreList.includes(card.genre.toLowerCase())))
                    this.genreList.push(card.genre.toLowerCase());
            });
            console.log(this.genreList);
        },
        selectGenre: function(genre) {
            this.getCards('?genre=' + genre);
        },

    },
    created: function() {
        this.getCards();
    }
})