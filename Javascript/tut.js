console.log("Hi its tut 6");
console.log("Hi its tut 61");
const name = "ravi hi";
console.log(name);
let array=[1,2,3,4,5,6];

var objdiv = document.getElementById("mydiv");
var colors = ["yellow","red","orange","blue","navy"];
var nextcolor = 1;

// setInterval("objdiv.style.backgroundColor = colors[nextcolor++%colors.length];",1000);
// setInterval("document.body.style.backgroundColor = colors[nextcolor++%colors.length];",5000);
    

function decorate() {
    document.getElementById("one").style.backgroundColor = "yellow";
    // document.getElementById("one").style.margin = "25px" ;
    setInterval(function (ms) {
        document.getElementById("one").style.backgroundColor = colors[nextcolor++%colors.length];
        document.getElementById("one").style.transitionDuration = "2s" ;
        document.getElementById("one").style.transitionDelay = "0.25s" ;
    
    },500);
    document.getElementById("one").style.transitionProperty = "width" ;
    document.getElementById("one").style.width = "100%" ;
    document.getElementById("one").style.transitionDuration = "2s" ;
    document.getElementById("one").style.transitionDelay = "0.25s" ;


}

for (let i = 0; i < array.length; i++) {
    const element = array[i];
    console.log(element);
    console.log(colors[nextcolor++%colors.length]);
}