function changeDisplayCondition() {
  var button = document.getElementById("display_button");
  var hidden_disp = document.getElementById("display");

  if (button.classList.contains('public')) {
    button.classList.remove('public');
    button.classList.add('private');
    button.value = "Private";
    hidden_disp.value = 0;
  }
  else {
    button.classList.remove('private');
    button.classList.add('public');
    button.value = "Public";
    hidden_disp.value = 1;
  }
}

function changeSendCondition() {
  var button = document.getElementById("submit_button");
  //button.style.backgroundColor = "green";
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
  button.classList.add('private');
  hidden_disp.value = 0;
}


function changeBannerImage(node) {
  var banner_image_list = ["banner.jpg", "back_he.jpg"];
  var i = 0;
  var current_image_name = node.src.substr(node.src.lastIndexOf('/')+1);   
  //alert(current_image_name);
  for (i = 0; i < banner_image_list.length; i++) {
    if (banner_image_list[i] == current_image_name) {
      ++i; break;
    }
  }
  i = i % banner_image_list.length;

  node.src = "./images/" + banner_image_list[i];
}

function changeScheme(node) {
  var p = node;
  while (p.tagName != 'BODY') {
    if (p.nodeName == 'SECTION') {
      p.classList.add('animate');
      if (p.classList.contains('invert')) p.classList.remove('invert');
      else p.classList.add('invert');
      setTimeout(function() {
        p.classList.remove('animate');
      }, 500);
      return;
    }
    p = p.parentNode;
  }
}