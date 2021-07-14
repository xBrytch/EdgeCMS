var configs = {
    wrappers: [],
    wrapperCount: 0,
    seconds: 9,
    count: 10,
}

function changeTop(elem){
    if(!elem.classList.contains("this-selected")){
        configs.count = configs.seconds;
        resetCounters();

        elem.classList.add("this-selected");
        elem.querySelector(".counter").style.left = "0px";
        elem.querySelector("img").style.transform = "rotateY(360deg)";
        elem.querySelector("img").style.transition = "all 2s";
        elem.querySelector(".counter").style.transition = "all "+configs.seconds+"s";

        document.querySelector(".this-top").classList.remove("this-top")

        for(var i=0; i < configs.wrappers.length; i++){
            if(configs.wrappers[i] == elem.classList[0]){
                configs.wrapperCount = i;
                break;
            }
        }

        document.querySelector(".top-"+configs.wrappers[configs.wrapperCount]).classList.add("this-top")
    }
}

function resetCounters(){
    var boxImage = document.querySelectorAll(".box-image");

    for(var i=0; i < boxImage.length; i++){
        if(boxImage[i].classList.contains("this-selected")){
            boxImage[i].classList.remove("this-selected");
            boxImage[i].querySelector("img").style.transition = "all 0s";
            boxImage[i].querySelector("img").style.transform = "rotateY(0deg)";
        }
        boxImage[i].querySelector(".counter").style.transition = "all 0s";
        boxImage[i].querySelector(".counter").style.left = "-100%";
    }
}

function startCounter(){
    setInterval(function(){
        configs.count--;

        if(configs.count == 0){
            configs.wrapperCount++;
            if(configs.wrapperCount == configs.wrappers.length){
                configs.wrapperCount = 0;
            }
            changeTop(document.querySelector("."+configs.wrappers[configs.wrapperCount]));
        }
    }, 1000);
}

function loadScript(){
    var allWrappers = document.querySelector(".top-images").querySelectorAll(".box-image");
    for(wrapper of allWrappers){
        configs.wrappers.push(wrapper.classList[0]);
    }

    setTimeout(function(){
        changeTop(document.querySelector("."+configs.wrappers[configs.wrapperCount]));
    }, 100);
    startCounter();
}

loadScript();