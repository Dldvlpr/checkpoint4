const axios = require('axios');
const urlApiLol = 'https://euw1.api.riotgames.com';
axios.defaults.baseURL = urlApiLol;
const apiRiotKey = 'RGAPI-7152edaf-2c82-4114-b480-d1c994c956db';


function getSummonerIdByPlayerName(playerName, apiRiotKey) {


    const promise = axios.get('/lol/summoner/v4/summoners/by-name/' + playerName + '?api_key=' + apiRiotKey)
    return promise.then((response) => response.data.id)
}

let toto = getSummonerIdByPlayerName('franckdes2b3', apiRiotKey).then(data=>{return data})

console.log(toto)
