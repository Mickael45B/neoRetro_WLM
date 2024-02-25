    //<button id="startRecording">Commencer l'enregistrement</button>
//<button id="stopRecording">Arrêter l'enregistrement</button>  

    //<script>
    document.getElementById('startRecording').addEventListener('click', function() {
        if (navigator.mediaDevices === undefined) {
          alert("Votre navigateur ne prend pas en charge l'enregistrement audio.");
          return;
        }
      
        navigator.mediaDevices.getUserMedia({ audio: true })
          .then(function(mediaStream) {
            var mediaRecorder = new MediaRecorder(mediaStream);
            var chunks = [];
      
            mediaRecorder.ondataavailable = function(e) {
              chunks.push(e.data);
            }
      
            mediaRecorder.onstop = function(e) {
              var blob = new Blob(chunks, { type: 'audio/ogg; codecs=opus' });
              var url = window.URL.createObjectURL(blob);
              var a = document.createElement('a');
              a.href = url;
              a.download = 'enregistrement_audio.ogg';
              document.body.appendChild(a);
              a.click();
            }
      
            mediaRecorder.start();
            
            document.getElementById('startRecording').disabled = true;
            document.getElementById('stopRecording').disabled = false;
          })
          .catch(function(err) {
            console.log('Erreur lors de l\'accès au microphone : ', err);
          });
      });
      
      document.getElementById('stopRecording').addEventListener('click', function() {
        mediaRecorder.stop();
        document.getElementById('stopRecording').disabled = true;
      });//</script>
      