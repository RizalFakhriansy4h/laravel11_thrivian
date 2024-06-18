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

    // Mereset class-class untuk semua badges
    document.querySelectorAll('.badge-post').forEach(function(btn) {
        btn.classList.remove('active', 'bg-secondary', 'text-light');
        btn.classList.add('bg-light', 'text-dark');
    });

    // Mengatur kelas aktif untuk tombol yang diklik
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
        // Ikon toggle
        if (userOutlineIcon.style.display === 'none') {
            userOutlineIcon.style.display = 'inline';
            userIcon.style.display = 'none';
            profileInfo.style.display = 'none'; // Menyembunyikan informasi profil saat beralih kembali ke ikon garis besar
        } else {
            userOutlineIcon.style.display = 'none';
            userIcon.style.display = 'inline';
            profileInfo.style.display = 'block'; // Menampilkan informasi profil saat beralih kembali ke ikon garis besar
        }
    });
});

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
        searchInput.focus();
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
  const posts = document.querySelectorAll('.post');
  posts.forEach(post => {
      post.querySelector('.full-post').addEventListener('click', function() {
          posts.forEach(p => p.classList.remove('active-post', 'inactive-post'));
          post.classList.add('active-post');
          posts.forEach(p => {
              if (p !== post) p.classList.add('inactive-post');
          });
          const truncated = post.querySelector('.truncated');
          const fullContent = post.querySelector('.full-content');
          truncated.classList.add('d-none');
          fullContent.classList.remove('d-none');
      });
  });
});

