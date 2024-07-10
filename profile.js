document.addEventListener('DOMContentLoaded', function() {
    fetch('profile.php')
        .then(response => response.text())
        .then(data => {
            document.querySelector('.profile-container').innerHTML = data;
        })
        .catch(error => console.error('Error fetching profile data:', error));
});
