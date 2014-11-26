 function DOM(selector) {
        this.elem = document.body;
        this.elem.currIndex = 0;
        this.stylePrefixIndex = 0;
        this.stylePrefix = "";
        this.stylePrefixes = [ "", "Webkit", "O", "Moz", "ms" ];
        this.cssPrefixes = ["", "-webkit-", "-o-", "-moz-", "-ms-"];
        var idReg = /#([\w\-]+)/i;
        var match = idReg.exec(selector);
        if(match && match[1])
            this.elem = document.getElementById(match[1]);
        for(var i = 0; i < this.stylePrefixes.length; i++){
            if(this.stylePrefixes[i]+"Animation" in document.documentElement.style){
                this.stylePrefix = this.stylePrefixes[i];
                this.stylePrefixIndex = i;
                break;
            }
        }
    }

    DOM.prototype.createChild = function(elemType, elemId, elemClass) {
        var child = document.createElement(elemType);
        if(elemId && typeof elemId == "string")
            child.setAttribute("id", elemId);
        if(elemClass && typeof elemClass == "string")
            child.className = elemClass;
        this.elem.appendChild(child);
        if(elemId && typeof elemId == "string")
            return new DOM("#"+elemId);
        return child;
    };

    DOM.prototype.trim = function(str) {
        return str.replace(/^\s+|\s+$/g,"");
    };

    DOM.prototype.css = function(cssName, cssValue) {
        var stylePrefixedName = this.stylePrefixes[this.stylePrefixIndex]+cssName;
        // var cssPrefixedValue = this.cssPrefixes[this.stylePrefixIndex]+cssValue;
        if(stylePrefixedName in document.documentElement.style){
            // this.elem.style[stylePrefixedName] = cssPrefixedValue;
            this.elem.style[stylePrefixedName] = cssValue;
        }
        else{
            this.elem.style[cssName] = cssValue;
        }
    };
    DOM.prototype.hasClass = function(className){
        var reg = new RegExp("(^|\\s)"+className+"(\\s|$)","g");
        return reg.test(this.elem.className);
    };
    DOM.prototype.addClass = function(className){
        if(!this.hasClass(className)){
            this.elem.className += (this.trim(this.elem.className)).length==0?className:" "+className;
        }
    };
    DOM.prototype.removeClass = function(className) {
        var reg = new RegExp("(^|\\s)"+className+"(\\s|$)","g");
        if(this.hasClass(className)){
            var self = this;
            this.elem.className = this.elem.className.replace(reg, function(match, position, originText) {
                var middleReg = new RegExp("\\s+"+className+"\\s+");
                var replaceReg = new RegExp(className);
                var returnStr = self.trim(match.replace(replaceReg,""));
                if(middleReg.test(match))
                    return " "+returnStr;
                return returnStr;
            });
        }
    };
    DOM.prototype.toggleClass = function(className) {
        if(this.hasClass(className)){
            this.removeClass(className);
        }
        else{
            this.addClass(className);
        }
    };
    DOM.prototype.bind = function(eventName, listenerFunc, useCapture) {
        if(window.attachEvent){
            this.elem.attachEvent("on"+eventName, listenerFunc);
        }
        else if(window.addEventListener){
            this.elem.addEventListener(eventName, listenerFunc, useCapture || true);
        }
        else{
            console.log("Unkown browser found.")
        }
    };
    DOM.prototype.nextSlide = function(currIndex, slideCount) {
        var pgn1 = new DOM("#pgn_"+(currIndex+1)); // current
        var pgn2 = new DOM("#pgn_"+((currIndex+1)%slideCount+1)); //next
        this.elem.currIndex = (currIndex+1)%slideCount;
        pgn1.toggleClass("selected");
        pgn2.toggleClass("selected");
    };
    DOM.prototype.playSlide = function(currIndex, playIndex) {
        if(currIndex === playIndex)
            return;
        var pgn1 = new DOM("#pgn_"+(currIndex+1)); // slide playing
        var pgn2 = new DOM("#pgn_"+(playIndex+1)); // slide to play
        this.elem.currIndex = playIndex;
        pgn1.removeClass("selected");
        pgn2.addClass("selected");
    };
    DOM.prototype.autoPlay = function(prevIndex, slideHeight) {
        this.toggleClass("trans-even");
        this.toggleClass("trans-odd");
        this.css("marginTop",prevIndex*(-1)*slideHeight+"px");
    };

     DOM.prototype.slide = function(options) {
        /*--initiate parameter--*/
        options = options || {};
        options.interval = options.interval || 1000;
        options.isLinkSupport = options.isLinkSupport || false;
        options.slides = options.slides || {};
        options.slides.count = options.slides.count || 0;
        options.slides.width = options.slides.width || "600px";
        options.slides.height = options.slides.height || "300px";
        var defaultLinks = [];
        for(var i=0; i<options.slides.count; i++)
            defaultLinks.push("#");
        options.slides.slideLink = options.isLinkSupport?options.slides.slideLink:defaultLinks;
        options.slides.slidePath = options.slides.count>0?(options.slides.slidePath || []):[];

        /*--build construction--*/
        var multipledOptions = function(match) {
            return Number(match)*options.slides.count;
        };
        var container = new DOM("#"+options.containerId);
        container.css("width", options.slides.width);
        container.css("height", options.slides.height);
        container.css("overflow", "hidden");
        container.css("margin","0 auto");
        container.addClass("promotion-banner");

        var slides = container.createChild("ul", options.slidesId, "trans-even");
        slides.css("height", options.slides.height.replace(/(^\d+\.?\d*)/, multipledOptions));
        for (var j = 0; j < options.slides.count; j++) {
            var slide = slides.createChild("li", "slide_"+(j+1), "slide");
            if(options.isLinkSupport && typeof options.isLinkSupport == "boolean"){
                var link = slide.createChild("a");
                link.setAttribute("rel","nofollow");
                link.setAttribute("target","_blank");
                link.setAttribute("href",options.slides.slideLink[j]); //// set link path to element a
                var img = document.createElement("img");
                img.setAttribute("src",options.slides.slidePath[j]);
                link.appendChild(img);
            }
            else{
                var img = slide.createChild("img");
                img.setAttribute("src",options.slides.slidePath[j]);
            }
        }

        var pager = container.createChild("ol", "pager", "carousel-pager");
        pager.addClass("carousel_pager");
        for (var k = 0; k < options.slides.count; k++) {
            var pgn = pager.createChild("li", "pgn_"+(k+1), "pgn");
            var textNode = document.createTextNode(k+1+"");
            pgn.elem.appendChild(textNode);
            if(k == 0)
                pgn.addClass("selected");
        }

        /*--amination begin--*/
        var m = 0;
        var slideHeight = parseFloat(options.slides.height);
        var intervalTime = options.interval+1000; //need extra 1s
        var timer = window.setInterval(function() {
            slides.nextSlide(m, options.slides.count);
            m = (++m)%options.slides.count;
            slides.autoPlay(m, slideHeight);
        },intervalTime);
        for(var n=0; n<options.slides.count; n++){
            var pgn = new DOM("#pgn_"+(n+1));
            pgn.bind("click", function(e){
                window.clearInterval(timer);
                var playIndex = parseInt(this.id.replace("pgn_",""))-1;
                slides.playSlide(slides.elem.currIndex, playIndex);
                slides.autoPlay(playIndex, slideHeight);
                m = playIndex;
                timer = window.setInterval(function() {
                    slides.nextSlide(m, options.slides.count);
                    m = (++m)%options.slides.count;
                    slides.autoPlay(m, slideHeight);
                },intervalTime);
            });
        }
    };

    window.onload = function(e) {
        var container = new DOM("#container");
        container.slide({
            containerId: "container",
            slidesId: "slides",
            slides:{
                count: 5,
                width: "1280px",
                height: "392px",
                slidePath:[
              "image/forum.png",
              "Student Kebab UIO_3.JPG",
              "image/forum.png",
              "image/forum.png"
                ],
                slideLink:[
                "https://www.chess.no",
                "http://www.finn.no",
                "http://cn.bing.com/",
                "http://google.com.hk/"
                ]
            },
            interval: 2000,
            isLinkSupport: true
        });
};

//Twitter kode
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
//Slutt Twitter kode

//Instagram kode
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="http://instagramfollowbutton.com/components/instagram/v2/js/ig-follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));
//Slutt Instagram kode

//Sideslider start
var imageCount = 1;
var total = 4;

function photo(x) {
	var image = document.getElementById('image');
	imageCount = imageCount + x;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}
		image.src = "Images/img"+ imageCount +".jpg";
}

window.setInterval(function photoA() {
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}
		image.src = "Images/img"+ imageCount +".jpg";
},5000);
//Sideslider slutt
