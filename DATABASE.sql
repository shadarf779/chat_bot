SIGN UP FORM {

    CREATE TABLE usersignup (
    idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uidUsers TINYTEXT NOT NULL,
    grade int(11) NOT NULL,
    department TINYTEXT NOT NULL,
    emailUser TINYTEXT NOT NULL,
    pwdUsers LONGTEXT NOT NULL
     
);
}

Bug_Report {
    CREATE TABLE bug_reports (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
}
Feedback {
    CREATE TABLE Feedback (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

}

Admin {

    CREATE TABLE questions (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question VARCHAR(255) NOT NULL,
  answer TEXT NOT NULL,
  student VARCHAR(10) NOT NULL,
  `picture_field` blob,
  `file_field` blob,    
  PRIMARY KEY (id)
);

}