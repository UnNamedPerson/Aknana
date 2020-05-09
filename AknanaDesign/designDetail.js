let images = document.querySelectorAll('.imageJS');
let lastOpenedImage; // a varaible that is used to define the last opened image (currently null at the start of the page since no photos were selected).

if (images){ // if the images existed
     images.forEach( function(image, index){ // apply this function to each image we grabbed
          image.onclick = function(){
               // let Elementcss = window.getComputedStyle(image);
               // let imageURL = Elementcss.getPropertyValue("Background-image");
               // console.log("the onclick in image details");
               let imageURLPosition = image.src.split("/FileUpload/");
               console.log(imageURLPosition);
               let imageName = imageURLPosition[1].replace(')', ' ');
               
               lastOpenedImage = index ; // since indecies start with 0
               
               var container = document.body;
               var imgDiv = document.createElement("div");
               container.appendChild(imgDiv);
               imgDiv.className = "imagePerview"; // css class for the styling of the selected image
               // imgDiv.setAttribute("onclick", "closeImage()"); //uncommment here if the code for closing image doesn't work

               // imgDiv.style.backgroundImage = "FileUpload" + imageName;
               var bigImage = document.createElement("img");
               bigImage.className = "previewImage";
               bigImage.id = "currentImage";
               bigImage.src = "FileUpload/" + imageName;
               // bigImage.setAttribute("onclick", "closeImage()"); //uncommment here if the code for closing image doesn't work
               imgDiv.appendChild(bigImage);
               bigImage.setAttribute("onclick", "closeImage()");
               // container.appendChild(bigImage);
               bigImage.onload = function(){
                    // console.log("the image has been loaded");
                    var widthDifference = ( ( window.innerWidth - this.width) / 2) ; 

                    // right
                    var nextButton = document.createElement("a");
                    nextButton.appendChild(document.createTextNode(">"));
                    nextButton.className = "imageChangeButton";
                    nextButton.id = "buttonNext";
                    nextButton.onclick = function(){

                         if(lastOpenedImage >= images.length-1){
                              lastOpenedImage = -1;
                         }
                         lastOpenedImage++;
                         // console.log(images.length);
                         console.log(lastOpenedImage);
                         document.querySelector("#currentImage").remove();
                         var bigImage = document.createElement("img");
                         // var Elementcss = window.getComputedStyle(images[lastOpenedImage]);
                         console.log(images[lastOpenedImage]);
                         var imageURL = images[lastOpenedImage].src;
                         var imageURLPosition = imageURL.split("/FileUpload/");
                         var imageName = imageURLPosition[1].replace(')', ' ');
                         var imgDiv = document.querySelector(".imagePerview");
                         bigImage.className = "previewImage";
                         bigImage.id="currentImage";
                         bigImage.src = "FileUpload/" + imageName;
                         bigImage.setAttribute("onclick", "closeImage()");
                         imgDiv.appendChild(bigImage);


                    }
                    
                    nextButton.style.cssText = "right:" + widthDifference + "px;";
                    imgDiv.appendChild(nextButton);

                    
                    // left 
                    var prevButton = document.createElement("a");
                    prevButton.appendChild(document.createTextNode("<"));
                    prevButton.className = "imageChangeButton";
                    prevButton.id = "buttonPrev";
                    prevButton.onclick = function(){
                         
                         if(lastOpenedImage <= 0){
                              lastOpenedImage = images.length;
                         }
                         lastOpenedImage--;
                         console.log(lastOpenedImage)
                         document.querySelector("#currentImage").remove();
                         var bigImage = document.createElement("img");
                         // var Elementcss = window.getComputedStyle(images[lastOpenedImage]);
                         var imageURL = images[lastOpenedImage].src;
                         var imageURLPosition = imageURL.split("FileUpload");
                         var imageName = imageURLPosition[1].replace(')', ' ');
                         var imgDiv = document.querySelector(".imagePerview");
                         bigImage.className = "previewImage";
                         bigImage.id="currentImage";
                         bigImage.src = "FileUpload/" + imageName;
                         bigImage.setAttribute("onclick", "closeImage()");
                         imgDiv.appendChild(bigImage);

                    }
                    // prevButton.setAttribute("onclick", "changeImage(0)");
                    prevButton.style.cssText = "left:" + widthDifference + "px;";
                    imgDiv.appendChild(prevButton);
               } // END of the image load function

               // saving information related to the image title to retrive it in the page we are going to redirect to. 
          }
     });

     function closeImage(){
          
          document.querySelector(".previewImage").remove();
          document.querySelector(".imagePerview").remove();
          document.querySelector(".buttonNext").remove();
          document.querySelector(".buttonPrev").remove();
     }
}


// if (images){ // if the images existed
//      images.forEach( function(image, index){ // apply this function to each image we grabbed
//           image.onclick = function(){
//                // let Elementcss = window.getComputedStyle(image);
//                // let imageURL = Elementcss.getPropertyValue("src");
//                //   USE  the two lines above for the div tag with background image style.
              
//                let imageURLPosition = image.src.split("/FileUpload/");
//                // console.log(imageURLPosition);
//                let imageName = imageURLPosition[1].replace(')', ' ');
//                // console.log(imageName);
//                // lastOpenedImage = index + 1; // since indecies start with 0
               
//                // var container = document.body;
//                // var imgDiv = document.createElement("div");
//                // container.appendChild(imgDiv);
//                // imgDiv.className = "imagePerview";
//                // imgDiv.setAttribute("onclick", "closeImage()");
               
//                // // imgDiv.style.backgroundImage = "FileUpload" + imageName;
               
//                // var bigImage = document.createElement("img");
//                // bigImage.className = "previewImage";
//                // bigImage.src = "FileUpload/" + imageName;
//                // imgDiv.appendChild(bigImage);

//                // imgDiv.onclick = closeImage();
//                // saving information related to the image title to retrive it in the page we are going to redirect to. 
//                localStorage.setItem("imageName", imageName);
//                // document.location.href = "designDetail.php";
//           }
//      });

//      function closeImage(){
//           document.querySelector(".imagePerview").remove();
//           // document.querySelector(".buttonNext").remove();
//           // document.querySelector(".buttonPrev").remove();
//      }
// } // the end of the if(images) statement

function show() {
     document.getElementById("dropDown").classList.toggle("show");
   }