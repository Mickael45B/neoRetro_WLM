/*
    - Nom du fichier : API_GIF.js
    - Type : fonctionnement
    - Language(s) : JS 
*/

/* PARTIE 01 ==> ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- GENERAL ==> */
    
/* <== PARTIE 01 ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== GENERAL */
    
/* PARTIE 02 ==> -------------------------------------------------------------------------------------------------------------------------------------------------- AFFICHAGE DUN MEME AU HASARD ==> */
    document.addEventListener('DOMContentLoaded', function () {
      // Gestionnaire d'événements pour le clic sur la div "blagueChuckNorris"
      const blagueChuckNorrisDiv = document.getElementById('blagueChuckNorris');
      blagueChuckNorrisDiv.addEventListener('click', async function () {
        try {
          // Faire une requête à l'API Chuck Norris pour obtenir une blague aléatoire
          const response = await fetch('https://api.chucknorris.io/jokes/random');
          const jokeData = await response.json();

          // Récupérer la blague depuis les données JSON
          const jokeValue = jokeData.value;

          // Mettre à jour la zone de texte avec la blague
          const messageAEnvoye = document.getElementById('messageAEnvoye');
          const currentText = messageAEnvoye.value;

          // Ajouter la blague à la fin du texte
          messageAEnvoye.value = currentText + ' ' + jokeValue;

          // Fermer la bulle
          bubbleContainer.remove();
          bubbleContainer = null;
        } catch (error) {
          console.error('Erreur lors de la récupération de la blague Chuck Norris :', error);
        }
      });
    });
/* <== PARTIE 02 -------------------------------------------------------------------------------------------------------------------------------------------------- <== AFFICHAGE DUN MEME AU HASARD */
