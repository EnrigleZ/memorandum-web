function changeDisplayCondition() {
  var button = document.getElementById("display_button");
  var hidden_disp = document.getElementById("display");
  if (button.value == "Public") {
    button.value = "Private";
    button.style.backgroundColor = "pink";
    hidden_disp.value = 0;
  }
  else {
    button.value = "Public";
    button.style.backgroundColor = "#add2f0";
    hidden_disp.value = 1;
  }
}

function changeSendCondition() {
  var button = document.getElementById("submit_button");
  button.style.backgroundColor = "green";
  button.value = "Sending";

}

function isEllipsis(p) {
  var clientHeight = p.clientHeight;
  var scrollHeight = p.scrollHeight;
  //alert(scrollHeight - clientHeight);


  if (scrollHeight - clientHeight > 5) return scrollHeight;
  else return 0;
};


function unfoldArticle(lable) {
  var pArticle = lable.parentNode.parentNode.parentNode.childNodes;
  //alert(pArticle[i]);

  lable.values = !lable.values;

  for (var i = 0; i < pArticle.length; i++) {
    if (pArticle[i].nodeName == "P") {
      var actualHeight = isEllipsis(pArticle[i]);
      if (actualHeight) {
        //pArticle[i].style.height = "auto";
        pArticle[i].style.maxHeight = actualHeight+"px";
        lable.innerHTML = "Close";
      }
      else {
        pArticle[i].style.maxHeight = "93px";
        if (lable.innerHTML != "Read More") lable.innerHTML = "Read More";
        else lable.innerHTML = "Close";
      }
      break;
    }
  }
}

function getStarted() {
  var button = document.getElementById("display_button");
  var hidden_disp = document.getElementById("display");
  button.value = "Private";
  button.style.backgroundColor = "pink";
  hidden_disp.value = 0;
}