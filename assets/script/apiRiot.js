const urlApiLol = 'https://euw1.api.riotgames.com';
const apiRiotKey = 'RGAPI-c6dc3ab4-e694-48cc-8d62-08557c8a48ce';
let controller = new AbortController();
setTimeout(() => controller.abort(), 1);


document.querySelector("#playerName").addEventListener('input', function () {
    for (let i = 3; i <= this.value.length; i++)
        if (i < this.value.length) {
            let url = urlApiLol + `/lol/summoner/v4/summoners/by-name/${this.value}?api_key=` + apiRiotKey;
            fetch(url)
                .then(response => response.json()
                    .then(data => {
                            let playerId = data.id;
                            if (playerId != null) {
                                let secondUrl = urlApiLol + `/lol/league/v4/entries/by-summoner/${playerId}?api_key=` + apiRiotKey;
                                fetch(secondUrl).then((response) =>
                                    response.json()
                                        .then(playerData => console.log(playerData))
                                )
                            }
                        }
                    )
                )
        }
})
