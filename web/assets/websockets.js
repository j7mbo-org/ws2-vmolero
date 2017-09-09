/**
 * Don't forget, we're connecting to ws://localhost:1338 for both connections.
 */
/** Note how the JS API of autobahn 0.8.2 and Wamp V1 could mean callback hell + it's hard to add event listeners nicely **/

// @todo Connect with autobahn 0.8.2 (https://github.com/crossbario/autobahn-js/tree/v0.8.2#publish-and-subscribe)
// @todo Within the callback function (second parameter), add your subscribe / unsubscribe event listeners to buttons
// @todo Subscribe to "time" and "sql" when they're clicked
// @todo The callback for this should update #data-time / #data-sql respectively