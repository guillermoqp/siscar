var url_base=(localStorage)?localStorage.getItem("url_base"):sessionStorage.getItem("url_base");
var SessionTimeout = function() {
    var i = function() {
        $.sessionTimeout({
            title: "¡Tu sesion va a finalizar!",
            message: "Tu sesion va a finalizar pronto.",
            keepAliveUrl: url_base+"actualizarSesion",
            logoutUrl: url_base+"salir",
            redirUrl: url_base+"session_expired",
            warnAfter: 10000,//4 segundos
            redirAfter: 25000,//15 segundos
            ignoreUserActivity: !0,
            countdownMessage: "Redireccionando a Lock en {timer} segundos.",
            countdownBar: true,
            logoutButton: "Salir",
            keepAliveButton: "Permanecer Activo",
            countdownSmart: true,
        })
    };
    return {
        init: function() {
            i()
        }
    }
}();
jQuery(document).ready(function() {
    SessionTimeout.init();
});