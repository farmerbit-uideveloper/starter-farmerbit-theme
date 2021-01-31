import $ from 'jquery';

// TODO - sistemare senza jquery
// $(document).ready(function() {
//     if($('.banner-play').length) {
//         $('.banner-play').click(function() {
//             var $play = $(this);
//             player.play();
//             $play.fadeOut();
//             setTimeout(() => {
//                 $play.parent().parent().addClass('play');
//             }, 1500);
//         });
//     }

//     var bannerVideo = document.querySelectorAll('.banner-video'), i;

// 	for (i = 0; i < bannerVideo.length; ++i) {
// 		bannerVideo[i].addEventListener('video_end', function(){
//             $(this).parent().find('.banner-play').fadeIn();
//             $(this).parent().parent().removeClass('play');
//         });
// 	}
// });