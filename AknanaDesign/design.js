// let galleryImages = document.querySelector(".gallerySection"); // an object that grabs all the elments that matches the query
// alert(galleryImages[0]);
let images = document.querySelectorAll('.imageContainer');
// alert(images);
let lastOpenedImage; // a varaible that is used to define the last opened image (currently null at the start of the page since no photos were selected).
// let windowWidth = window.innerWidth;
console.log("design.js begins");


var paragraph = document.querySelector("#designTypeInput");
var choices = document.querySelectorAll('.dropChoice');

// for design drop down menu
if (choices){ 
     choices.forEach( function(choice){ // apply this function to each image we grabbed
          choice.onclick = function(){
               console.log("choice is:");
               console.log(choice.textContent);
               document.getElementById("dropbtn").innerText = choice.textContent;
               // document.getElementById("designType").innerHTML = "لقد اخترت الطراز: " + choice.textContent;
               document.getElementById("designTypeInput").value = choice.textContent;
               console.log(document.getElementById("designTypeInput").value);
          }
     });
}

var choices = document.querySelectorAll('.dropChoice2');
var choic = "";
if (choices){ 
     choices.forEach( function(choice){ // apply this function to each image we grabbed
          choice.onclick = function(){
               console.log("basement choice is:");
               console.log(choice.textContent);
               choic = choice.textContent;
               document.getElementById("dropbtn2").innerText = choic;
               if(choic == "يوجد"){
                    console.log("first condition");
                    document.getElementById("basementInput").value = "1";
               }
               else{
                    console.log("second condition");
                    document.getElementById("basementInput").value = "0";
               }
               // document.getElementById("designType").innerHTML = "لقد اخترت الطراز: " + choice.textContent;
               // document.getElementById("basementInput").value = choice.textContent;
               console.log(document.getElementById("basementInput").value);
          }
     });
}

// ملحق drop menu function
var choices = document.querySelectorAll('.dropChoice3');
var choic = "";
if (choices){ 
     choices.forEach( function(choice){ // apply this function to each image we grabbed
          choice.onclick = function(){
               console.log("basement choice is:");
               console.log(choice.textContent);
               choic = choice.textContent;
               document.getElementById("dropbtn3").innerText = choic;
               if(choic == "يوجد"){
                    console.log("first condition");
                    document.getElementById("basementInput").value = "1";
               }
               else{
                    console.log("second condition");
                    document.getElementById("basementInput").value = "0";
               }
               // document.getElementById("designType").innerHTML = "لقد اخترت الطراز: " + choice.textContent;
               // document.getElementById("basementInput").value = choice.textContent;
               console.log(document.getElementById("basementInput").value);
          }
     });
}

//  a function that is used to show the choices on all the drop menues in the design page.
function show() {
     document.getElementById("dropDown").classList.toggle("show");
}

window.onclick = function(event) {
     if (!event.target.matches('.dropButton')) {
       var dropdowns = document.getElementsByClassName("dropDown");
       var i;
       for (i = 0; i < dropdowns.length; i++) {
         var openDropdown = dropdowns[i];
         if (openDropdown.classList.contains('show')) {
           openDropdown.classList.remove('show');
         }
       }
     }
   }

//    basement drop down

