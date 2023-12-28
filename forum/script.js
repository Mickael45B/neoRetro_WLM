const shakeButton = document.getElementById('shakeButton');
const shakeWizz = document.getElementById('wizz');

const shakeSound = document.getElementById('shakeSound');

shakeWizz.addEventListener('click', () => {
    // Ajoutez la classe "shake" au bouton
    shakeButton.classList.add('shake');

    // Émet un son en utilisant l'API Web Audio
    if (shakeSound.paused) {
        shakeSound.play();
    }

    // Supprime la classe "shake" après la fin de l'animation
    setTimeout(() => {
        shakeButton.classList.remove('shake');
    }, 1500);
});
