var protocol = location.protocol;
var slashes = protocol.concat("//");
var host = slashes.concat(window.location.hostname);
//var url_base = host + ":81/siscar/";
var url_base = host + "/siscar/";
localStorage.setItem("url_base",url_base);
sessionStorage.setItem("url_base",url_base);