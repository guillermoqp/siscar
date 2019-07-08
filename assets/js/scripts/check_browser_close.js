var validNavigation = false;
function wireUpEvents() {
  var dont_confirm_leave = 0;
  var leave_message = '¿Seguro que deseas Salir?';
  function goodbye(e) {
    if (!validNavigation) {
      if (dont_confirm_leave!==1) {
        if(!e) e = window.event;
        e.cancelBubble = true;
        e.returnValue = leave_message;
        if (e.stopPropagation) {
          e.stopPropagation();
          e.preventDefault();
        }
        return leave_message;
      }
    }
  }
  window.onbeforeunload=goodbye;
  $(document).bind('keypress', function(e) {
    if (e.keyCode == 116){
      validNavigation = true;
    }
  });
  $("a").bind("click", function() {
    validNavigation = true;
  });
  $("form").bind("submit", function() {
    validNavigation = true;
  });
  $("input[type=submit]").bind("click", function() {
    validNavigation = true;
  });
}
$(document).ready(function() {
  wireUpEvents();
});