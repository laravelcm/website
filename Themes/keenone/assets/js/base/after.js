// Loaded after app.js

$(function() {
  // Input radio-group visual controls
  $('.radio-group label').on('click', function(){
    $(this).removeClass('not-active').siblings().addClass('not-active');
  });
});
