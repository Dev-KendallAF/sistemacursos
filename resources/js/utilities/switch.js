import $ from "jquery";

$(document).ready(function () {
  if($('.switch').length)
  {
    checkSwitch();

    function checkSwitch()
    {
     var switchContainer = $('.switch');
      //Toma el valor de todos los switch
      switchContainer.data( "estado");

      //Revisar valor data de cada switch
      $.each(switchContainer, function (index, e) 
      {
        var lbEstado = $(e).find('.switch__label');

        if ( $(e).data("estado") == 1) 
        {
          $(e).addClass('active');
          lbEstado.html('Activo')
        }else
        { 
          $(e).removeClass('active');
          lbEstado.html('Inactivo')
        }
      });
    }

    function toggleSwitch(e)
    {
      var switchContainer = $(e).parent();
      var estado = $(switchContainer).data('estado');
      var lbEstado = $(switchContainer).find('.switch__label');
      var input = $(switchContainer).find('.txt_estado');
      if ( estado == 1) 
        {
          $(switchContainer).removeClass('active');
          lbEstado.html('Inactivo')
          $(switchContainer).data('estado', 0)

        }else
        { 
          $(switchContainer).addClass('active');
          lbEstado.html('Activo')
          $(switchContainer).data('estado', 1)

        }
        $(input).val($(switchContainer).data('estado')); 

    }
    
    $('.switch__items').on('click', function () 
    {
      toggleSwitch($(this));
    });

  }
 
});