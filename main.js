// Welcome to the JavaScript library !
// You may call these functions in your HTML anytime
// As long as this file is loaded before-hand

function languageClickEvent(lang) {
  if (lang == "en") {
      document.location.href = "http://neoccur.com/";
  }
  else {
      document.location.href = "http://neoccur.com/"+ lang + "/";
  };

};

function navBarReact() {
  let myNav = document.getElementById('myNav');

    if (document.documentElement.scrollTop > 300) {
        myNav.classList.add("nav-colored");
        myNav.classList.remove("nav-transparent");
    }

    else {
      myNav.classList.add("nav-transparent");
        myNav.classList.remove("nav-colored");
    };

};
