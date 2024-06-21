// Fungsi mengganti warna hover icon like, comments, dll pada index.html
function changeIconColor(iconId, countId, color) {
    document.getElementById(iconId).style.setProperty('color', color, 'important');
    document.getElementById(countId).style.setProperty('color', color, 'important');
}

function toggleBookmark(event, iconId, countId) {
    event.preventDefault();
    const icon = document.getElementById(iconId);
    const count = document.getElementById(countId);
    
    if (icon.classList.contains('outline')) {
        icon.classList.remove('outline');
        count.textContent = parseInt(count.textContent) + 1;
    } else {
        icon.classList.add('outline');
        count.textContent = parseInt(count.textContent) - 1;
    }
}

window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('splash-screen').style.display = 'none';
    }, 2000); 
});

function showPosts(category) {
    var posts = document.getElementsByClassName('post');
    for (var i = 0; i < posts.length; i++) {
        var post = posts[i];
        var postCategory = post.getAttribute('data-category');
        if (category === 'All' || postCategory === category) {
            post.style.display = 'block';
        } else {
            post.style.display = 'none';
        }
    }

    // Reset classes for all badges
    document.querySelectorAll('.badge-post').forEach(function(btn) {
        btn.classList.remove('active', 'bg-secondary', 'text-light');
        btn.classList.add('bg-light', 'text-dark');
    });

    // Set active class for clicked button
    var btn = document.getElementById(category.toLowerCase().replace(/\s/g, '') + 'Btn');
    btn.classList.add('active');
    btn.classList.remove('bg-light', 'text-dark');
}

document.addEventListener('DOMContentLoaded', function() {
    const profileLink = document.getElementById('profileLink');
    const userOutlineIcon = document.getElementById('userOutlineIcon');
    const userIcon = document.getElementById('userIcon');
    const profileInfo = document.getElementById('profileInfo');

    profileLink.addEventListener('click', function() {
        // Toggle icon
        if (userOutlineIcon.style.display === 'none') {
            userOutlineIcon.style.display = 'inline';
            userIcon.style.display = 'none';
            profileInfo.style.display = 'none'; // Hide profile-info when switching back to outline icon
        } else {
            userOutlineIcon.style.display = 'none';
            userIcon.style.display = 'inline';
            profileInfo.style.display = 'block'; // Show profile-info when switching to user icon
        }
    });
});

// buat fill button like
function toggleIcon(event, outlineId, solidId, countId) {
    var likeIconOutline = document.getElementById(outlineId);
    var likeIconSolid = document.getElementById(solidId);
    var likeCountSpan = document.getElementById(countId);

    // Mengubah ikon saat tombol ditekan
    if (likeIconOutline.style.display === 'none') {
        likeIconOutline.style.display = 'inline';
        likeIconSolid.style.display = 'none';
        likeCountSpan.textContent = parseInt(likeCountSpan.textContent) - 1; // Mengurangi angka saat tombol ditekan
    } else {
        likeIconOutline.style.display = 'none';
        likeIconSolid.style.display = 'inline';
        likeCountSpan.textContent = parseInt(likeCountSpan.textContent) + 1; // Menambah angka saat tombol ditekan
    }

    event.preventDefault();
}


document.addEventListener('DOMContentLoaded', function() {
    var toggleButton = document.getElementById('toggleSearch');
    var searchInput = document.getElementById('searchInput');
  
    toggleButton.addEventListener('click', function() {
      var isVisible = searchInput.style.display === 'block';
      searchInput.style.display = isVisible ? 'none' : 'block';
  
      if (!isVisible) {
        searchInput.focus(); // Focus on the input when shown
      }
    });
  });



