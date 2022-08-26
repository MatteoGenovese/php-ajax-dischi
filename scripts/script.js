const app = new Vue({
    el: '#app',
    data: {
        dataStoraged: false,
        cards: [],
        cardsFiltered: [],
        genreList: [],

    },
    methods: {
        getCards: function() {
            axios.get('../controller/controller.php')
                .then((response) => {
                    console.log(response.data);
                    this.cards = response.data;
                    this.dataStoraged = true;
                    this.searchGenreToDisplay();
                })
                .catch((error) => {
                    console.warn(error);
                });
        },
        searchGenreToDisplay: function() {
            this.genreList.push('All')
            this.cards.forEach(element => {
                if (!(this.genreList.includes(element.genre)))
                    this.genreList.push(element.genre)
            });
            // console.log(this.genreList);
        },
        searchAlbum: function(needle) {
            // if (needle == 'All') {
            //     this.cardsFiltered = [...this.cards]
            // } else {
            //     this.cardsFiltered = this.cards.filter((element) => {
            //         return element.genre == needle
            //     });
            // }
        },

    },
    created: function() {
        this.getCards();
    }
})