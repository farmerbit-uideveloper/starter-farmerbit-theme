import $ from 'jquery'
import salvattore from 'salvattore'

if($('.grid-posts__item').length) {

  var grid = document.querySelector('.grid-posts__list');
  var $pagination = $('.pagination');

  loadMoreBlog();
  loadMoreCat();

  function loadMoreBlog(){
    $('[data-action="loadMore"]').click(function(e){
      e.preventDefault()
    
      const $target = $(e.currentTarget).addClass('button--disabled')
    
      const url = new URL(e.currentTarget.href)
      url.searchParams.append('contentOnly', 1)
    
      $.ajax({
        url: url
      }).then(
        response => {
          const $html = $(response)
          const $postsNew = $('.grid-posts__item', $html)
          const $paginationNew = $('.pagination', $html)
    
          $pagination.html($paginationNew.html() || '')
    
          salvattore['append_elements'](grid, $postsNew);

          loadMoreBlog();
        },
        response => {
          console.error(response)
          $target.removeClass('button--disabled')
        }
      )
    });
  }

  function loadMoreCat(){
    $('.filtro-blog__categorie li a').click(function(e){
      e.preventDefault()

      $('.filtro-blog__categorie li').each(function() {
        $(this).removeClass('active');
      });

      $(this).parent().addClass('active');

      const $target = $(e.currentTarget).addClass('button--disabled');

      const url = new URL(e.currentTarget.href);
      url.searchParams.append('contentOnly', 1);

      $('.grid-posts__list').html('');

      $.ajax({
        url: url
      }).then(
        response => {
          const $html = $(response)
          const $postsNew = $('.grid-posts__list', $html)
          const $paginationNew = $('.pagination', $html)
          
          $pagination.html($paginationNew.html() || '')

          $('.grid-posts__list').append($postsNew);
          
          salvattore['recreateColumns'](grid);

          loadMoreBlog();
          $target.removeClass('button--disabled')
        },
        response => {
          console.error(response)
          $target.removeClass('button--disabled')
        }
      )
    });

    // select categorie

    $('.filtro-blog__categorie .select__option a').click(function(e){
      e.preventDefault()

      $('.filtro-blog__categorie .select__option a').each(function() {
        $(this).removeClass('active');
      });

      $('.filtro-blog__archivio .select__option a').each(function() {
        $(this).removeClass('active');
      });

      $(this).addClass('active');

      const $target = $(e.currentTarget).addClass('button--disabled');

      const url = new URL(e.currentTarget.href);
      url.searchParams.append('contentOnly', 1);

      $('.grid-posts__list').html('');

      $.ajax({
        url: url
      }).then(
        response => {
          const $html = $(response)
          const $postsNew = $('.grid-posts__list', $html)
          const $paginationNew = $('.pagination', $html)
          
          $pagination.html($paginationNew.html() || '')

          $('.grid-posts__list').append($postsNew);
          
          salvattore['recreateColumns'](grid);

          loadMoreBlog();
          $target.removeClass('button--disabled')
        },
        response => {
          console.error(response)
          $target.removeClass('button--disabled')
        }
      )
    });


    // select date

    $('.filtro-blog__archivio .select__option a').click(function(e){
      e.preventDefault()

      $('.filtro-blog__archivio .select__option a').each(function() {
        $(this).removeClass('active');
      });

      $('.filtro-blog__categorie .select__option a').each(function() {
        $(this).removeClass('active');
      });

      $(this).addClass('active');

      const $target = $(e.currentTarget).addClass('button--disabled');

      const url = new URL(e.currentTarget.href);
      //url.searchParams.append('contentOnly', 1);

      $('.grid-posts__list').html('');

      $.ajax({
        url: url
      }).then(
        response => {
          const $html = $(response)
          const $postsNew = $('.grid-posts__list', $html)
          const $paginationNew = $('.pagination', $html)
          
          $pagination.html($paginationNew.html() || '')

          $('.grid-posts__list').append($postsNew);
          
          salvattore['recreateColumns'](grid);

          loadMoreBlog();
          $target.removeClass('button--disabled')
        },
        response => {
          console.error(response)
          $target.removeClass('button--disabled')
        }
      )
    });
  };

  $(".select").click(function() {
    if($(this).find('.select__option').css('display') == 'block'){
      $(this).find('.select__option').slideUp();
      $(this).removeClass('open');
    }else{
      $(this).find('.select__option').slideDown();
      $(this).addClass('open');
    }   
  });

  if($('.select__option').length){
    $(document).mouseup(function(e) {
      $('.select').each(function() {
        var container = $(this).find('.select__option');
          if (!container.is(e.target) && container.has(e.target).length === 0) {
              $(this).find('.select__option').slideUp();
          }
      });       
    });
  }

}