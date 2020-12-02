function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).html()).select();
    document.execCommand("copy");
    $temp.remove();
    alert("URL 복사가 완료되었습니다. 붙여넣기를 이용하여 원하는 곳에 붙여넣으세요.")
}

$(document).ready(function() {
  $(".page-toggle").click(function() {
      $("nav").toggleClass("active");
      $(".page-toggle").toggleClass("change");
      $('body').css('overflow', 'hidden');
  });
});

function closeMenu(){
    $('nav').removeClass('active');
    $('.page-toggle').removeClass('change');
    $('body').css('overflow', 'auto');
}

function getRightURL(n) {
  var tmpURL = n.replace(/\s/g, "")
  var tmp = tmpURL.toLowerCase();
  if( tmp.indexOf("http://") == 0 ||
      tmp.indexOf("https://") == 0)
          return tmpURL;
  else
          return "http://"+tmpURL;
}

$(document.body).click( function(e) {
     closeMenu();
});

$(".page-toggle").click( function(e) {
  e.stopPropagation();
});

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-165217806-1');