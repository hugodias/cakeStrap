/**
* This script is automatically called when the user is in the controller 'pages' and action 'home'
*/
;(function() {
  var App,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  App = (function() {
  	// Constructor
    function App() {
      $('.checkscripts').html( this.status() );
      $('.checkmodernizr').html( this.mdzfeatures() );

      this.initialize();
    }

    App.prototype.initialize = function() {
      // Allow to change the app theme
      this.changeTheme();
    }

    App.prototype.status = function() {
      var status = '';

      if( Modernizr ) status += '<strong>Modernizr</strong> READY!<br/>';
      if( $ ) status += '<strong>Jquery</strong> READY!<br/>';

      return status;
    }

    App.prototype.changeTheme = function() {
      var $stylesheet = $('link[data-extra="theme"]');

      $('.change-theme').bind('click',function() {
        var theme,oldhref,pattern;

        $('.change-themes-list a').removeClass('active');
        $(this).addClass('active');
        
        theme = $(this).attr('alt');
        
        oldhref = $stylesheet.attr('href');

        pattern = /bootstrap.*\.min/g
        
        $stylesheet.attr('href', oldhref.replace(pattern,"bootstrap-" + theme + ".min") );

      })
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