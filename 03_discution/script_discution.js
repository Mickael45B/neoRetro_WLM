var shakeButton = document.getElementById('P3_shakeButton');
var shakeWizz = document.getElementById('P3_wizz');

var shakeSound = document.getElementById('shakeSound');

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


$('.P2_listitem').on('click', function(){
	$(this).removeClass('P2_listitem');
	$(this).addClass('P2_listitemchoisi');

});
                
             
$('.P2_listitem').on('click', function(){
    console.log('rentré dedanss');
    var chaineOriginale = $('.P2_listitemchoisi').prop('id');
    console.log(chaineOriginale+'ok');
});

