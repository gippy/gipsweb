onScroll = (e) ->
  if window.scrollY >= 124
    $('#navigation').addClass('sticky')
    $('section:first').addClass('expanded')
  else
    $('#navigation').removeClass('sticky')
    $('section:first').removeClass('expanded')

$(document).ready () ->
  $(document).on('scroll', onScroll);