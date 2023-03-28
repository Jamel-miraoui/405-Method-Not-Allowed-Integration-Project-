CREATE TABLE Users (
  user_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  address VARCHAR(255),
  username VARCHAR(255),
  password VARCHAR(255),
  user_type VARCHAR(255),
  is_moderator BOOLEAN,
  is_admin BOOLEAN
);

CREATE TABLE Moderators (
  moderator_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  address VARCHAR(255),
  username VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE Admins (
  admin_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  address VARCHAR(255),
  username VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE Books (
  book_id INT auto_increment PRIMARY KEY,
  title VARCHAR(255),
  author_name VARCHAR(255),
  publisher_name VARCHAR(255),
  ISBN VARCHAR(255),
  publication_date DATE,
  number_of_pages INT,
  category VARCHAR(255)
);
ALTER TABLE books ADD COLUMN pdf_file BLOB;
ALTER TABLE books ADD COLUMN book_cover BLOB;

CREATE TABLE Authors (
  author_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  date_of_birth DATE,
  biography VARCHAR(255)
);

CREATE TABLE Publishers (
  publisher_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  location VARCHAR(255),
  contact_information VARCHAR(255)
);

CREATE TABLE Borrow_history (
  borrow_id INT auto_increment PRIMARY KEY,
  book_id INT,
  user_id INT,
  borrow_date DATE,
  due_date DATE,
  return_date DATE,
  borrower_type VARCHAR(255),
  FOREIGN KEY (book_id) REFERENCES Books(book_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Categories (
  category_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255)
);

CREATE TABLE Reviews (
  review_id INT auto_increment PRIMARY KEY,
  book_id INT,
  user_id INT,
  review_text VARCHAR(255),
  review_date DATE,
  FOREIGN KEY (book_id) REFERENCES Books(book_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Courses (
  course_id INT auto_increment PRIMARY KEY,
  title VARCHAR(255),
  description VARCHAR(255),
  instructor_name VARCHAR(255),
  department_name VARCHAR(255),
  faculty_name VARCHAR(255),
  course_url VARCHAR(255),
  start_date DATE,
  end_date DATE
);
ALTER TABLE Courses ADD COLUMN pdf_cours BLOB;
ALTER TABLE Courses ADD COLUMN cours_cover BLOB;
CREATE TABLE Course_files (
  file_id INT auto_increment PRIMARY KEY,
  course_id INT,
  file_name VARCHAR(255),
  file_type VARCHAR(255),
  file_data BLOB,
  FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

CREATE TABLE Departments (
  department_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  description VARCHAR(255)
);

CREATE TABLE Faculties (
  faculty_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  department_id INT,
  office_location VARCHAR(255),
  FOREIGN KEY (department_id) REFERENCES Departments(department_id)
);

CREATE TABLE Students (
  student_id INT auto_increment PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  address VARCHAR(255),
  enrollment_date DATE,
  graduation_date DATE
);

 //adinding admin account
 
INSERT INTO Users (user_id, name, email, address, username, password, user_type, is_moderator, is_admin)
VALUES (1, 'ahmed', 'ahmed.oueslati6110@gmail.com', 'gaafour', 'admin', 'admin123', 'admin', 0, 1);

