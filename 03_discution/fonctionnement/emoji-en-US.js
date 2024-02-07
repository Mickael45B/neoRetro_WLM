/*
- Nom du fichier : emoji-en-US.js
- Type : fonctionnement
- Language(s) : JS
*/

document.addEventListener('DOMContentLoaded', function () {
// PARTIE 01 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- GENERAL ==>  
    const emojiButton = document.querySelector('.P3_downEmoji');
    let bubbleContainer; 
    let i = 0;
// <== PARTIE 01 -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== GENERAL  

// PARTIE 02 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------- CREATION DE LA BULLE ==>  
      emojiButton.addEventListener('click', function (event) {
      // Supprimer la bulle si elle existe déjà
      if (bubbleContainer) {
        bubbleContainer.remove();
        bubbleContainer = null;
        return;
      }

      // Créer la bulle cliquable
      bubbleContainer = document.createElement('div');
      bubbleContainer.classList.add('bubble-container');

      // Positionner la bulle cliquable juste en dessous, a droite du bouton
      const buttonRect = emojiButton.getBoundingClientRect();
      bubbleContainer.style.top = buttonRect.bottom + 'px';
      bubbleContainer.style.left = buttonRect.left + 'px';
// <== PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------- <== CREATION DE LA BULLE 

// PARTIE 03 ==> ----------------------------------------------------------------------------------------------------------------------------------------------------------- INSERTION DANS LE HTML ==>  
      // En-tête "Rechercher Emoji"
      const header = document.createElement('div');
      header.classList.add('header');
      header.innerHTML = `<input type="text" id="emojiSearchInput" placeholder="Rechercher un Emoji">`;

      bubbleContainer.appendChild(header);

      // Créer la grille d'émoticônes
      const grid = document.createElement('div');
      grid.classList.add('grida');

      // Ajouter la bulle cliquable à la page
      document.body.appendChild(bubbleContainer);
// <== PARTIE 03 ----------------------------------------------------------------------------------------------------------------------------------------------------------- <== INSERTION DANS LE HTML 

// PARTIE 04 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------- GESTIONNAIRE D EVENEMENTS ==>  
      // Gestionnaire d'événements pour fermer la bulle si l'utilisateur clique ailleurs
      document.addEventListener('click', function (event) {
        if (!bubbleContainer.contains(event.target) && event.target !== emojiButton) {
          bubbleContainer.remove();
          bubbleContainer = null;
        }
      });

      // Gestionnaire d'événements pour la recherche d'Emoji
      const emojiSearchInput = document.getElementById('emojiSearchInput');
      emojiSearchInput.addEventListener('input', async function () {
        const searchTerm = emojiSearchInput.value.toLowerCase();
// <== PARTIE 04 -------------------------------------------------------------------------------------------------------------------------------------------------------- <== GESTIONNAIRE D EVENEMENTS 

// PARTIE 05 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ RECHERCHE DANS BIBLIOTHEQUE ==>  
        try {
          // Charger votre JSON avec fetch
          const response = await fetch('../03_discution/fonctionnement/emoji-en-US.json');
          const emojis = await response.json();
          
          grid.innerHTML = '';// Effacer le contenu précédent de la grille

          // Fonction de filtre pour les clés (emojis) qui contiennent la valeur recherche dans leur tableau de valeurs
          function filterEmojisByValue(value) {
            return Object.keys(emojis).filter(emoji => {
              const emojiValues = emojis[emoji].map(val => val.toLowerCase());
              return emojiValues.some(val => val.includes(value.toLowerCase()));
            });
          }
          
          const filteredEmojis = filterEmojisByValue(searchTerm);// Utiliser la fonction de filtre pour obtenir les clés correspondantes
// <== PARTIE 05 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== RECHERCHE DANS BIBLIOTHEQUE 

// PARTIE 06 ==> ------------------------------------------------------------------------------------------------------------------------------------------- BULLE : CONTRUCTION RESULTAT RECHERCHE ==>  
          // Iterer sur chaque clé
          filteredEmojis.forEach(emoji => {
            const cell = document.createElement('div');
            cell.classList.add('emoji-cell');

            // constrution de la balise
            const img = document.createElement('img');
            img.setAttribute('id', 'emojiChoisi_' + i);
            img.src =  emoji + '.svg';
            img.setAttribute('value',  emoji );
            img.alt = emoji;
// <== PARTIE 06 ------------------------------------------------------------------------------------------------------------------------------------------- <== BULLE : CONTRUCTION RESULTAT RECHERCHE

// PARTIE 07 ==> ---------------------------------------------------------------------------------------------------------------------------------------------- INSERTION DANS LE MESSAGE A ENVOYER ==>  
            // Ajouter un écouteur d'événements pour le clic sur l'Emoji
            cell.addEventListener('click', function () {
              // Récupérer la clé de l'Emoji
              const emojiKey = emoji;

              // Insérer l'Emoji à la position du curseur dans la zone de texte
              const messageAEnvoye = document.getElementById('messageAEnvoye');
              const cursorPosition = messageAEnvoye.selectionStart;
              const currentText = messageAEnvoye.value;
              const newText =
                currentText.substring(0, cursorPosition) +
                emojiKey +
                currentText.substring(cursorPosition);
                messageAEnvoye.value = newText;
              console.log($('#messageAEnvoye').val());
              // Fermer la bulle
              bubbleContainer.remove();
              bubbleContainer = null;
            });
// <== PARTIE 07 ---------------------------------------------------------------------------------------------------------------------------------------------- <== INSERTION DANS LE MESSAGE A ENVOYER

            cell.appendChild(img); // Ajouter l'Emoji à la cellule
            grid.appendChild(cell); // Ajouter la cellule à la grille
            i++;
          });
        } catch (error) {
          console.error('Erreur lors du chargement du fichier JSON :', error);
        }
      });

      bubbleContainer.appendChild(grid);


    });
  });
