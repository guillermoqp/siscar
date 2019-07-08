function popup(url,alto,ancho)
{
    var altura=parseInt(window.screen.height-100);
    var anchura = 1100;//window.screen.width; //
    var y = 0;//parseInt((window.screen.height/2)-(altura/2)); // = 0;
    var x = 0;//parseInt((window.screen.width/2)-(anchura/2));
    params = 'width=' + ancho; //anchura
    params += ', height=' + alto; //altura 
    params += ', top='+y+', left='+x;
    params += ',scrollbars=1,resizable=0,fullscreen=yes';
    newwin = window.open(url, 'windowOpenTab', params);
    if (window.focus) {
        newwin.focus();
    }
    window.onresize = function() 
    {
        window.resizeTo(ancho,alto);
    }
    window.onclick = function() 
    {
        window.resizeTo(ancho,alto);
    }
    return false;
};
function cerrarVentana() {
    window.close();
};