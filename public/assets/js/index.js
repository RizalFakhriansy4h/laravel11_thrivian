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

   // Reset background colors and text colors for all badges
document.getElementById('allBtn').classList.remove('active', 'bg-secondary', 'text-light');
document.getElementById('allBtn').classList.add('bg-light', 'text-dark');
document.getElementById('businessBtn').classList.remove('active', 'bg-secondary', 'text-light');
document.getElementById('businessBtn').classList.add('bg-light', 'text-dark');
document.getElementById('financeBtn').classList.remove('active', 'bg-secondary', 'text-light');
document.getElementById('financeBtn').classList.add('bg-light', 'text-dark');

// Set background color and text color for clicked button
var btn = document.getElementById(category.toLowerCase() + 'Btn');
btn.classList.add('active');
btn.classList.remove('bg-light', 'text-dark');
btn.style.backgroundColor = '#13005A'; // Set your desired background color here
btn.classList.add('text-light');

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


