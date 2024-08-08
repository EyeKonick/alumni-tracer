<script>
    document.addEventListener('DOMContentLoaded', function() {
    const formSteps = document.querySelectorAll('.step');
    let currentStep = 0;

    function showStep(step) {
        formSteps.forEach((formStep, index) => {
            formStep.classList.toggle('hidden', index !== step);
        });
        currentStep = step;
    }

    function validateStep(step) {
        let isValid = true;
        const inputs = formSteps[step].querySelectorAll('input[required], select[required], textarea[required]');
        inputs.forEach(input => {
            if (input.type === 'email') {
                if (!input.value.trim() || !input.value.includes('@')) {
                    isValid = false;
                    showError(input, 'Please enter a valid email address.');
                } else {
                    removeError(input);
                }
            } else if (input.type === 'password') {
                const password = document.getElementById('password');
                const passwordConfirmation = document.getElementById('password_confirmation');
                if (password && passwordConfirmation) {
                    if (!password.value.trim() || password.value.length < 8) {
                        isValid = false;
                        showError(password, 'Password must be at least 8 characters long.');
                    } else {
                        removeError(password);
                    }

                    if (password.value !== passwordConfirmation.value) {
                        isValid = false;
                        showError(passwordConfirmation, 'Passwords do not match.');
                    } else {
                        removeError(passwordConfirmation);
                    }
                }
            } else if (input.type === 'number') {
                if (!input.value.trim() || isNaN(input.value)) {
                    isValid = false;
                    showError(input, 'Please enter a valid number.');
                } else {
                    removeError(input);
                }
            } else if (input.name === 'inclusive_from' || input.name === 'inclusive_to') {
                const selectElement = formSteps[step].querySelector(`select[name="${input.name}"]`);
                const inputElement = formSteps[step].querySelector(`input[name="${input.name}_custom"]`);
                if (selectElement && inputElement) {
                    if (selectElement.value === 'other') {
                        if (!inputElement.value.trim() || isNaN(inputElement.value)) {
                            isValid = false;
                            showError(inputElement, 'Please enter a valid year.');
                        } else {
                            removeError(inputElement);
                        }
                    } else if (!selectElement.value.trim()) {
                        isValid = false;
                        showError(selectElement, 'Please select a year.');
                    } else {
                        removeError(selectElement);
                    }
                }
            } else if (!input.value.trim() && !input.checked) {
                isValid = false;
                showError(input, 'This field is required.');
            } else {
                removeError(input);
            }
        });
        return isValid;
    }

    function showError(input, message) {
        let errorElement = input.parentElement.querySelector('.text-red-500');
        if (!errorElement) {
            errorElement = document.createElement('p');
            errorElement.className = 'text-red-500 text-sm mt-1';
            input.parentElement.appendChild(errorElement);
        }
        errorElement.textContent = message;
    }

    function removeError(input) {
        const errorElement = input.parentElement.querySelector('.text-red-500');
        if (errorElement) {
            errorElement.remove();
        }
    }

    function handleYearChange() {
        const inclusiveFromSelect = document.getElementById('inclusive_from_select');
        const inclusiveFromInput = document.getElementById('inclusive_from_input');
        const inclusiveToSelect = document.getElementById('inclusive_to_select');
        const inclusiveToInput = document.getElementById('inclusive_to_input');

        if (inclusiveFromSelect && inclusiveFromInput) {
            inclusiveFromSelect.addEventListener('change', function() {
                if (inclusiveFromSelect.value === 'other') {
                    inclusiveFromInput.classList.remove('hidden');
                    inclusiveFromInput.focus();
                } else {
                    inclusiveFromInput.classList.add('hidden');
                }
            });

            inclusiveFromInput.addEventListener('input', function() {
                inclusiveFromSelect.value = inclusiveFromInput.value;
            });
        }

        if (inclusiveToSelect && inclusiveToInput) {
            inclusiveToSelect.addEventListener('change', function() {
                if (inclusiveToSelect.value === 'other') {
                    inclusiveToInput.classList.remove('hidden');
                    inclusiveToInput.focus();
                } else {
                    inclusiveToInput.classList.add('hidden');
                }
            });

            inclusiveToInput.addEventListener('input', function() {
                inclusiveToSelect.value = inclusiveToInput.value;
            });
        }
    }

    function showPreview() {
        const previewContent = document.getElementById('confirmation-details');
        if (!previewContent) return;

        // Build the preview content
        const formData = {
            firstName: document.getElementById('first_name') ? document.getElementById('first_name').value : '',
            middleName: document.getElementById('middle_name') ? document.getElementById('middle_name').value : '',
            lastName: document.getElementById('last_name') ? document.getElementById('last_name').value : '',
            email: document.getElementById('email') ? document.getElementById('email').value : '',
            gender: document.getElementById('gender') ? document.getElementById('gender').value : '',
            age: document.getElementById('age') ? document.getElementById('age').value : '',
            civilStatus: document.getElementById('civil_status') ? document.getElementById('civil_status').value : '',
            year: document.getElementById('year_select') ? (document.getElementById('year_select').value !== 'other' ? document.getElementById('year_select').value : document.getElementById('year_input').value) : '',
            course: document.getElementById('grad_course') ? document.getElementById('grad_course').value : '',
            major: document.getElementById('major') ? document.getElementById('major').value : '',
            address: document.getElementById('address') ? document.getElementById('address').value : '',
            phoneNumber: document.getElementById('phone_number') ? document.getElementById('phone_number').value : '',
            skills: Array.from(document.querySelectorAll('input[name="skills[]"]:checked')).map(checkbox => checkbox.nextElementSibling.textContent).join(', '),
            companyName: document.getElementById('company_name') ? document.getElementById('company_name').value : '',
            companyAddress: document.getElementById('company_address') ? document.getElementById('company_address').value : '',
            presentPosition: document.getElementById('present_position') ? document.getElementById('present_position').value : '',
            monthlyIncome: document.getElementById('monthly_income') ? document.getElementById('monthly_income').value : '',
            employmentStatus: document.getElementById('employment_status') ? document.getElementById('employment_status').value : '',
            inclusiveFrom: document.getElementById('inclusive_from_select') ? (document.getElementById('inclusive_from_select').value !== 'other' ? document.getElementById('inclusive_from_select').value : document.getElementById('inclusive_from_input').value) : '',
            inclusiveTo: document.getElementById('inclusive_to_select') ? (document.getElementById('inclusive_to_select').value !== 'other' ? document.getElementById('inclusive_to_select').value : document.getElementById('inclusive_to_input').value) : '',
            question1: document.querySelector('input[name="question1"]:checked') ? document.querySelector('input[name="question1"]:checked').value : '',
            question1Answer: document.getElementById('question1_answer') ? document.getElementById('question1_answer').value : '',
            challenges: Array.from(document.querySelectorAll('input[name="challenges[]"]:checked')).map(checkbox => checkbox.nextElementSibling.textContent).join(', '),
            suggestions: document.getElementById('suggestions') ? document.getElementById('suggestions').value : '',
            filePath: document.getElementById('file') ? document.getElementById('file').files[0] ? document.getElementById('file').files[0].name : '' : ''
        };

        // Clear previous preview content
        previewContent.innerHTML = '';

        // Append new preview content
        Object.entries(formData).forEach(([key, value]) => {
            const p = document.createElement('p');
            p.textContent = `${key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase())}: ${value}`;
            previewContent.appendChild(p);
        });
    }

    // Navigation Buttons
    const nextToPersonal = document.getElementById('next-to-personal');
    const prevToAlumni = document.getElementById('prev-to-alumni');
    const nextToProfessional = document.getElementById('next-to-professional');
    const prevToPersonal = document.getElementById('prev-to-personal');
    const nextToSurvey = document.getElementById('next-to-survey');
    const prevToProfessional = document.getElementById('prev-to-professional');
    const nextToConfirm = document.getElementById('next-to-confirm');
    const prevToSurvey = document.getElementById('prev-to-survey');

    if (nextToPersonal) {
        nextToPersonal.addEventListener('click', function() {
            if (validateStep(0)) {
                showStep(1);
            }
        });
    }

    if (prevToAlumni) {
        prevToAlumni.addEventListener('click', function() {
            showStep(0);
        });
    }

    if (nextToProfessional) {
        nextToProfessional.addEventListener('click', function() {
            if (validateStep(1)) {
                showStep(2);
            }
        });
    }

    if (prevToPersonal) {
        prevToPersonal.addEventListener('click', function() {
            showStep(1);
        });
    }

    if (nextToSurvey) {
        nextToSurvey.addEventListener('click', function() {
            if (validateStep(2)) {
                showStep(3);
            }
        });
    }

    if (prevToProfessional) {
        prevToProfessional.addEventListener('click', function() {
            showStep(2);
        });
    }

    if (nextToConfirm) {
        nextToConfirm.addEventListener('click', function() {
            if (validateStep(3)) {
                showPreview(); // Display the confirmation details
                showStep(4);
            }
        });
    }

    if (prevToSurvey) {
        prevToSurvey.addEventListener('click', function() {
            showStep(3);
        });
    }

    // Edit button functionality
    const editButton = document.getElementById('edit-form');

    if (editButton) {
        editButton.addEventListener('click', function() {
            showStep(3); // Go back to the survey step for editing
        });
    }

    handleYearChange();
    showStep(currentStep);
});

</script>
