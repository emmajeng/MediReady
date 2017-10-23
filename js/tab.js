function removeClass(el, className) {
  if (el.classList) {
    el.classList.remove(className);
  } else {
      el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
  }
}

function addClass(el, className) {
  if (el.classList) {
      el.classList.add(className);
  } else {
      el.className += ' ' + className;
  }
}

var buttons = document.getElementById('tab-buttons');
var content = document.getElementById('tab-contents');
var currentTab = 'tab-1';

function setTabContents(tabClicked){
  if(tabClicked === currentTab) { return; }

  removeClass(buttons.querySelectorAll('.active')[0], 'active');
  removeClass(content.querySelectorAll('.active')[0], 'active');

  addClass(buttons.getElementsByClassName(tabClicked)[0], 'active');
  addClass(content.getElementsByClassName(tabClicked)[0], 'active');

  currentTab = tabClicked;

}
