"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function _createClass(e,t,a){return t&&_defineProperties(e.prototype,t),a&&_defineProperties(e,a),e}var App=function(){function e(){_classCallCheck(this,e)}return _createClass(e,[{key:"initComponents",value:function(){Waves.init(),feather.replace();[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll(".toast")).map(function(e){return new bootstrap.Toast(e)});var e=document.getElementById("toastPlacement");e&&document.getElementById("selectToastPlacement").addEventListener("change",function(){e.dataset.originalClass||(e.dataset.originalClass=e.className),e.className=e.dataset.originalClass+" "+this.value});var n=document.getElementById("liveAlertPlaceholder"),t=document.getElementById("liveAlertBtn");t&&t.addEventListener("click",function(){var e,t,a;e="Nice, you triggered this alert message!",t="primary",(a=document.createElement("div")).innerHTML='<div class="alert alert-'+t+' alert-dismissible" role="alert">'+e+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',n.append(a)}),document.getElementById("app-style").href.includes("rtl.min.css")&&(document.getElementsByTagName("html")[0].dir="rtl")}},{key:"initMenu",value:function(){var e=document.body,t=document.querySelector(".button-toggle-menu");t&&t.addEventListener("click",function(){"default"==e.getAttribute("data-sidebar")?e.setAttribute("data-sidebar","hidden"):e.setAttribute("data-sidebar","default")});t=function(){window.innerWidth<1040?e.setAttribute("data-sidebar","hidden"):e.setAttribute("data-sidebar","default")};t(),window.addEventListener("resize",t),$("#side-menu").length&&($("#side-menu li .collapse").on({"show.bs.collapse":function(e){e=$(e.target).parents(".collapse.show");$("#side-menu .collapse.show").not(e).collapse("hide")}}),$("#side-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("menuitem-active"),$(this).parent().parent().parent().addClass("show"),$(this).parent().parent().parent().parent().addClass("menuitem-active"),"sidebar-menu"!==(e=$(this).parent().parent().parent().parent().parent().parent()).attr("id")&&e.addClass("show"),$(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active"),"wrapper"!==(e=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id")&&e.addClass("show"),(e=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body")||e.addClass("menuitem-active"))}))}},{key:"init",value:function(){this.initComponents(),this.initMenu()}}]),e}();(new App).init();
$(document).ready(function() {
    $('.select2').select2();
});
function confirmDelete(event, id) {
  event.preventDefault(); // Prevent default form submission
  Swal.fire({
      title: "Êtes-vous sûr ?",
      text: "Vous ne pourrez pas revenir en arrière !",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Oui, supprimez-le !"
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
      }
  });
}
