document.getElementById('signUpButton').onclick = function() {
    const signUpBox = document.getElementById('signUpBox');
    signUpBox.classList.toggle('hidden');
};

document.getElementById('signUpForm').onsubmit = function(event) {
    event.preventDefault(); 
    alert('Sign Up form submitted!');
    document.getElementById('signUpBox').classList.add('hidden');
    document.getElementById('signUpForm').reset();
};

document.getElementById('logInButton').onclick = function() {
    const logInBox = document.getElementById('logInBox');
    logInBox.classList.toggle('hidden');
};

document.getElementById('logInForm').onsubmit = function(event) {
    event.preventDefault(); 
    alert('Log In form submitted!');
    document.getElementById('logInBox').classList.add('hidden');
    document.getElementById('logInForm').reset();
};


var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop:true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 150,
      modifier: 2.5,
      slideShadows: true,
    },
    autoplay:{
  
      delay:4000,
      disableOnInteraction:false,
    }
  
  });



 

