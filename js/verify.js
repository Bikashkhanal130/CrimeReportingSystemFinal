document.addEventListener('DOMContentLoaded', function() {
    const otpFields = document.querySelectorAll('.otp_field');
  
    otpFields.forEach(function(field, index) {
      field.addEventListener('input', function(event) {
        const input = event.target;
        const nextInput = otpFields[index + 1];
        const prevInput = otpFields[index - 1];
  
        if (!isNaN(input.value) && input.value !== '') {
          if (nextInput && input.value !== '') {
            nextInput.focus();
          }
        } else if (event.inputType === 'deleteContentBackward' && prevInput) {
          prevInput.focus();
        }
  
        // Limit input to one character
        if (input.value.length > 1) {
          input.value = input.value.slice(0, 1);
        }
      });
    });
  });
  