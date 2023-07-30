<?php
include("Answer.php"); 


// Include the file containing answers for the chatbot
$_SESSION['Bot'] = "Hello How I can Assistent today ?"; 
// Set the initial message for the chatbot
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" /> 
    <!-- Import jQuery UI stylesheet -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>  
    <!--Import jQuery UI JavaScript library-->
    <link rel="stylesheet" href="/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css"> 
    <!-- Import Bootstrap stylesheet -->
    <title>CHATBOT</title>
    <link rel="icon" type="image/Soran University Assistant.png" href="image/Soran University Assistant.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=space+Mono|Roboto+Mono"> 
    <!-- Import Google fonts -->
    <link rel="stylesheet" href="ChatBotStyle.css">
    <!-- Import custom CSS stylesheet for the chatbot --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"> 
    <!--  Import Material icons stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> 
    <!-- Import jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
    <!-- Import SweetAlert2 library for displaying alerts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
 
    <style>
        .container{
            margin-left: 7%;
        }
        .setting-fild ,.history{
            margin-left:10px;
        }
       .chat-panel a{
        color:blue;
       }
        .friend-drawer--onhover:hover p , .friend-drawer--onhover:hover h6 , .friend-drawer--onhover:hover .time {
            color: #74b9ff !important;
        }
        .signup-drawer--onhover:hover{
            color: blue;
            cursor:pointer;
            opacity: 0.9;
}
        </style>
</head>
<body>
    
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 border-right">
                    <div class="settings-tray">
                        
                            <span style="margin-right:100px">
                            <img class="profile-image" src="Image/logo.png" alt="Compus">
                            ASSISTANT
                            </span>
                      
                        
                        <span class="settings-tray--right " >
                            <button class="btn disable-btn" onclick="location.reload()"><i  class="material-icons"> cached</i></button>
                            <button class="btn"  title="Not-Avaliable" id="Not-Avaliable"> <i class="material-icons"> menu</i></button>
                        </span>
                    </div>
                    <div class="Search-box">
                    </div>
                    <div  title="Not-Avaliable" id="Not-Avaliable" class="history">
                        <h5>History</h5>
                        <!--
                        <img width='250px'height='250px' src='Image/Soran University Assistant.png' alt='Picture not Found '>
                        <div class="friend-drawer ">
                            <img class="profile-image" src="Chat-History-Icon.png" alt="chathistory">
                            <div class="text">
                                <h6>Hello</h6>
                            </div>
                            <span class="time text-muted small">22:34</span>
                        </div>
                    -->
                    </div>
                    <hr> 
                    <div class="setting-fild" >                       
                       <div   title="Not-Avaliable" id="Not-Avaliable">
                        <span class="material-icons" >
                            settings
                            </span>
                            <i >Setting</i>
                        </div>
                      
                       <div class="text">
                            <a href="DeleteHistory.php" onclick="confirmDelete()" >
                            <span class="material-icons">
                            delete
                            </span>
                            <i>Delete</i>
                            </a>
                        </div>
                        <div onclick="showAboutUs()" class="text">
                            <span  class="material-icons">
                                info
                                </span>
                                <i>About Us</i>
                            </div>
                            
                            <div  title="Not-Avaliable" id="Not-Avaliable">
                                <span class="material-icons">
                                    language
                                    </span>
                                    <i>Language</i>
                                </div>
                                <div title="Not-Avaliable" id="Not-Avaliable">
                                    <span class="material-icons">
                                        settings_brightness
                                        </span>
                                        <i>Dark Mode</i>
                                    </div>
                                <div class="text">
                                    <a href="https://www.soran.edu.iq/">
                                    <span class="material-icons">
                                    public
                                        </span>
                                        <i>  Soran University WebPage </i>
                                    </a>
                                   </div>
                                   <div onclick="feedback()" class="text">
                                    <span class="material-icons">
                                        feedback
                                        </span>
                                        <i>Feedback</i>
                                   </div>
                                   
                                   <div onclick="Bug_report()" class="text">
                                    <span class="material-icons">
                                        bug_report
                                        </span>
                                        <i> Report Bug</i>
                                   </div>
                                   <div onclick="showSpecialThanks()" class="text">
                                         <span  class="material-symbols-outlined">
                                            diversity_4
                                                </span>
                                        <i>Special Thanks</i>
                                       
                                    </div>
                                    <div  class="text">
                                    <?php
                                  if (isset($_SESSION['UserID'])) {
                                          echo '<i  onclick="SignOut()"><i  class="material-icons">account_circle</i>
                                          <i>LogOut</i></i>';
                                        }else{

                                          echo ' <a href="Signup.php" > <i class="material-icons">account_circle</i>
                                          <i>SignUp</i></a>';
                                        }    ?>
                                    </div>
                        
                    </div>
                      
            </div>
            <div class="col-md-8">
                    <div class="settings-tray">
                        <div class="friend-drawer no-gutters ">
                          
                                         <img class="profile-image" src="Image/logo.png" alt="Compus">                      
                                        <div class="text">
                                       <h6>Student Center Assistant</h6>
                                   
                                </div>
                                <span class="settings-tray--right">
                                <button class="btn disable-btn" onclick="location.reload()"><i  class="material-icons"> cached</i></button>
                                 <span  >
                                <?php
                               
                                  if (isset($_SESSION['UserID'])) {
                                    echo '<i class="signup-drawer--onhover"  onclick="SignOut()"> <i class="material-icons">account_circle</i>
                                    <i>LogOut</i></i>';
                                        }else{

                                          echo ' <a class="signup-drawer--onhover"  href="Signup.php"  > <i class="material-icons">account_circle</i>
                                          <i  >SignUp</i></a>';
                                        }    
                             ?>
                              </span>
                            </span>
                        </div>
                    </div>
                    <div id="chat-container" class="chat-container" style="height:75%;overflow-y: scroll; overflow-x: hidden;">
    <div class="chat-panel">
    <?php 
    chatpanel:
     if(!isset($_SESSION['chat_log'])){ ?>
        <p class="user-message">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                        
                                <div class="chat-bubble chat-bubble--left">
                                <div><?php echo $rand_msg; ?></div> <!-- Display the randomly selected message -->
         
                                </div>
                            </div>
                        </div>
                    </p>
                    <?php }?>
        <?php  if(isset($_SESSION['chat_log'])): 
            foreach($_SESSION['chat_log'] as $message):
                if($message['sender'] == 'bot'): ?>
                    <p class="user-message">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                              
                                <div class="chat-bubble chat-bubble--left">
                                    <?php echo $message['message'] ; ?>
                                </div>
                            </div>
                        </div>
                    </p>
                <?php else: ?>
                    <p class="bot-message">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <span class=" time-bubble-Right  time text-muted small">22:34</span>
                                <div class="chat-bubble chat-bubble-Right offset-md-9 chat-bubble--right">
                                    <?php echo $message['message']; ?>
                                </div>
                            </div>
                        </div>
                    </p>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<form method="POST" action="Answer.php" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <div class="chat-box-tray">
                <input class="col-md-11" placeholder="Type something..." list="autocomplete" type="text" id="search" name="user_input">
                <datalist class="autocomplete" id="autocomplete">
                   <datalist id="myDataList">
                        <?php foreach($Sotreddata as $key => $value): ?>
                            <!-- for each key-value pair in the $Sotreddata array, create an option element with the value attribute set to the key -->
                         <option value="<?php echo $key; ?>">
                            <?php endforeach; ?>
                    </datalist>
                    </datalist>
                <button id="send-button" disabled class="send" name="Has-Sumitted" type="submit"><i class="material-icons send-file">send</i></button>
            </div>
        </div>
    </div>
</form>


            </div>
            
        </div>
    </div>

<script>
    function fillForm() {
        const inputElement = document.getElementById("search");
        const sendButton = document.getElementById("send-button");
  
  if (event.target.id === "sherwan") {
    inputElement.value = "Asst. Prof. Dr. Sherwan Sharif Qurtas";
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
    inputElement.value = "Dr. Rizgar Saeed Hussein";
  }if (event.target.id === "SU") {
    inputElement.value = "Soran University";
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
        
    }function feedback() {
          
          window.location.href = "feedback.php";
      
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
</script>
 <script>
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





</script>

    </body>
</html>