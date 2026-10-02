/*AJAX*/

var page = 2;
var showed_items = +$('#more_posts').data('post-per-page');
var showed_photos = +$('#more_photos').data('post-per-page');

$(document).ready(function () {
    $('body').on('click', '#more_posts', function () {
        var template = $(this).data('template');
        var page_id = $(this).data('page-id');
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security,
            'template': template,
            'page-id': page_id
        };
        $.post(blog.ajaxurl, data, function (response) {
            if ($.trim(response) != '') {
                $('#row_append').append(response);
                showed_items = document.querySelector('#row_append').querySelectorAll('.solutions__item').length;
                var post_cnt = +$('#more_posts').data('post-count');
                var posts_more = post_cnt - showed_items;
                $('#more_posts').find('i').text(posts_more);

                if (posts_more === 0) {
                    $('#more_posts').hide();
                }
                page++;
            } else {
                $('#more_posts').hide();
            }
        });
    });
});

$(document).ready(function () {
    $('body').on('click', '#more_photos', function () {
        var template = $(this).data('template');
        var post_id = $(this).data('post-id');
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security,
            'template': template,
            'post-id': post_id
        };

        $.post(blog.ajaxurl, data, function (response) {
            if ($.trim(response) != '') {
                $('#row_append').append(response);
                showed_items = document.querySelector('#row_append').querySelectorAll('.gallery__item').length;
                var post_cnt = +$('#more_photos').data('post-count');
                var posts_more = post_cnt - showed_items;
                $('#more_photos').find('i').text(posts_more);

                if (posts_more === 0) {
                    $('#more_photos').hide();
                }
                page++;
            } else {
                $('#more_photos').hide();
            }
        });
    });
});

$('.main-form').on('submit', (e) => {

    let action = $(e.currentTarget).attr('action');
    let th = $(e.currentTarget);
    let valid = true;

    let message = th.find($('.main-form__message'));

    $(this).find($('input')).each(function () {
        let value;
        if ($(this).val() !== '') {
            value = 1;
        } else value = 0;
        valid *= value;
    });

    if (valid) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: action,
            data: th.serialize(),
            error: function (request, txtstatus, errorthrown) {
                console.log(request);
                console.log(txtstatus);
                console.log(errorthrown);
            },
            success: function () {
                message.removeClass('hide');
                th.find('input').val('');
            }
        })
    }


});

/*AJAX*/