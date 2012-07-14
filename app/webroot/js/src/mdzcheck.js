$.fn.mdzcheck = function() {

	var features = '';

	if( Modernizr.touch ) features += '<strong>Touch</strong> READY!<br/>'
	if( Modernizr.localstorage ) features += '<strong>LocalStorage</strong> READY!<br/>'
	if( Modernizr.postmessage ) features += '<strong>Cross-window Messaging</strong> READY!<br/>'
	if( Modernizr.sessionstorage ) features += '<strong>sessionStorage</strong> READY!<br/>'	
	if( Modernizr.websockets ) features += '<strong>Websockets</strong> READY!<br/>'		


    return this.append( features );
};