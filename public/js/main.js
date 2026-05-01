let removedImages = [];

function removeImage(imageName, index) {

    if (confirm('Are you sure you want to remove this image?')) {

        removedImages.push(imageName);

        let hiddenInput = document.getElementById('removed_images');
        if (hiddenInput) {
            hiddenInput.value = removedImages.join(',');
        }

        let imageBox = document.getElementById('img-' + index);
        if (imageBox) {
            imageBox.remove();
        }

        console.log("Removed:", removedImages);
    }
}

// AOS Init
$(document).ready(function() {
	AOS.init({
		duration: 1000,
	  });
  });




  $(document).ready(function () {
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 25,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 800,
        dots: true,
        nav: false,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            1200: { items: 3 }
        }
    });
});



$(document).ready(function () {

    var owl = $('.gallery-carousel');

    owl.owlCarousel({
        loop: false,
        margin: 25,
        autoplay: false,
        smartSpeed: 800,
        dots: true,
        nav: true,
navText: [
    '<i class="fa fa-angle-left"></i>',
    '<i class="fa fa-angle-right"></i>'
],
        responsive: {
            0: { items: 4 },
            768: { items: 4 },
            1200: { items: 4 }
        },
        onInitialized: toggleNav,
        onResized: toggleNav
    });

    function toggleNav(event) {
        var carousel = event.relatedTarget;
        var currentItems = carousel.settings.items;
        var totalItems = carousel.items().length;

        if (totalItems <= currentItems) {
            $(event.target).find('.owl-nav').hide();
        } else {
            $(event.target).find('.owl-nav').show();
        }
    }

});

  document.querySelectorAll('.ckeditor').forEach((editor) => {
        ClassicEditor
            .create(editor, {
                toolbar: [
                    'heading',
                    '|',
                    'bold', 'italic', 'underline', 'strikethrough',
                    '|',
                    'bulletedList', 'numberedList',
                    '|',
                    'link', 'blockQuote',
                    '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    });




let addons = [];

function addAddon() {
    let select = document.getElementById('addonSelect');
    let id = select.value;
    let text = select.options[select.selectedIndex].text;

    if (!id || addons.includes(id)) return;

    addons.push(id);
    document.getElementById('addonsInput').value = addons;

    let li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between';
    li.innerHTML = `${text}
        <button type="button" class="btn btn-danger btn-sm" onclick="removeAddon(${id}, this)">Remove</button>`;
    document.getElementById('addonList').appendChild(li);
}

function removeAddon(id, el) {
    addons = addons.filter(a => a != id);
    document.getElementById('addonsInput').value = addons;
    el.parentElement.remove();
}



// counter start

const counters = document.querySelectorAll('.counter');

const runCounter = (counter) => {
    const target = parseFloat(counter.getAttribute('data-target'));
    let count = 0;

    const speed = 100; // control speed
    const increment = target / speed;

    const update = () => {
        count += increment;

        if (count < target) {
            if (target < 10) {
                counter.innerText = count.toFixed(1);
            } else {
                counter.innerText = Math.floor(count).toLocaleString();
            }
            requestAnimationFrame(update);
        } else {
            counter.innerText = target.toLocaleString();
        }
    };

    update();
};

// Scroll trigger
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            counters.forEach(counter => runCounter(counter));
            observer.disconnect();
        }
    });
});

observer.observe(document.querySelector('.counter-wrapper'));
// counter end




$(document).ready(function () {

    function handleDropdown() {
        if ($(window).width() >= 992) {

            $('.dropdown').off('mouseenter mouseleave'); // reset

            $('.dropdown').hover(
                function () {
                    $(this).addClass('show');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function () {
                    $(this).removeClass('show');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );

        } else {
            $('.dropdown').off('mouseenter mouseleave');
        }
    }

    handleDropdown();
    $(window).resize(handleDropdown);

});


function changeImage(el) {
    document.getElementById('mainImage').src = el.src;

    document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active-thumb'));
    el.classList.add('active-thumb');
}



function openTab(evt, id) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-buttons button').forEach(b => b.classList.remove('active'));

    document.getElementById(id).classList.add('active');
    evt.currentTarget.classList.add('active');
}


//   Gallery
function openLightbox(src) {
    document.getElementById('lightbox').style.display = 'block';
    document.getElementById('lightbox-img').src = src;
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}

