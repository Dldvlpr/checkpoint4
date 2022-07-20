const urlApiLol = 'https://euw1.api.riotgames.com';
const apiRiotKey = 'RGAPI-c6dc3ab4-e694-48cc-8d62-08557c8a48ce';

function getSummonerIdByPlayerName(urlApiLol, playerName, apiRiotKey) {
    return fetch(urlApiLol + '/lol/summoner/v4/summoners/by-name/' + playerName + '?api_key=' + apiRiotKey)
        .then(response => response.json())
        .then(data => {
            console.log(data)
        })
        .catch(() => alert("Une erreur s'est produite merci de refaire votre recherche."))
}

let Id = getSummonerIdByPlayerName(urlApiLol, 'franckdes2b3', apiRiotKey)
console.log(Id)
