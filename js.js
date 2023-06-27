document.addEventListener("DOMContentLoaded", function() {
    //variables
    var words=[" Web Designer","  Digital Marketer","JAVA Developer","Python Developer","FreeLancer","Youtuber","Graphics Designer"],
    part,
    i=0,
    offset=0,
    len = words.length,
    forwards=true,
    skip_count=0,
    skip_delay=15,
    speed=50;
    
    const CWAutoTyping=document.querySelector(".codewheel-auto-typing");
    
    CWAutoTyping.style.whiteSpace = 'nowrap';
    function typingtext(){
        setInterval(function(){
            if(forwards){
                if(offset>=words[i].length){
                    ++skip_count;
                    if(skip_count==skip_delay){
                        forwards =false;
                        skip_count=0;

                    }
                }

            }else{
                if(offset==0){
                    forwards=true;
                    i++;
                    offset=0;
                    if(i>=len){
                        i=0;

                    }
                }
            }
            part=words[i].substr(0,offset);
            if(skip_count==0){
                if(forwards){
                    offset++;
                }else{
                    offset--;

                }
                }
                CWAutoTyping.textContent=part;
            },speed );
    }
    typingtext();
});