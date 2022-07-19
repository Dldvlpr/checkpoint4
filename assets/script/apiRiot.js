const axios = require('axios');
const urlApiLol = 'https://euw1.api.riotgames.com';
axios.defaults.baseURL = urlApiLol;
const apiRiotKey = 'RGAPI-c6dc3ab4-e694-48cc-8d62-08557c8a48ce';

// function getSummonerIdByPlayerName(playerName, apiRiotKey) {
//
//     axios.get('/lol/summoner/v4/summoners/by-name/' + playerName + '?api_key=' + apiRiotKey)
//         .then(({data}) => {
//             data.id
//         }).catch(function (error) {
//         return "Une erreur s'est produite merci de refaire votre recherche"
//     })
// }
//
// let Id = getSummonerIdByPlayerName('franckdes2b3', apiRiotKey)
// console.log(Id)

function getSummonerIdByPlayerName(playerName, apiRiotKey) {
    return fetch('https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/' + playerName + '?api_key=' + apiRiotKey)
       .then(response => response.json())
       .then(data => {
           console.log(data)
       })
       .catch(() => alert('error'))
}

let Id = getSummonerIdByPlayerName('franckdes2b3', apiRiotKey)
console.log(Id)
