// document.addEventListener('DOMContentLoaded', function() {
    
//     popup = document.querySelector(".wp-block-button__link.wp-element-button")
//     body = document.querySelector("body")
//     temp = "Bottom-center"
//     anime = "Slide from top"
//     custom_css = "text-decoration: underline; font-size: 25px;text-transform: uppercase;"
    
//     popup.addEventListener("click", () => {

//         function Copy(){
//             const tempInput = document.createElement("input");
//             tempInput.value = popup.innerText;
//             document.body.appendChild(tempInput);
//             tempInput.select();
//             document.execCommand("copy");
//             document.body.removeChild(tempInput);
//         }
//         Copy()

//         const block = this.createElement("div")
//         block.classList.add("popup")
//         // block.textContent = "Pijemy za lepszy czas.. Za każdy dzień który w życiu trwa..."
//         block.textContent = "Coppied to clipboard."
//         block.style.backgroundColor = "white"
//         block.style.color = "black"
//         block.style.zIndex = "100"
//         block.style.borderRadius = "15px"
//         body.appendChild(block);

        
//         const style = document.createElement("style")
//         document.head.appendChild(style)
//         const sheet = style.sheet
//         sheet.insertRule('.popup {}')

//         block.style.transition = "0.2s ease"
//         block.style.padding = "1%"
//         block.style.position = "fixed"
//         // block.style.bottom = "10px"
//         // block.style.right = "10px"
//         block.style.transform = "translateX(100%)"

//         if(temp == "Top-left")
//         {
//             block.style.top = "10px"
//             block.style.left = "10px"
//         }
//         else if(temp == "Top-center")
//         {
//             block.style.top = "10px"
//             block.style.left = "40%"
//             block.style.right = "40%"
//             block.style.display = "flex"
//             block.style.justifyContent = "center"
//         }
//         else if(temp == "Top-right")
//         {
//             block.style.top = "10px"
//             block.style.right = "10px"
//         }
//         else if(temp == "Middle-left")
//         {
//             block.style.top = "40%"
//             block.style.bottom = "40%"
//             block.style.left = "10px"
//         }
//         else if(temp == "Middle-center")
//         {
//             block.style.top = "40%"
//             block.style.bottom = "40%"
//             block.style.left = "40%"
//             block.style.right = "40%"
//         }
//         else if(temp == "Middle-right")
//         {
//             block.style.top = "40%"
//             block.style.bottom = "40%"
//             block.style.right = "10px"
//         }
//         else if(temp == "Bottom-left")
//         {
//             block.style.bottom = "10px"
//             block.style.left = "10px"
//         }
//         else if(temp == "Bottom-center")
//         {
//             block.style.bottom = "10px"
//             block.style.left = "40%"
//             block.style.right = "40%"
//         }
//         else if(temp == "Bottom-right")
//         {
//             block.style.bottom = "10px"
//             block.style.right = "10px"
//         }


//         if(anime == "Fade")
//         {
//             block.animate([
//                 { opacity: '0' },
//                 { opacity: '0.5' },
//                 { opacity: '1' }
//               ], {
//                 duration: 500,
//                 easing: 'ease'
//               });
//               setTimeout(() => {
//                 block.animate([
//                     { opacity: '1' },
//                     { opacity: '0.5' },
//                     { opacity: '0' }
//                   ], {
//                     duration: 500,
//                     easing: 'ease'
//                   });
//                   block.style.visibility = "hidden"
//               }, 3000)
    
//             block.style.transform = "translateX(0)"
//         }
//         else if(anime == "Slide from left")
//         {
//             block.animate([
//                     { transform: 'translateX(-100%)' },
//                     { transform: 'translateX(-50%)' },
//                     { transform: 'translateX(0)' }
//                   ], {
//                     duration: 500,
//                     easing: 'ease'
//                   });
//                   setTimeout(() => {
//                     block.animate([
//                         { transform: 'translateX(0)' },
//                         { transform: 'translateX(-50%)' },
//                         { transform: 'translateX(-100%)' }
//                       ], {
//                         duration: 500,
//                         easing: 'ease'
//                       });
//                       block.style.visibility = "hidden"
//                   }, 3000)
        
//                 block.style.transform = "translateX(0)"
//         }
//         else if(anime == "Slide from right")
//         {
//             block.animate([
//                     { transform: 'translateX(100%)' },
//                     { transform: 'translateX(50%)' },
//                     { transform: 'translateX(0)' }
//                   ], {
//                     duration: 500,
//                     easing: 'ease'
//                   });
//                   setTimeout(() => {
//                     block.animate([
//                         { transform: 'translateX(0)' },
//                         { transform: 'translateX(50%)' },
//                         { transform: 'translateX(100%)' }
//                       ], {
//                         duration: 500,
//                         easing: 'ease'
//                       });
//                       block.style.visibility = "hidden"
//                   }, 3000)
        
//                 block.style.transform = "translateX(0)"
//         }
//         else if(anime == "Slide from bottom")
//         {
//             block.animate([
//                     { transform: 'translateY(100%)' },
//                     { transform: 'translateY(50%)' },
//                     { transform: 'translateY(0)' }
//                   ], {
//                     duration: 500,
//                     easing: 'ease'
//                   });
//                   setTimeout(() => {
//                     block.animate([
//                         { transform: 'translateY(0)' },
//                         { transform: 'translateY(50%)' },
//                         { transform: 'translateY(100%)' }
//                       ], {
//                         duration: 500,
//                         easing: 'ease'
//                       });
//                       block.style.visibility = "hidden"
//                   }, 3000)
        
//                 block.style.transform = "translateY(0)"
//         }
//         else if(anime == "Slide from top")
//         {
//             block.animate([
//                     { transform: 'translateY(-100%)' },
//                     { transform: 'translateY(-50%)' },
//                     { transform: 'translateY(0)' }
//                   ], {
//                     duration: 500,
//                     easing: 'ease'
//                   });
//                   setTimeout(() => {
//                     block.animate([
//                         { transform: 'translateY(0)' },
//                         { transform: 'translateY(-50%)' },
//                         { transform: 'translateY(-100%)' }
//                       ], {
//                         duration: 500,
//                         easing: 'ease'
//                       });
//                       block.style.visibility = "hidden"
//                   }, 3000)
        
//                 block.style.transform = "translateY(0)"
//         }

//         // block.animate([
//         //     { transform: 'translateX(100%)' },
//         //     { transform: 'translateX(50%)' },
//         //     { transform: 'translateX(0)' }
//         //   ], {
//         //     duration: 500,
//         //     easing: 'ease'
//         //   });
//         //   setTimeout(() => {
//         //     block.animate([
//         //         { transform: 'translateX(0)' },
//         //         { transform: 'translateX(50%)' },
//         //         { transform: 'translateX(100%)' }
//         //       ], {
//         //         duration: 500,
//         //         easing: 'ease'
//         //       });
//         //       block.style.visibility = "hidden"
//         //   }, 3000)

//         // block.style.transform = "translateX(0)"
//     })
      
//   });