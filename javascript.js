function fillForm() {
    const inputElement = document.getElementById("search");
    const sendButton = document.getElementById("send-button");

if (event.target.id === "sherwan") {
inputElement.value = "Asst. Prof. Dr. Sherwan Sharif Qurtas";
}else
if (event.target.id === "SU") {
inputElement.value = "Soran university";
}else
if (event.target.id === "shad") {
inputElement.value = "shad arf Sadiq";
}else
if (event.target.id === "sherzad") {
inputElement.value = "Asst. Prof. Dr. Sherzad Sadiq";
}else
if (event.target.id === "sirwan") {
inputElement.value = "Prof. Dr. Sirwan Zand";
} else
if (event.target.id === "rizgar") {
inputElement.value = "Dr. Rizgar Saeed";
}
if (inputElement.value.trim() === "") {
    // if the input is empty, disable the send button
    sendButton.disabled = true;
} else {
    // if the input is not empty, enable the send button
    sendButton.disabled = false;
}

}
// Get the form input element
const formInput = document.getElementById("search");

// Get the element with id="sherwan"
const sherwanElement = document.getElementById("sherwan");

// When the user clicks on sherwanElement, update the form input value to "Asst. Prof. Dr. Sherwan Sharif Qurtas"
sherwanElement.addEventListener("click", () => {
    formInput.value = "Asst. Prof. Dr. Sherwan Sharif Qurtas";
    
   
});
    function confirmDelete() {
        event.preventDefault();
Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to undo this action!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "DeleteHistory.php";
    }
})
}
function SignOut() {
        event.preventDefault();
Swal.fire({
    title: 'Are you sure?',
    text: "Are you Sure You want to LogOut?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "LogOut.php";
    }
})
}
function Bug_report() {
      
        window.location.href = "Bug_report.php";
    
}
  function showSpecialThanks() {
Swal.fire({
  title: 'Special Thanks',
  html: 'I would like to express my gratitude to everyone who supported me to the development of this chatbot, this project would not have been possible without their help. i dont know how to thank them. <brSpecial Thanks to my lecturers : :<br> Mr.ARSALAN RAHMAN MIRZA <br>Mr.HERSH AZIZ KHORSHID <br> Mr.DANA RASOL HAMAD <br>Mr. SARHAD HASAN BAEZ<br>Mr.DIDAR DLSHAD HAMADAMIN<br>Mr.HOSHANG QASIN AWLA<br><br> Special thanks to my classmates :<br> MOHAMMED QASM ABDULLA <br> ARAM ISMAEL KARIM <br>  BAWAR FARHAD HISSIEN <br> YAHIA HASSAN BAIZ ',
  icon: 'info',
  confirmButtonText: 'OK'
});
}
function showAboutUs() {
Swal.fire({
title: 'About Us',
html: 'Shad Arf has developed a chatbot designed to assist students with the Learning Management System (LMS) of Soran University. The aim of the chatbot is to provide a seamless experience for students before they even arrive at the university. By using the chatbot, students can get answers to frequently asked questions about the university, including its faculties, courses, and other academic offerings.The chatbot can also assist with registration and enrollment, providing students with a smooth transition into university life. In addition, the chatbot can help students navigate the LMS, making it easier for them to access course materials, submit assignments, and communicate with their professors.Despite being a solo developer, Shad Arf has put in significant effort to make the chatbot as user-friendly and helpful as possible. With this chatbot, students can have an easier and more efficient experience with the university, right from the start.',
icon: 'info',
confirmButtonText: 'OK'
});
}

$(document).ready(function() {
// Submit the form on enter key press
$('#user-input').keypress(function(e){
    if (e.which == 13){ // enter key
        $('#chat-form').submit();
        return false;
    }
});

// Handle form submission
$('#chat-form').submit(function(e) {
    e.preventDefault();
    var user_input = $('#user-input').val();
    if (user_input.trim() === '') {
        return;
    }

    // Add user message to chat panel
    $('#chat-panel').append('<p class="user-message">' +
        '<div class="row no-gutters">' +
        '<div class="col-md-6">' +
        '<span class="time-bubble-Left time text-muted small">' + getCurrentTime() + '</span>' +
        '<div class="chat-bubble chat-bubble--left">' + user_input + '</div>' +
        '</div>' +
        '</div>' +
        '</p>');

    // Clear input field
    $('#user-input').val('');

    // Scroll to bottom of chat container
    $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);

    // Send user input to server using AJAX
    $.ajax({
        type: 'POST',
        url: 'process-message.php',
        data: { user_input: user_input },
        success: function(response) {
            // Add bot response to chat panel
            $('#chat-panel').append('<p class="bot-message">' +
                '<div class="row no-gutters">' +
                '<div class="col-md-12">' +
                '<span class="time-bubble-Right time text-muted small">' + getCurrentTime() + '</span>' +
                '<div class="chat-bubble chat-bubble-Right offset-md-9 chat-bubble--right">' + response + '</div>' +
                '</div>' +
                '</div>' +
                '</p>');

            // Scroll to bottom of chat container
            $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
        }
    });
});

// Get current time in HH:MM format
function getCurrentTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    return hours + ':' + (minutes < 10 ? '0' : '') + minutes;
}
});
// get the chat container element
var chatContainer = document.getElementById("chat-container");

// scroll to the bottom of the chat container
chatContainer.scrollTop = chatContainer.scrollHeight;

// get the send button element
var sendButton = document.getElementById("send-button");

// get the input element
var inputElement = document.getElementById("search");

// disable the send button initially
sendButton.disabled = true;

// add an event listener to the input element
inputElement.addEventListener("input", function() {
if (inputElement.value.trim() === "") {
    // if the input is empty, disable the send button
    sendButton.disabled = true;
} else {
    // if the input is not empty, enable the send button
    sendButton.disabled = false;
}
});

// add an event listener to the send button 
sendButton.addEventListener("click", function() {
// scroll to the bottom of the chat container
chatContainer.scrollTop = chatContainer.scrollHeight;
});

