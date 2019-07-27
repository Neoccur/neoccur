// Welcome to the JavaScript library !
// You may call these functions in your HTML anytime
// As long as this file is loaded before-hand

function languageClickEvent(lang) {
  switch (lang) {
    case "en":
      document.location.href = "http://neoccur.com";
      break;
    default:
      document.location.href = "http://neoccur.com/"+ lang + "/";
  };
  /*if (lang == "en") {
    // English
    document.location.href = "http://neoccur.com";
  } else if (lang == "fr") {
    // French
    document.location.href = "http://neoccur.com/fr/";
  };*/
};

function underConstruction() {
  alert("This website is currently under construction and is not fully operational. You have been warned.");
};
