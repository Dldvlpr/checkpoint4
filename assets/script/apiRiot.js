import axios from "axios";

const urlApiLol = 'https://euw1.api.riotgames.com';
const apiRiotKey = 'RGAPI-81da8750-b1f7-4283-b7e3-3a489e206628';
let playerName = document.getElementById("playerName")

const form = document.querySelector('#signup-form');

// listen for submit even
form.addEventListener('submit', () => {
    // TODO: submit post request here
});


let url = urlApiLol + `/lol/summoner/v4/summoners/by-name/franckdes2b3?api_key=` + apiRiotKey;

// TODO: faire un objet ou l'on rajoute les urls faire un replace avec un modulo
const apiUrls = {
  sumoner: "/lol/summoner/v4/summoners/by-name/franckdes2b3?api_key=%apikey%"
}
apiUrls.sumoner.replace('%apikey%', apiRiotKey)
// const axios = require('axios');
// const urlApiLol = 'https://euw1.api.riotgames.com';
// axios.defaults.baseURL = urlApiLol;
// const apiRiotKey = 'RGAPI-81da8750-b1f7-4283-b7e3-3a489e206628';
// let playerName = 'franckdes2b3';
//
//
// async function getPlayerData () {
//     axios.get(urlApiLol + '/lol/league/v4/entries/by-summoner/' + playerName + '?api_key=' + apiRiotKey)
//         .then(function (data) {
//             return resolve (data);
//         });
// }
//
// playerData = await getPlayerData();
//
// console.log(playerData)

// setTimeout(() => controller.abort(), 1);
//
//
// document.querySelector("#playerName").addEventListener('input', function () {
//     let url = urlApiLol + `/lol/summoner/v4/summoners/by-name/${this.value}?api_key=` + apiRiotKey;
//     fetch(url)
//         .then(response => response.json()
//             .then(data => {
//                 let playerId = data.id;
//                 let secondUrl = urlApiLol + `/lol/league/v4/entries/by-summoner/${playerId}?api_key=` + apiRiotKey;
//                 fetch(secondUrl).then((response) =>
//                     response.json()
//                         .then(playerData =>
//                             console.log(playerData))
//                 )
//
//
//             )
//             )
//             }
// })


function callAjax (url) {
  let _data = null
  $.ajax({
    type: "GET",
    url: url,
    async: false,
    dataType: "json",
    success : function(data) {
      _data = data
    }
  });
  return _data
}

console.log(callAjax(url).id)
