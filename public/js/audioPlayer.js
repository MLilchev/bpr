function audioPlayer() {
    var currentSong = 0;
    $("#audioPlayer")[0].src = $("#playlist li a")[0];
    $("#audioPlayer")[0].play();
    $("#playlist li a").click(function(e){
        e.preventDefault();
        $("#audioPlayer")[0].src = this;
        $("#audioPlayer")[0].play();
        $("#playlist li").removeClass("current-song");
        currentSong = $(this).parent().index();
        $(this).parent().addClass("current-song");
    });

    $("#audioPlayer")[0].addEventListener("ended", function(){
        currentSong++;
        if(currentSong == $("#playlist li a").length)
            currentSong = 0;
        $("#playlist li").removeClass("current-song");
        $("#playlist li:eq("+currentSong+")").addClass("currentSong");
        $("#audioPlayer")[0].src = $("#playlist li a")[currentSong].href;
        $("#audioPlayer")[0].play();
    })



}


function audioPlayer2() {
    //var currentSong = 0;
    var audioElement = $("#audioPlayer")[0];
    
    audioElement.src = $("#playlist li a")[0];

    

    if (audioElement === undefined || audioElement === null) {
        alert("There was an error with the audio player on this page. Please contact support.");
        return;
    } else {
        //audioElement.play();
        $("#playlist li a").click(function(e){
            e.preventDefault();
            audioElement.src = this;
            audioElement.play();
            $("#playlist li").removeClass("current-song");
            //currentSong = $(this).parent().index();
            $(this).parent().addClass("current-song");
        });
    }
}