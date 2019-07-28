// Welcome to the JavaScript library !
// You may call these functions in your HTML anytime
// As long as this file is loaded before-hand

function underConstruction() {
  alert("This website is currently under construction and is not fully operational. You have been warned.");
};

function languageClickEvent(lang) {
  switch (lang) {
    case "en":
      document.location.href = "http://neoccur.com";
      break;
    default:
      document.location.href = "http://neoccur.com/"+ lang + "/";
  };

};

function navBarReact() {
  console.log("scrolled" + document.documentElement.scrollTop);
  let myNav = document.getElementById('myNav');

    if (document.documentElement.scrollTop > 500) {
        myNav.classList.add("nav-colored");
        myNav.classList.remove("nav-transparent");
    }

    else {
        myNav.classList.add("nav-transparent");
        myNav.classList.remove("nav-colored");
    };

};
