$( window ).on('load', function() {

  if ($('body').hasClass('home')){
    // get all images from page and store in array
    var allImg = $('.home .image-wrap img');
    var i = 0;

    $(allImg).each(function(){
      // Get on screen image
      var screenImage = $(this);
      // Create new offscreen image to test
      var theImage = new Image();
      theImage.src = screenImage.attr("src");
      // Get accurate measurements from that.
      var imageWidth = theImage.width;
      var imageHeight = theImage.height;

      console.log(theImage.src);
      console.log(theImage.width);
      console.log(theImage.height);
      orient(screenImage,imageWidth,imageHeight,'$image-wrapper-height');
      i++;
      console.log('the length of the image array is ' + (allImg.length) + ' and the current counter is at ' + i );
      if (i + ((allImg.length)-1)){
        $('body #content').css('visibility', 'visible');
        $('.post-wrapper img').css('opacity', '1');
      }
    });

    function orient(img,w,h,chosenHeight){
      // if the image is oriented horizontally, apply styles so that the width = 100% and height = auto
      if (w > h){
        $(img).css("width", "100%");
        $(img).css("height", "auto");
        console.log(img);
        console.log ('this image is oriented horizontally');
      }
      // if the image is oriented vertically, apply styles so that the height = 100% and height = auto
      else{
        // $(img).css("height", chosenHeight);
        // $(img).css("width", "auto");
        console.log('this image is oriented vertically');
      }
    }
  }

  if ($('body').hasClass('single')){
    var singleImg = $('.single-img-wrap img');
    var width = $(singleImg).width();
    var height = $(singleImg).height();
    if (width > height){
      console.log('this img is oriented horizontally');
      console.log(singleImg);
      $(singleImg).css("width", "100%");
      $(singleImg).css("height", "auto");
      $('.single-img-wrap').css('visibility', 'visible');
      $('.single-img-wrap img').css('opacity', '1');
    }
    else{
      console.log('this image is oriented vertically');
      $(singleImg).css("height", '88%');
      $(singleImg).css("width", "auto");
      $('.single-img-wrap').css('visibility', 'visible');
      $('.single-img-wrap img').css('opacity', '1');
    }


    $('#expand').on('click', function(){
        $('.single-img-wrap').toggleClass('modal');
        $('.modal-close').toggleClass('invisible');
        $('#close').fadeToggle('fast', 'linear');
        $('#expand').fadeToggle('fast', 'linear');
        $('header').toggle();
    });

    $('.single-img-wrap img').on('click', function(){
      $('.single-img-wrap').toggleClass('modal');
      $('.modal-close').toggleClass('invisible');
      $('#close').fadeToggle('fast', 'linear');
      $('#expand').fadeToggle('fast', 'linear');
      $('header').toggle();
    });

    $('.modal-close').on('click', function(){
        $('.single-img-wrap').toggleClass('modal');
        $('.modal-close').toggleClass('invisible');
        $('#close').fadeToggle('fast', 'linear');
        $('#expand').fadeToggle('fast', 'linear');
        $('header').toggle();
    });

  }

});
