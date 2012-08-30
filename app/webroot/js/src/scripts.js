/**
* This is your App script template. Is already working, all you need to do it build your functions and play :)
* Here you can already use Jquery, Modernizr and Bootstrap.js
*/
;(function() {
  var App,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  App = (function() {
  	// Constructor
    function App() {
      $('.checkscripts').html( this.status() );
      $('.checkmodernizr').html( this.mdzfeatures() );
    }

    App.prototype.status = function() {
      var status = '';

      if( Modernizr ) status += '<strong>Modernizr</strong> READY!<br/>';
      if( $ ) status += '<strong>Jquery</strong> READY!<br/>';

      return status;
    }

    App.prototype.mdzfeatures = function() {
      var features = '';

      if( Modernizr.touch ) features += '<strong>Touch</strong> READY!<br/>';
      if( Modernizr.localstorage ) features += '<strong>LocalStorage</strong> READY!<br/>';
      if( Modernizr.postmessage ) features += '<strong>Cross-window Messaging</strong> READY!<br/>';
      if( Modernizr.sessionstorage ) features += '<strong>sessionStorage</strong> READY!<br/>';
      if( Modernizr.websockets ) features += '<strong>Websockets</strong> READY!<br/>';

      return features;
    }

    return App;

  })();

  $(function() {
    return App = new App();
  });

}).call(this);