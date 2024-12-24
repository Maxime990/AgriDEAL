
    let searchForm = document.querySelector(".search-form");
    document.querySelector("#search-btn").onclick = () => {
     searchForm.classList.toggle("active");
    loginUser.classList.remove('active');
    shoppingCart.classList.remove('active');
    menuPage.classList.remove('active');
    };

    let shoppingCart = document.querySelector(".shopping-cart");
    document.querySelector("#cart-btn").onclick = () => {
        shoppingCart.classList.toggle("active");
        searchForm.classList.remove('active');
        loginUser.classList.remove('active');
        menuPage.classList.remove('active');
    };
    

    let loginUser = document.querySelector(".login-form");
    
    document.querySelector("#login-btn").onclick = () => {
        loginUser.classList.toggle("active");
        searchForm.classList.remove('active');
        shoppingCart.classList.remove('active');
        menuPage.classList.remove('active');
    };

    let menuPage = document.querySelector(".navbar");
    document.querySelector("#menu-btn").onclick = () => {
        menuPage.classList.toggle("active");
        searchForm.classList.remove('active');
        shoppingCart.classList.remove('active');
        loginUser.classList.remove('active');
    };

   window.onscroll =()=>{
       searchForm.classList.remove('active');
       shoppingCart.classList.remove('active');
       loginUser.classList.remove('active');
       menuPage.classList.remove('active');
   }

   $("input").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
  });

 