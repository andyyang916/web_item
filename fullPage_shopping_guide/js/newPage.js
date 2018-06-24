$(function () {
    var flag = 1;
    var k = $(window).height();
    $('.next').click(function (event) {
        $.fn.fullpage.moveSectionDown();
    })
    $('#fullpage').fullpage({
        // sectionsColor: ['red', 'green', 'blue', 'orange', 'purple', 'pink', 'black'],
        navigation: true,
        // continuousVertical: true,
        // navigationPosition: "left",
        loopBottom: true,
        navigatscrollingSpeed: 1200,
        // afterLoad: function (anchorLink, index) {
        //     if (index == 2) {
        //         $('.next').fadeOut();
        //         $('.search').show().animate({"right": "370px"}, 1500, function () {
        //             $('.search-words').animate({"opacity": 1}, 500, function () {
        //                 $('.search').hide();
        //                 $('.search-02-1').show().animate({"height": "30px", "right": "250px", "bottom": "400px"}, 1000, function () {
        //                 })
        //                 $('.goods').show().animate({"height": "217px"}, 1000);
        //                 $('.words-02').css("opacity", 1);
        //                 $('.next').fadeIn();
        //             });
        //         })
        //     }
        // },
        
        onLeave: function (index, nextIndex, direction) {
            if (nextIndex == 1) {
                $('img, .move').attr('style', '');
                $('.words-05').removeClass('words-05-a');
            }
            if (index == 1 && nextIndex == 2 && flag == 1) {
                $('.next').fadeOut();
                $('.search').show().animate({"right": "370px"}, 1500, function () {
                    $('.search-words').animate({"opacity": 1}, 500, function () {
                        $('.search').hide();
                        $('.search-02-1').show().animate({"height": "30px", "right": "250px", "bottom": "400px"}, 1000, function () {
                        })
                        $('.goods').show().animate({"height": "217px"}, 1000);
                        $('.words-02').css("opacity", 1);
                        $('.next').fadeIn();
                    });
                })
                flag = 2;
            }
            if (index == 2 && nextIndex == 3 && flag == 2) {
                $('.next').fadeOut();
                $('.shirt-02').show().animate({"bottom": -(k - 200), "left": "37%", "height": 166}, 1500, function () {
                    $('.img-01-a').animate({"opacity": 1}, 1500);
                    $('.btn-01-a').animate({"opacity": 1}, 1500); 
                    $('.next').fadeIn();  
                });  
                $('.cover').show();   
                flag = 3;                        
            }
            if (index ==3 && nextIndex == 4 && flag == 3) {
                $('.next').fadeOut();
                $('.shirt-02').hide();
                $('.shirt-03').show().animate({"bottom": -((k - 250) + 50), "left": "39%"}, 1500, function () {
                    $(this).hide();
                    $('.t1f').show();
                    $('.car').animate({"left": "150%"}, 1500,"easeInElastic", function () {
                        $('.note').show();
                        $('.note-img').animate({"opacity": 1}, 1000);
                        $('.next').fadeIn(); 
                    });
                    $('.words-04').animate({"opacity": 1}, 1000);  
                });
                flag = 4;
            }
            if (index == 4 && nextIndex == 5 && flag == 4) {
                $('.next').fadeOut();                
                $('.hand-01').show().animate({"bottom": 0}, 1000, function () {
                    $('.mouse-02').animate({"opacity": 1}); 
                    $('.shirt-04').show().animate({"bottom": 80}, 1000, function () {
                        $('.card-06').show().animate({"bottom": 390}, 1000, function () {
                            $('.words-05').show().addClass('words-05-a');
                            $('.next').fadeIn();   
                        });                        
                    });
                });
                flag = 5;
            }  
            if (index == 5 && nextIndex == 6 && flag == 5) {
                $('.next').fadeOut();                 
                $('.shirt-04').animate({"bottom": -(k - 500), "height": 80, "left": "35%"}, 1000);
                $('.box-01').animate({"left": "33%"}, 1000, function (){
                    $('.shirt-04').hide();
                    $(this).animate({"bottom": 100}, 1000, function () {
                        $(this).hide();
                        $('.section6').animate({"backgroundPositionX": "100%"}, 2000, function () {
                            $('.men').show().animate({"bottom": "112px","height": "305px"}, 1000, function () {
                                $('.men').animate({"right": "567px"}, 500, function () {
                                    $('.door-01').show();   
                                    $('.women').show().animate({"height": 294, "right": "30%"}, 1000, function () {
                                        $('.words-08').fadeIn();
                                        $('.next').fadeIn();                                         
                                    });
                                });
                            })
                        });
                        $('.words-06').show().animate({"left": "30%"}, 2000);
                        $('.words-07').show();
                    });
                });
                flag = 6;
            }  
            if (index == 6 && nextIndex == 7 && flag == 6) {
                $('.next').fadeOut();                  
                setTimeout(function () {
                    $('.star').animate({"width": 120}, 500, function () {
                        $('.great').show();
                        $('.next').fadeIn(); 
                    });
                }, 2000);
                flag = 1;
            }               
            $(document).mousemove(function (event) {
                var x = event.pageX - $('.hand-02').width() / 2;
                var y = event.pageY;
                var minY = k - 449;
                if (y < minY) {
                   y = minY;
                }
                $('.hand-02').css({"left": x, "top": y});
            });
            $('.beginShoping').hover(function () {
                $('.beginShoping :nth-child(2)').toggle();
            });

            $('.again').click(function(event) {
                console.log(666);
                $.fn.fullpage.moveTo(1);
                $('img, .move').attr('style', '');
                $('.words-05').removeClass('words-05-a');
            });

        }
    });
});