/**
* This script is automatically called when the user is in the controller 'users' and action 'home'
*/
;(function() {
  var App,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  App = (function() {
  	// Constructor
    function App() {
      this.initialize();
    }

    App.prototype.initialize = function() {
      // Allow to delete users using twitter bootstrap modal
      this.deleteUserModal();
    }

    // Delete users modal
    App.prototype.deleteUserModal = function() {

      // Changes the URL to delete on each user click
      $('.btn-remove-modal').bind('click',function(e) {
        var uid,name,href,pattern,$label,$link;

        $label  = $('.label-uname');
        $link   = $('.delete-user-link');
        uid     = $(this).attr('data-uid');
        name    = $(this).attr('data-uname');
        href    = $link.attr('href');
        pattern = /\d+$/g;

        // Find the last ID in URL
        aux     = href.replace(pattern,uid);

        $link.attr('href', aux );

        // Changes modal label
        $label.html(name);
      });
    }

    return App;

  })();

  $(function() {
    return App = new App();
  });

}).call(this);