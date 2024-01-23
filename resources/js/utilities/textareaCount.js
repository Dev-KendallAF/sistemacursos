import $ from "jquery";

$(document).ready(function () {
  if($('.textarea').length)
  {
    console.log($(".textarea"))
    Counter();

    function Counter()
    {
      
    }
    $('.textarea').on('keyup', function () 
    {
      
      var div = $(this).parent();
      var char = div.find($('.char'));
      var max = div.find($('.max'));
      if(parseInt(char.html()) < parseInt(max.html()))
      char.html($(this).val().length);
      else 
      {
        var truncatedValue =  $(this).val().substring(0, parseInt(max.html()));
        $(this).val(truncatedValue);
      }

      console.log(div.find($('.char')));
    });

  }
 
});