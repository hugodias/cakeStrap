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
      $('.checkjs').html( this.status() );
    }

    App.prototype.status = function() {
    	return '<strong>Jquery</strong> Ready. <br/> <strong>Modernizr</strong> Ready. <br/> <strong>Bootstrap</strong> Ready.<br/><strong>Scripts.js</strong> Ready.';
    }

    return App;

  })();

  $(function() {
    return App = new App();
  });

}).call(this);