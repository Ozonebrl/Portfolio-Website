document.addEventListener("DOMContentLoaded", function() {
    // Variables
    var words = ["Web Designer", "Digital Marketer", "Java Developer", "Python Developer", "FreeLancer", "Youtuber", "Graphics Designer"];
    var part;
    var i = 0;
    var offset = 0;
    var len = words.length;
    var forwards = true;
    var skip_count = 0;
    var skip_delay = 17;
    var speed = 50;
    
    const CWAutoTyping = document.querySelector(".codewheel-auto-typing");
    
    CWAutoTyping.style.whiteSpace = 'nowrap';
    
    function typingtext() {
        setInterval(function() {
            if (forwards) {
                if (offset >= words[i].length) {
                    skip_count++;
                    if (skip_count == skip_delay) {
                        forwards = false;
                        skip_count = 0;
                    }
                } else {
                    offset++;
                }
            } else {
                if (offset == 0) {
                    forwards = true;
                    i++;
                    if (i >= len) {
                        i = 0;
                    }
                } else {
                    offset--;
                }
            }
            part = words[i].substr(0, offset);
            CWAutoTyping.textContent = part;
        }, speed);
    }
    
    typingtext();
});
