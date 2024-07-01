// dash_scripts.js

// Function to check for new reports every few seconds
function checkForNewReports() {
  $.ajax({
      url: 'check_reports.php',  // PHP script to check for new reports
      type: 'GET',
      success: function(response) {
          if (response > 0) {
              showNotification();  // If new reports, show notification
          }
      },
      error: function(xhr, status, error) {
          console.error('Error checking for new reports:', error);
      },
      complete: function() {
          setTimeout(checkForNewReports, 5000);  // Check every 5 seconds
      }
  });
}

// Function to show notification
function showNotification() {
  $('#notification').fadeIn().delay(2000).fadeOut();  // Show notification for 2 seconds
}

$(document).ready(function() {
  checkForNewReports();  // Start checking for new reports on page load
});
