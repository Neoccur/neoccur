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
