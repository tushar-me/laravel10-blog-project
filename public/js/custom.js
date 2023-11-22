
/*------------------------------------
	Profile Popup
------------------------------------*/

$(document).ready(function() {
    $('.ex__nav__items-profile-img').click(function(){
        $('.ex__nav__items-profile-popup').toggleClass('ex__nav__items-profile-popup--active');
    });
});


$(document).ready(function() {
    $('.ex-profile__content-topbar-profile-img').click(function(){
        $('.ex-profile__content-topbar-profile-toggle').toggleClass('ex-profile__content-topbar-profile-toggle--active');
    });
});

/*------------------------------------
	Tech Post slider
------------------------------------*/
$('.ex-gadget__items').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

/*------------------------------------
	Profile Tab
------------------------------------*/
$(function () {
    $('.ex-profile-tab-links-link').click(function(){
        // Remove the active class from all tab links
        $('.ex-profile-tab-links-link').removeClass('ex-profile-tab-links-link--active');

        // Add the active class to the clicked tab link
        $(this).addClass('ex-profile-tab-links-link--active');

        // Get the data-tab attribute value (tab name)
        let currentTab = $(this).data('tab');

        // Hide all tab contents
        $('.ex-profile-tab-content').hide();

        // Show the tab content with the corresponding ID
        $('#' + currentTab).fadeIn(600);
    });
});

/*------------------------------------
	Image Upload
------------------------------------*/
function ekUpload(){
    function Init() {

    console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
    // File Drop
    fileDrag.addEventListener('dragover', fileDragHover, false);
    fileDrag.addEventListener('dragleave', fileDragHover, false);
    fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
}

function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
}

function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
    parseFile(f);
    uploadFile(f);
    }
}

// Output
function output(msg) {
    // Response
    var m = document.getElementById('messages');
    m.innerHTML = msg;
}

function parseFile(file) {

    console.log(file.name);
    output(
    '<strong>' + encodeURI(file.name) + '</strong>'
    );
    
    // var fileType = file.type;
    // console.log(fileType);
    var imageName = file.name;

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
    document.getElementById('start').classList.add("hidden");
    document.getElementById('response').classList.remove("hidden");
    document.getElementById('notimage').classList.add("hidden");
    // Thumbnail Preview
    document.getElementById('file-image').classList.remove("hidden");
    document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
    document.getElementById('file-image').classList.add("hidden");
    document.getElementById('notimage').classList.remove("hidden");
    document.getElementById('start').classList.remove("hidden");
    document.getElementById('response').classList.add("hidden");
    document.getElementById('file-upload').reset();
    }
}

function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
    pBar.max = e.total;
    }
}

function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
    pBar.value = e.loaded;
    }
}

function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
    fileInput = document.getElementById('class-roster-file'),
    pBar = document.getElementById('file-progress'),
    fileSizeLimit = 1024; // In MB
    if (xhr.upload) {
    // Check if file is less than x MB
    if (file.size <= fileSizeLimit * 1024 * 1024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
        if (xhr.readyState == 4) {
            // Everything is good!

            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
        }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-form').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
    } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
    }
    }
}

// Check for the various File API support.
if (window.File && window.FileList && window.FileReader) {
    Init();
} else {
    document.getElementById('file-drag').style.display = 'none';
}
}
ekUpload();

