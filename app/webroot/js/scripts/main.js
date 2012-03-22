require(["jquery","../lib/modernizr", "../lib/bootstrap.min", "../src/mdzcheck", "../src/scripts"], function($) {
    // Callback for all those scripts loaded
    $(function() {
    	// Showing a jQuery Function for tests
    	$('.checkjs').append('<strong>jQuery</strong> READY!<br/> ');

    	// Shows a scripts.js tests function
        $('.checkjs').rdyjs()


        // Html5 Features tests with Modernizr
        $('.checkjs').append('<hr><p>HTML5 Features</p>')
    	$('.checkjs').mdzcheck()
    });
});
