const notif = document.querySelector(".notifier");
notif.addEventListener("click", notifier() );

function notifier() {
    console.log(Notification.permission);
   if (Notification.permission === "granted") {
      console.log("granted");
    const notification = new Notification("Welfare - Toujours concentre(e) ?", {
        body: "Appuyez sur la notification si vous etes toujours concentre(e) !"
      //image: "assets/img/logo.png"
 
     })
 
     let isClicked = false;
     
     notification.onclick = (e) => {
         isClicked = true;        
      };
 
      setTimeout(function(){
          if(isClicked === false) {
         window.location.href = "https://192.168.61.146";
      } }, 5000);
   } else if (Notification.permission !== "denied") {
      Notification.requestPermission().then(permission => {
         console.log(permission);
      });
   }
}

// setInterval(() => {
//     notifier();
 //}, 7000);




// function showNotification() {

//     const notification = new Notification("New message incoming", {
//        body: "Hi there. How are you doing?"
//         // icon: ""

//     })

//     let isClicked = false;
    
//     notification.onclick = (e) => {
//         isClicked = true;        
//      };

//      setTimeout(function(){
//          if(isClicked === false) {
//         window.location.href = "https://google.com";
//      } }, 5000);


     
//  }


 
 

 

 

 