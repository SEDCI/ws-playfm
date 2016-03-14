/* PlayFM Custom JS */

$(function(){
	$('.showclient').on('click', function() {
		$('#clients .modal-title, #clients .modal-body').empty();
		var prnt = $(this).closest('div');
		var name = $(this).attr('title');
		var conti = prnt.find('.contentimg').val();
		var contv = prnt.find('.contentvid').val();

		$('#clients .modal-title').html(name);

		if (conti != '') {
			conti = '<img src="images/clients/content/' + conti + '" width="100%">';
			$('#clients .modal-body').append(conti);
		}

		if (contv != '') {
			contv = '<iframe width="100%" height="315" src="' + contv + '" frameborder="0" allowfullscreen></iframe>';
			$('#clients .modal-body').append(contv);
		}
	});

    $(document).on('mousedown', '#body', function() {
        $('#radio').addClass('draggable').parents().on('mousemove', function(e) {
        	var pointerX = e.pageX;
        	var pointerY = e.pageY;
        	var elemWidth = $('.draggable').outerWidth();
        	var elemHeight = $('.draggable').outerHeight();
        	var imgcenterX = elemWidth / 2;
        	var imgcenterY = elemHeight / 2;
        	var pageWidth = $(window).width();
        	var pageHeight = ($(window).height() > $('.content').height()) ? $(window).height() : $('.content').height();

        	if ((pointerX + imgcenterX) >= pageWidth) {
        		newX = pageWidth - elemWidth;
        	} else if ((pointerX - imgcenterX) <= 0) {
        		newX = 0;
        	} else {
        		newX = pointerX - imgcenterX;
        	}

        	if ((pointerY + imgcenterY) >= pageHeight) {
        		newY = pageHeight - elemHeight;
        	} else if ((pointerY - imgcenterY) <= 0) {
        		newY = 0;
        	} else {
        		newY = pointerY - imgcenterY;
        	}

        	/*if ((pointerY - imgcenterY) <= 0) {
        		newY = 0;
        	} else {
        		newY = pointerY - imgcenterY;
        	}*/

            $('.draggable').offset({
                left: newX,
                top: newY
            }).on('mouseup', function() {
                $(this).removeClass('draggable');
            });
	        e.preventDefault();
        });
    }).on('mouseup', function() {
        $('.draggable').removeClass('draggable');
    });

    var viewer = UstreamEmbed("UstreamFrame");

	$('#logo img').on('click', function() {
        viewer.callMethod('play');
        viewer.callMethod('volume', $('#level').val());
        viewer.callMethod('quality', 3);
		$('#radio').show();
	});

    $('#power').on('click', function(){
        viewer.callMethod('pause');
        $('#radio').hide();
    });

    /*$('#power').on('click', function(){
        if ($(this).hasClass('on')) {
            viewer.callMethod('pause');
            $(this).removeClass('on');
            $('#led').hide();
        } else {
            viewer.callMethod('play');
            viewer.callMethod('volume', $('#level').val());
            viewer.callMethod('quality', 3);
            $(this).addClass('on');
            $('#led').show();
        }
    });*/

    $(document).on('mousedown', '#volume', function(e) {
        var halfY = $(this).offset().top + ($(this).height() / 2);
        var half;

        if (e.pageY <= halfY) {
            half = 'upper';
        }
        if (e.pageY > halfY) {
            half = 'lower';
        }

        $('#volume').bind('mousemove', function(e) {
            var ratio;
            var percent;
            var degree;

            if (half == 'upper') {
                ratio = (e.pageX - $(this).offset().left) / $(this).width();
            }
            if (half == 'lower') {
                ratio = (($(this).offset().left + $(this).width()) - e.pageX) / $(this).width();
            }

            percent = ratio * 100;
            degree = 180 * ratio;

            if (degree >= 180) {
                degree = 180;
            } else if (degree <= 0) {
                degree = 0;
            } else {
             degree = degree;
            }

            rotateElement($(this), degree);

            viewer.callMethod('volume', percent);
            $('#level').val(percent);
        }).on('mouseup', function() {
            $('#volume').unbind('mousemove');
        });
    }).on('mouseup', function() {
        $('#volume').unbind('mousemove');
    });
});

function rotateElement(obj, degree) {
    obj.css('transform', 'rotate(' + degree + 'deg)');
    obj.css('transform-origin', '50% 50%');
}
