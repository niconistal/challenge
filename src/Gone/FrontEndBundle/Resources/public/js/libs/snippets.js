$.ajaxPrefilter( function( options, originalOptions, jqXHR ) {
  options.url = 'http://localhost:8888/challenge/web/app_dev.php/api' + options.url;
});