// Welcome to the JavaScript library !
// You may call these functions in your HTML anytime
// As long as this file is loaded before-hand
resolution();
function resolution() {
  let res = document.getElementById('res');
  res.innerHTML = "Resolution: " + window.innerWidth + "x" + window.innerHeight;
};

function underConstruction() {
  alert("This website is currently under construction and is not fully operational. You have been warned.");
};

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

    if (document.documentElement.scrollTop > 500) {
        myNav.classList.add("nav-normal");
        myNav.classList.remove("nav-scroll");
    }

    else {
        myNav.classList.add("nav-scroll");
        myNav.classList.remove("nav-normal");
    };

};
