$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    // Function to dynamically add user profile details to the sidebar
    function addProfileDetails(user) {
        var profileHtml = `
            <div class="profile-details">
                <img src="${user.avatar}" alt="Profile Picture" class="avatar">
                <h4>${user.name}</h4>
                <p>${user.email}</p>
                <!-- You can add more profile details here -->
            </div>
        `;
        $('#sidebar .sidebar-header').after(profileHtml);
    }

    var user = <?php echo json_encode'$user'; ?>;


    addProfileDetails(user);
});
