// This file is to take care of the padding change on scroll
// on the home page only

// It is in a seperate file then main.js so that only the home page calls both,
// and the login and signup pages call only main.js

  var myNav = document.getElementById("myNav");
  window.onscroll = function() {
    if (window.scrollY >= 100) {
      myNav.classList.remove("nav-scroll");
    } else {
      myNav.classList.add("nav-scroll");
    }
  };
  