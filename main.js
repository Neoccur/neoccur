// Welcome to the JavaScript library !
// You may call these functions in your HTML anytime
// As long as this file is loaded before-hand

function underConstruction() {
  alert("This website is currently under construction and is not fully operational. You have been warned.");
}

function languageClickEvent(lang) {
  switch (lang) {
    case "en":
      document.location.href = "http://neoccur.com";
      break;
    default:
      document.location.href = "http://neoccur.com/" + lang + "/";
  }
}

/* var myNav = document.getElementById("myNav");
window.onscroll = function() {
  if (window.scrollY >= 100) {
    myNav.classList.remove("nav-scroll");
  } else {
    myNav.classList.add("nav-scroll");
  }
};*/
